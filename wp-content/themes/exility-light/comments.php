<div id="comments-wrap">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'exility' ); ?></p>
			</div>
<?php	
		return;
	endif;
?>


<?php // Begin Comments & Trackbacks ?>
<?php if ( have_comments() ) : ?>
<h3 id="comments-number"><?php comments_number(__('No Comments', 'exility'), __('One Comment','exility'), __('Comments', 'exility').' (%)');?> <?php _e( 'on', 'exility' ); ?> <?php the_title_attribute(); ?></h3>

<ol class="commentlist">
		<?php wp_list_comments( array( 'callback' => 'exility_comment' ) ); ?>
</ol>

	<div class="comments-navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

<?php // End Comments ?>

 <?php else : ?>

	<?php if ('open' == $post->comment_status) : ?>
	
	 <?php else : ?>
	


	<?php endif; ?>
<?php endif; ?>



 <?php  
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );   
	   
	   	$comments_args = array(
    'title_reply'=>'Leave a Reply',
    'label_submit' => 'Comment', 
	'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment <span class="required-input">*</span>', 'exility' ) .
    '</label></p><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" >' .
    '</textarea>',
	'comment_notes_after'  => '',
	 'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<p class="comment-form-author">' .
      '<label for="author">' . __( 'Name <span class="required-input">*</span>', 'domainreference' ) . '</label> ' . 
      '<input id="author" name="author" type="text" value="" size="30"' . $aria_req . ' />'. __( '', 'exility' ) . '</p>',

    'email' =>
      '<p class="comment-form-email"><label for="email">' . __( 'Email <span class="required-input">*</span>', 'domainreference' ) . '</label> ' .
            '<input id="email" name="email" type="text"  value="" size="30"' . $aria_req . ' />'. __( '', 'exility' ) . '</p>',

    'url' =>
      '<p class="comment-form-url"><label for="url">' .
      __( 'Website', 'domainreference' ) . '</label>' .
      '<input id="url" name="url" type="text"  size="30"' . $aria_req . ' />'. __( '', 'exility' ) . '</p>'
    )
  ),
);
	   comment_form($comments_args);?>
</div>
