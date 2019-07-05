<?php

namespace Kt;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * 1) Theme global setup
 */
function KtSetup() {
	$kt['google_font'] = 'https://fonts.googleapis.com/css?family=Raleway:300,300i,500,900&amp;subset=latin-ext'; // Google Fonts
	$kt['sidebar'] = FALSE; // TRUE or FALSE
	$kt['breadcrumbs'] = FALSE; // TRUE or FALSE
	$kt['comments'] = FALSE; // TRUE or FALSE
	return $kt;
}


/**
 * 2) Image max size on upload (removes larger images)
 */
function KtImages() {
	$kt['width'] = get_option( 'large_size_w' ); // Number/get_option( 'large_size_w' ) or FALSE
	$kt['height'] = get_option( 'large_size_h' );  // Number/get_option( 'large_size_h' ) or FALSE
	$kt['quality'] = 88; // Number or FALSE
	$kt['admin_width'] = 1900;
	$kt['admin_height'] = 1900;
	$kt['admin_quality'] = 92;
	return $kt;
}
	

/**
 * 3) SEO - Only if Yoast SEO is off
 */
//	function KtSeo() {
//		$kt['image'] = get_template_directory_uri() . '/dist/images/logo.png'; // Facebook og & Twitter image link if featured image for the page/post is not set
//		$kt['fb_app_id'] = FALSE; // App ID ('2432928443599427') or FALSE (If using Yoast SEO or similar plugin use FALSE)
//		$kt['twitter'] = FALSE; // TRUE or FALSE
//    	$kt['meta_description'] = FALSE; // String or FALSE
//		$kt['google_site_verification'] = FALSE; // Google Site Verification ('BzePmHB-1ug60StzRaB_80-sxG426vn4ubn4qevsu1c') or FALSE
//    	return $kt;
//	}


/**
 * Require all the dependant setup files. Comment out the ones not needed in the project.
 */
require_once( __DIR__ . '/kt/kt-setup.php');
require_once( __DIR__ . '/kt/kt-acf.php');
require_once( __DIR__ . '/kt/kt-cpt.php');
require_once( __DIR__ . '/kt/kt-shortcodes.php');
require_once( __DIR__ . '/kt/kt-backend.php');
require_once( __DIR__ . '/kt/kt-breadcrumbs.php');
require_once( __DIR__ . '/kt/kt-optimize.php');
require_once( __DIR__ . '/kt/kt-schema.php');
//require_once( __DIR__ . '/kt/kt-seo.php');
