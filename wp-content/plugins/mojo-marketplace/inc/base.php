<?php

function mm_aff_setup() {
	$aff = get_option( 'mm_master_aff', ( defined( 'MMAFF' ) ? MMAFF : '' ) );
	update_option( 'mm_master_aff', $aff );
}
add_action( 'admin_init', 'mm_aff_setup' );

function mm_api( $args = array(), $query = array() ) {
	$api_url = "http://mojomarketplace.com/api/v1/";
	$default_args = array(
		'mojo-platform' 	=> 'wordpress',
		'mojo-type' 		=> 'themes',
		'mojo-items' 		=> 'recent'
	);
	$default_query = array(
		'count'		=> 30,
		'seller'	=> ''
	);
	$args = wp_parse_args( $args, $default_args );
	$query = wp_parse_args( $query, $default_query );
	$query = http_build_query( array_filter( $query ) );
	$request_url = $api_url . $args['mojo-items'] . '/' . $args['mojo-platform'] . '/' . $args['mojo-type'];
	$request_url = $request_url . '?' . $query;
	if( false === ( $transient = get_transient( 'mojo-api-calls' ) ) OR ! isset( $transient[ md5( $request_url ) ] ) ) {
		$transient[ md5( $request_url ) ] = wp_remote_get( $request_url );
		set_transient( 'mojo-api-calls', $transient, DAY_IN_SECONDS );
	}
	return $transient[ md5( $request_url ) ];
}

function mm_build_link( $url, $args = array() ) {
	$defaults = array(
		'utm_source'	=> 'mojo_wp_plugin', //this should always be mojo_wp_plugin
		'utm_campaign'	=> 'mojo_wp_plugin',
		'utm_medium'	=> 'plugin_', //(plugin_admin, plugin_widget, plugin_shortcode)
		'utm_content'	=> '', //specific location
		'r'				=> get_option( 'mm_master_aff' ),
	);
	$args = wp_parse_args( $args, $defaults );
	$query = http_build_query( array_filter( $args ) );
	$url = $url . '?' . $query;
	return $url;
}