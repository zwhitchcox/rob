<?php
get_header(); ?>

		 <div class="container">	
    	<div class="content-ins">
        	<div class="posts">
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	

			<h2>
				<?php if (trim(get_the_title()) != '') { the_title_attribute(); } else  _e('No title', 'exility'); ?>
			</h2>

			<div class="entry">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'exility' ), 'after' => '</div>' ) ); ?>
			</div>
			<div class="clear"></div>
		    <?php if ( !is_front_page() ) : ?>	
	<?php else:?> 
		<?php endif; ?>
	<?php endwhile; else: ?>

		<div class="no-posts">
		<?php _e( 'Sorry, the page you requested was not found', 'exility');?> 
		</div>

	<?php endif; ?>

        </div>
		
<div class="bottom-widget">
<div class="sb-right">
        <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
	        <?php dynamic_sidebar( 'sidebar-page' ); ?>
        <?php endif;?>
    </div>
</div>

    	</div>
</div><!-- .container -->
 	<div class="clear"> </div>  

<?php get_footer(); ?>