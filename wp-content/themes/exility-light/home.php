<?
/*
 * Template Name: Home
 */
 

get_header(); ?>
</div>
<div class="container">	
<div class="row">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width:90%;margin: 0 auto;">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" style="border-radius:10px;">
  
    <div class="item active">
      <img src="/ashworth/wp-content/uploads/2013/12/MG_0253-2.jpg" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="/ashworth/wp-content/uploads/2013/12/MG_0210-2.jpg" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
  </div><!-- .carousel-inner -->

 </div><!-- .carousel -->
</div>
<div class="row">
<div class="col-md-9">
<br>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	

			<h1>
				<?php if (trim(get_the_title()) != '') { the_title_attribute(); } else  _e('No title', 'exility'); ?>
			</h1>

			<div class="entry">
				<p><?php the_content(); ?></p>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'exility' ), 'after' => '</div>' ) ); ?>
			</div>
		    <?php if ( !is_front_page() ) : ?>
	<?php else:?> 
		<?php endif; ?>
	<?php endwhile; else: ?>

		<div class="no-posts">
		<?php _e( 'Sorry, the page you requested was not found', 'exility');?> 
		</div>

	<?php endif; ?>
</div><!-- .col-md-9 -->
<div class="col-md-3">
<div class="bottom-widget">
<div class="sb-right">
<?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-page' ); ?>
<?php endif;?>
</div>
</div><!-- .bottom-widget -->
</div><!-- .col-md-4 -->
</div><!-- .row -->

</div><!-- .container -->


 	<div class="clear"> 
 </div>
<?php get_footer(); ?>
