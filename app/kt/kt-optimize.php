<?php

// TO FIX - Asynchronous JS
// TO FIX - Minify Shit


/**
 * Theme assets - Remove unnecessary script
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/**
 * Remove version from head - For WordPress and plugins
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' ) ; 
remove_action( 'wp_head', 'rsd_link' ) ;

// Remove version from rss
add_filter('the_generator', '__return_empty_string');

// Remove version from scripts and styles
function shapeSpace_remove_version_scripts_styles($src) {
	if (strpos($src, 'ver=')) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}
add_filter('style_loader_src', __NAMESPACE__ . '\\shapeSpace_remove_version_scripts_styles', 9999);
add_filter('script_loader_src', __NAMESPACE__ . '\\shapeSpace_remove_version_scripts_styles', 9999);