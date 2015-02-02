<?php get_header(); ?>
<div class="wrapper">

	<div id="content">
<div id="slideshow_cont">
  
        <div id="slideshow">       

            <?php  

            $slider_arr = array();

            $x = 0;

            $args = array(

                         //'category_name' => 'blog',

                         'post_type' => 'post',

                         'meta_key' => 'ex_show_in_slideshow',

                         'meta_value' => 'Yes',

                         'posts_per_page' => 10

                         );

            $query = new WP_Query( $args ); 

           while($query->have_posts()){ $query->the_post();  ?>	      

            <div class="slide_cont <?php if($x == 0) { ?>active<?php } ?>">

                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-slideshow'); ?></a>               

            </div><!--//slide_cont-->

            <?php array_push($slider_arr,get_the_ID()); ?>

            <?php $x++; ?>

            <?php } ?>  

            <?php wp_reset_postdata(); ?>                       

            <img src="<?php echo get_template_directory_uri(); ?>/images/slide-prev.png" class="slide_prev" />

            <img src="<?php echo get_template_directory_uri(); ?>/images/slide-next.png" class="slide_next" />            

        </div><!--//slideshow-->

    </div><!--//slideshow_cont-->
	
		<div class="index-posts">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="single-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
				<div class="entry-date">
			<?php the_time('j F Y'); ?>
			</div>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php if (trim(get_the_title()) != '') { the_title(); } else  _e('No title', 'exility'); ?></a></h2>
					<div class="single-post-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb-feature', array('alt' => '', 'title' => '')) ?></a></div>
						<div class="clear"></div>
					<div class="single-post-text">

						
						<div class="entry"><?php the_excerpt() ?></div>
						
<div class="meta">
							<?php _e('Posted in','exility');?>: <span><?php the_category(', '); ?></span> |
							<?php comments_popup_link(__('Leave a Comment','exility'), __('1 Comment','exility'), '% '. __('Comments', 'exility')); ?>
						</div><!--meta-->
					</div><!-- single-post-text -->
					<div class="clearfix"></div>

				</div><!-- single-post -->

				<?php endwhile; ?>

				<div class="posts-navigation">
					<div class="posts-navigation-prev"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'exility' ) ); ?></div>
					<div class="posts-navigation-next"> <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'exility' ) ); ?></div>
					<div class="clearfix"></div>
				</div>

			<?php endif; ?>

		</div><!-- index-posts -->
	
<div class="bottom-widget">
<div class="sb-right">
    <?php if ( is_active_sidebar( 'sidebar-posts' ) ) : ?>
	    <?php dynamic_sidebar( 'sidebar-posts' ); ?>
    <?php endif; ?>
</div>
</div>

</div>
<div class="clear"> </div>
<?php get_footer(); ?>
</div>