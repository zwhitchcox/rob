<?php
  require( get_template_directory() . '/settings/exility-options.php' );

function exility_register_my_menus() {
	register_nav_menus(
		array(
			'menu-1' => __( 'Menu 1', 'exility' ),		
		)
	);
}
add_action( 'after_setup_theme', 'exility_register_my_menus' );


function exility_script_loader() {      
    global $wp_styles;

    wp_enqueue_script('exility_custom', get_template_directory_uri().'/libs/jquery.us.js', array('jquery'));
    wp_enqueue_script('exility_time', get_template_directory_uri().'/libs/jquery.timeout.js', array('jquery')); 
    wp_enqueue_script( 'jquery_masonry', get_template_directory_uri().'/libs/jquery.masonry.min.js', array('jquery') );

    wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.js', array('jquery') );      
        
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
    wp_enqueue_style( 'exility_style', get_template_directory_uri() . '/style.css');
        
    // Load style.css from child theme
    if (is_child_theme()) {
      wp_enqueue_style('exility_child', get_stylesheet_uri(), false, '1.0', null);
    }
 
    wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,cyrillic');
    wp_enqueue_style( 'googleFonts');   
}
add_action('wp_enqueue_scripts', 'exility_script_loader');
function exility_style_admin() {
 	wp_enqueue_style( 'style_admin', get_stylesheet_directory_uri() . '/settings/options.css' );
} 
add_action( 'admin_enqueue_scripts', 'exility_style_admin' );	
	

################################################################################


function exility_setup() {
global $exility_content_width, $exility_favicon_url;
if ( ! isset( $content_width ) )
	$content_width = 700;
	add_editor_style();
	add_theme_support( 'post-thumbnails' );
    add_image_size( 'thumb-feature', 325, 180, true ); 
	add_theme_support( 'automatic-feed-links' );
	load_theme_textdomain( 'exility', get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory(). "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
	
 
 };
add_action( 'after_setup_theme', 'exility_setup' );
  

/* ------- Register sidebar ------- */
function exility_widgets_init() {

	 register_sidebar( array(
    'name' => __('Posts Sidebar','exility'),
    'id' => 'sidebar-posts',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h2>',
    'after_title' => '</h2>',
  ));
	 register_sidebar( array(
    'name' => __('Page Sidebar','exility'),
    'id' => 'sidebar-page',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h2>',
    'after_title' => '</h2>',
  ) );
   
  register_sidebar(array(
    'name' => __('Footer Left','exility'),
    'id'   => 'footer-left',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));

  register_sidebar(array(
    'name' => __('Footer Middle','exility'),
    'id'   => 'footer-middle',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));

  register_sidebar(array(
    'name' => __('Footer Right','exility'),
    'id'   => 'footer-right',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ));
}
 add_action('widgets_init', 'exility_widgets_init');

if ( ! function_exists( 'exility_comment' ) ) :	
  function exility_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>			
			<?php printf( __( '%s', 'exility' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'exility' ); ?></em>
			<br />
		<?php endif; ?>

<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s', 'exility'), get_comment_date('F j, Y g:i a')) ?></a>

</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php sanitize_text_field(comment_text()); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'exility' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'exility' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
  };
  endif; 
  


function exility_wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 1; 
  $a['mid_size'] = 3; 
  $a['end_size'] = 1; 
  $a['prev_text'] = 'Previous'; 
  $a['next_text'] = 'Next'; 

  if ($max > 1) echo '<div class="navigation">';

  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}


