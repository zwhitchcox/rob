<?php
get_header(); ?>

<div class="container">
<div class="content-ins">
<div class="posts">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
		
			<h2>
			<?php if (trim(get_the_title()) != '') { the_title(); } else  _e('No title', 'exility'); ?>			
			</h2>
			
			<div class="entry-meta">
		        <?php the_time('j F Y'); ?>		        
	        </div>			
	
			<div class="entry">
		        <div class="entry-thumbnail">
			        <?php if ( has_post_thumbnail() ) ?>
                <?php the_post_thumbnail('thumb-feature');?>
		        </div>
<div class="clear"></div>
				<?php the_content(); ?>
				<?php
				$tag_list = get_the_tag_list( '', __( ', ', 'exility' ) );
	if ( $tag_list ) {?>
		<?php _e('Tags', 'exility'); ?>: <?php echo '<span class="tags-links">' . $tag_list . '</span>';
	}?>
				<div class="clearboth"> </div>
			</div>
			
				 <div class="full-post-pages"><?php wp_link_pages(); ?></div> 
	     
			<div class="clearboth"> </div>
	
			<div class="post-nav">
			<div class="post-nav-l"><?php previous_post_link(__('&larr; %link', '<span class="meta-nav">' . '</span> %title', 'exility')); ?></div>
			<div class="post-nav-r"><?php next_post_link( __('%link &rarr;', '%title <span class="meta-nav">' . '</span>' , 'exility')); ?></div>
				</div>
				<div class="clear"></div>
			<?php comments_template( '', true ); ?>	

	<?php endwhile; else: ?>
	
			<div class="no-posts"> <?php _e( 'Sorry, no posts matched your criteria.', 'exility' );?> </div>
	
	<?php endif; ?>
	
</div>
<div class="bottom-widget">
<div class="sb-right">
    <?php if ( is_active_sidebar( 'sidebar-posts' ) ) : ?>
	    <?php dynamic_sidebar( 'sidebar-posts' ); ?>
    <?php endif;?>
</div>
</div>


</div>

<!-- end container -->
	<div class="clear"> </div>
<?php get_footer(); ?>