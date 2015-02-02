<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
  
Franklin Real Estate | Lawyer

</title>
<!--<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.2.1/bootstrap-social.min.css" rel="stylesheet">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />	

<?php
$exility_settings = get_option( 'exility_options');	
	if ( isset ($exility_settings['exility_favicon_url']) &&  ($exility_settings['exility_favicon_url']!="") ) { ?>
			<link rel="shortcut icon" href="<?php echo $exility_settings['exility_favicon_url']; ?>" />	
	<?php 
		}?>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div class="header">
			
		<div class="header-bottom">
			<div class="logo"> 
				<h1><a href="<?php echo esc_url(home_url()); ?>/"><img src="<?=get_template_directory_uri().'/images/logo.png';?>" class="logo-image"></a></h1>

<div id="testimonials">
</div>

				<div class="address">
			237 2nd Avenue South<br>
			Franklin, Tennessee 37064<br>
			(615) 810-8150
			</div>
			</div>
			
			<div class="main-menu-container">
				<div class="gradient"></div>
				<?php wp_nav_menu(array('theme_location' => 'menu-1', 'container' => 'div', 'container_class' => 'main-menu')); ?>
								
			</div>
		</div>
	</div><!-- .header -->
					<div class="clear"></div>


