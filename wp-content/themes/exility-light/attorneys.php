<?
/*
 * Template Name: Attorneys
 */
 
 get_header(); ?>
<div class="container">
<?
	$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) );
	foreach( $mypages as $page ) {		
		$content = $page->post_content;
		if ( ! $content ) // Check for empty page
			continue;

		$content = apply_filters( 'the_content', $content );
	?>
		<h2 style="clear:both"><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
		<div class="entry"><?php echo $content; ?></div>
	<?php
	}		
?>

</div><!-- .content -->
<div class="clear"> </div>
<?php get_footer(); ?>
