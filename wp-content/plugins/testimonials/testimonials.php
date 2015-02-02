<?php
/*
  Plugin Name: Testimonials
  Plugin URI: http://pwdtechnology.com/testimonials-plugin-for-wordpress-site/
  Description: Testimonials is a WordPress plugin that allows you to manage and display testimonials for your blog, product or service. It can be used to build your portfolio or to encourage readers to subscribe / buy your products.
  Author: Chinmoy Paul (chinmoy29)
  Author URI: http://www.pwdtechnology.com/
  Version: 3.0.1
*/
  
// Copyright (c) 2010-2104 Chinmoy Paul. All rights reserved.
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// **********************************************************************

define('TP_PLUGIN_URL', plugins_url() . '/testimonials');
if( ! current_theme_supports('post-thumbnails') )
  add_theme_support( 'post-thumbnails' );
add_image_size('tm-thumb', 100, 100, true);
require_once 'cpt.php';  

add_shortcode('testimonials', 'getTestimonials');
add_shortcode('sliding_testimonials', 'slidingTestimonials');
function getTestimonials($atts){
   $defaults = array(
                      'view'    => 'list',
                      'style'   => 'one',
                      'columns' => 3,
                      'limit'   => 10,
                      'thumb'   => 'medium',
                      'post_id' => '',
                      'orderby' => 'date',
                      'order'   => 'DESC'
                    );
                    
   extract( shortcode_atts($defaults,$atts) );
   // Fix for the WordPress 3.0 "paged" bug.
  $paged = 1;
  if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
  if ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
  $paged = intval( $paged );
   $args = array('post_type' => 'testimonial', 'posts_per_page' => $limit, 'orderby' => $orderby, 'order' => $order, 'paged' => $paged);
   if( $post_id != '') { $args['post__in'] = extract(",", $post_id );}
   
   $tm = "";
   $testimonials = new WP_Query($args);
   if( $testimonials->have_posts() ):     
     if($view == 'list'){
      if($style == "one" ) include_once "view/list-one.php";
      if($style == "two" ) include_once "view/list-two.php";      
      if($style == "three" ) include_once "view/list-three.php";
     }
   endif;
   
   $tm .= tm_pagination($testimonials);
   wp_reset_query();
      
   return $tm;
}
function slidingTestimonials($atts){
   $defaults = array(
                      'view'    => 'list',
                      'style'   => 'one',
                      'columns' => 3,
                      'limit'   => 10,
                      'thumb'   => 'medium',
                      'post_id' => '',
                      'orderby' => 'date',
                      'order'   => 'DESC',
                      'autoslide' => true,
                      'animation' => "fade",
                      'pauseOnHover' => false,
                      'directional_nav' => true,
                      'slideshowSpeed' => 7000,
                      'animationSpeed' => 600
                    );
                    
   extract( shortcode_atts($defaults,$atts) );
   $args = array('post_type' => 'testimonial', 'posts_per_page' => $limit, 'orderby' => $orderby, 'order' => $order);
   if( $post_id != '') { $args['post__in'] = extract(",", $post_id );}
   
   $tm = "";
   $testimonials = new WP_Query($args);
   if( $testimonials->have_posts() ):
      if($style == "one" ) include_once "view/slider/slider-one.php";
   endif;       
   wp_reset_postdata();   
   return $tm;     
}

// Adding Testimonials CSS & JS file
add_action( 'wp_enqueue_scripts', 'testimonials_scripts' );
function testimonials_scripts(){
  wp_register_style( 'testimonials-css', plugins_url( 'css/testimonials.css', __FILE__ ), array(), '3.0', 'all' );
  wp_enqueue_style( 'testimonials-css' );
  wp_register_style( 'flexslider-css', plugins_url( 'css/flexslider.css', __FILE__ ), array(), '3.0', 'all' );
  wp_enqueue_style( 'flexslider-css' );
  
  wp_enqueue_script( 'flexslider', plugins_url( 'js/jquery.flexslider-min.js', __FILE__ ), array( 'jquery' ), '20131205', true );   
  wp_enqueue_script( 'flexslider-manualDirectionControls', plugins_url( 'js/jquery.flexslider.manualDirectionControls.js', __FILE__ ), array( 'jquery' ), '20131205', true );
}

add_filter('widget_text', 'do_shortcode');

if ( ! function_exists( 'tm_pagination' ) ) {
	function tm_pagination( $query = '', $args = array()) {
		global $wp_rewrite, $wp_query;

		if ( $query ) {
			$wp_query = $query;
		} // End IF Statement
    
		/* If there's not more than one page, return nothing. */
		if ( 1 >= $wp_query->max_num_pages )
			return;

		/* Get the current page. */
		$current = ( get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1 );

		/* Get the max number of pages. */
		$max_num_pages = intval( $wp_query->max_num_pages );

		/* Set up some default arguments for the paginate_links() function. */
		$defaults = array(
			'base' => add_query_arg( 'paged', '%#%' ),
			'format' => '',
			'total' => $max_num_pages,
			'current' => $current,
			'prev_next' => true,
			'prev_text' => __( '&larr; Previous', 'tm' ), // Translate in WordPress. This is the default.
			'next_text' => __( 'Next &rarr;', 'tm' ), // Translate in WordPress. This is the default.
			'show_all' => false,
			'end_size' => 1,
			'mid_size' => 1,
			'add_fragment' => '',
			'type' => 'plain',
			'before' => '<div class="pagination tm-pagination">', // Begin tm_pagination() arguments.
			'after' => '</div>',
			'echo' => false, 
			'use_search_permastruct' => false
		);

		/* Allow themes/plugins to filter the default arguments. */
		$defaults = apply_filters( 'tm_pagination_args_defaults', $defaults );

		/* Add the $base argument to the array if the user is using permalinks. */
		if( $wp_rewrite->using_permalinks() && ! is_search() )
			$defaults['base'] = user_trailingslashit( trailingslashit( get_pagenum_link() ) . 'page/%#%' );

		/* Merge the arguments input with the defaults. */
		$args = wp_parse_args( $args, $defaults );

		/* Allow developers to overwrite the arguments with a filter. */
		$args = apply_filters( 'tm_pagination_args', $args );

		/* Don't allow the user to set this to an array. */
		if ( 'array' == $args['type'] )
			$args['type'] = 'plain';

		/* Make sure raw querystrings are displayed at the end of the URL, if using pretty permalinks. */
		$pattern = '/\?(.*?)\//i';

		preg_match( $pattern, $args['base'], $raw_querystring );

		if( $wp_rewrite->using_permalinks() && $raw_querystring )
			$raw_querystring[0] = str_replace( '', '', $raw_querystring[0] );
			@$args['base'] = str_replace( $raw_querystring[0], '', $args['base'] );
			@$args['base'] .= substr( $raw_querystring[0], 0, -1 );
		
		/* Get the paginated links. */
		$page_links = paginate_links( $args );

		/* Remove 'page/1' from the entire output since it's not needed. */
		$page_links = str_replace( array( '&#038;paged=1\'', '/page/1\'' ), '\'', $page_links );

		/* Wrap the paginated links with the $before and $after elements. */
		$page_links = $args['before'] . $page_links . $args['after'];

		/* Allow devs to completely overwrite the output. */
		$page_links = apply_filters( 'tm_pagination', $page_links );

		/* Return the paginated links for use in themes. */
		if ( $args['echo'] )
			echo $page_links;
		else
			return $page_links;
	} // End tm_pagination()
} // End IF Statement