<?php get_header(); ?>
<div class="wrapper">
	<div id="content">
	<div class="index-posts">

			<?php if (have_posts()) : ?>

				<?php $post = $posts[0]; ?>
				<?php /* If this is a category archive */ if (is_category()) { ?>
					<div class="search-results"><h2><?php _e('Archive for the','exility');?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('category','exility');?></h2></div>
				<?php /* If this is a tag archive */ } elseif (is_tag()) { ?>
					<div class="search-results"><h2><?php _e('Posts Tagged','exility');?> &#8216;<?php single_tag_title(); ?>&#8217;:</h2></div>
				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
					<div class="search-results"><h2><?php _e('Archive for','exility');?> <?php the_time('F jS, Y'); ?>:</h2></div>
				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
					<div class="search-results"><h2><?php the_time('F  Y'); ?> <?php _e('archive','exility');?></h2></div>
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
					<div class="search-results"><h2><?php _e('Archive for','exility');?> <?php the_time('Y'); ?>:</h2></div>
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
					<div class="search-results"><h2><?php _e('Author Archive','exility');?></h2></div>
				<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<div class="search-results"><h2><?php _e('Blog Archives','exility');?></h2></div>
				<?php } ?>

				<?php while (have_posts()) : the_post(); ?>

					<div class="single-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
				<div class="entry-date">
			<?php the_time('j F Y'); ?>
			</div>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php if (trim(get_the_title()) != '') { the_title(); } else  _e('No title', 'exility'); ?></a></h2>
					<div class="single-post-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb-feature', array('alt' => '', 'title' => '')) ?></a></div>
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

		</div>

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