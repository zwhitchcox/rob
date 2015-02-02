<?php get_header(); ?>
<div class="wrapper">
	<div id="content">
	<div class="index-posts">
			<div class="search-results"><h2><?php _e( 'Not Found', 'exility'); ?></h2></div>
		</div>
<div class="bottom-widget">
<div class="sb-right">
    <?php if ( is_active_sidebar( 'sidebar-posts' ) ) : ?>
	    <?php dynamic_sidebar( 'sidebar-posts' ); ?>
    <?php endif; // end sidebar widget area ?>
</div>
</div>
</div>
<div class="clear"> </div>
<?php get_footer(); ?>
</div>