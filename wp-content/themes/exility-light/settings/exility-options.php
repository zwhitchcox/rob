<?php
function exility_theme_options_init() {
	wp_enqueue_style( 'exility-theme-options-style', get_template_directory_uri() . '/settings/options.css' );
}
add_action( 'admin_init', 'exility_theme_options_init' );

global $exility_options;
$settings = get_option( 'exility_options', $exility_options );
$shortname = "exility";


$exility_options = array(
	'exility_favicon_url' => '',
);


function exility_default_options() {
     global $exility_options;
     $exility_options_temp = $exility_options;
     $options = get_option( 'exility_options', $exility_options );
	foreach ( $exility_options as $exility_option_key => $exility_option_value ) {
		if ( isset($options[$exility_option_key])) {
			$exility_options[$exility_option_key] = $options[$exility_option_key];
		}
	}     
     update_option( 'exility_options', $exility_options );
}
add_action( 'init', 'exility_default_options' );

function exility_validate_options( $input ) {
	global $exility_options;	

	$settings = get_option( 'exility_options', $exility_options );
	
	if ( ! isset( $input['exility_favicon_url'] ) )
	$input['exility_favicon_url'] = null;
	$input['exility_favicon_url'] = esc_url_raw( $input['exility_favicon_url'] );

	return $input;
}


if ( is_admin() ) : 

//register settings and call sanitation functions
function exility_register_settings() {
	register_setting( 'exility_theme_options', 'exility_options', 'exility_validate_options' );
}
add_action( 'admin_init', 'exility_register_settings' );

function exility_theme_options() {
	add_theme_page('exility'.__('Theme Options','exility'), 'Exility '.__('Theme Options','exility'), 'edit_theme_options', 'theme-options', 'exility_theme_options_page' );
}
add_action( 'admin_menu', 'exility_theme_options' );



//generate options page
function exility_theme_options_page() {
	global $exility_options;
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	if( isset( $_REQUEST['action'])&&('reset' == $_REQUEST['action']) ) 
		delete_option( 'exility_options' );
?>

	<div id="admin" class="wrap">

	
	
	<div class="options-form">
	
	
	<?php screen_icon(); echo "<h2>" . __( 'Theme Options' ,'exility' ) . "</h2>"; ?>
	<?php if ( isset( $_REQUEST['action'])&&('reset' == $_REQUEST['action']) ) : ?>
	<div class="updated_status fade"><?php _e( 'Options reset successfully. Remember to save the default settings!','exility' ); ?></div>
	<?php elseif ( $_REQUEST['settings-updated'] ) : ?>
	<div class="updated_status fade"><?php _e( 'Options saved successfully!','exility' ); ?></div>
	<?php endif;?>
	
	<form method="post" action="options.php">

	<?php $settings = get_option( 'exility_options', $exility_options ); ?>	
	<?php settings_fields( 'exility_theme_options' ); ?>
		
		
	<div class="field">
		<label><?php _e( 'Favicon URL','exility' ); ?></label>
       	<input class="input" id="exility_favicon_url" name="exility_options[exility_favicon_url]" type="text" value="<?php echo esc_url($settings['exility_favicon_url']); ?>" />
		<span><?php _e( 'Enter full URL for favicon starting with <strong>http:// </strong>.','exility' ); ?></span>
	</div>		
	
	<a href="https://twitter.com/wpmole" class="twitter-follow-button" data-show-count="false">Follow @wpmole</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script> <a href="http://www.facebook.com/pages/WPMole/142454599181539" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" /></a>  <a href="http://wpmole.com" target="_blank">WPMole</a>
	
	</div> <!-- /greenpage_options -->
	<!---- /form fields ---->
	
	
	<?php submit_button(); ?>
	</form>
	
	<form method="post">
		<p class="submit">
			<input class="button" name="reset" type="submit" value="Reset All Settings" />
			<input type="hidden" name="action" value="reset" />
		</p>
	</form>

	</div>

	<?php
}

endif;  // EndIf is_admin() ?>
