<?php

namespace Kt;

$KtSeo = KtSeo();
	
/**
 * Add Meta Description
 */
if ( !is_admin() && $KtSeo['meta_description'] ) {
	function insert_meta_description_in_head() {
		$KtSeo = KtSeo();
		if( get_field('meta_description') ): 
			$meta_description = get_field('meta_description'); 
		elseif( empty(get_field('meta_description')) && !empty(get_the_content()) ): 
			$meta_description = wp_strip_all_tags( str_replace('&nbsp;', '', get_the_excerpt()), true );
		else: 
			$meta_description = $KtSeo['meta_description']; 
		endif;
		echo '<meta name="description" content="' . $meta_description . '" />';
	}
	add_action( 'wp_head',  __NAMESPACE__ . '\\insert_meta_description_in_head', 2 );
}


/**
 * Facebook Open Graph - Adding the Open Graph in the Language Attributes
 */
if ( $KtSeo['fb_app_id'] ) {
	function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
	add_filter('language_attributes', __NAMESPACE__ . '\\add_opengraph_doctype');
}


/**
 * Facebook Open Graph
 */
if ( $KtSeo['fb_app_id'] ) {
	function insert_fb_in_head() {
		global $post;
		$KtSeo = KtSeo();
		$fb_app_id = $KtSeo['fb_app_id'];
		$og_image = $KtSeo['image'];
			if (!is_404()) {
				$KtSeo = KtSeo();
				if( get_field('meta_description') ): 
					$meta_description = get_field('meta_description'); 
				elseif( empty(get_field('meta_description')) && !empty(get_the_content()) ): 
					$meta_description = wp_strip_all_tags( str_replace('&nbsp;', '', get_the_excerpt()), true );
				else: 
					$meta_description = $KtSeo['meta_description']; 
				endif;
				echo '<meta property="fb:app_id" content="' . $fb_app_id . '"/>';
				echo '<meta property="og:type" content="website"/>';
				echo '<meta property="og:title" content="' . get_the_title() . '"/>';
				echo '<meta property="og:url" content="' . get_permalink() . '"/>';
				echo '<meta property="og:site_name" content="' . get_bloginfo() . '"/>';
				echo '<meta property="og:description" content="' . $meta_description . '"/>';
		
				if ( !has_post_thumbnail( $post->ID )) {
					echo '<meta property="og:image" content="' . $og_image . '"/>';
				} else {
					$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium_large' );
					echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
				}
			}
		echo "
	";
	}
	add_action( 'wp_head', __NAMESPACE__ . '\\insert_fb_in_head', 5 );
}

/**
 * Twitter Card
 */
if ( $KtSeo['twitter'] ) {
	function insert_twitter_in_head() {
		global $post;
		if ( !is_singular())
			return;
			$KtSeo = KtSeo();
			if( get_field('meta_description') ): 
				$meta_description = get_field('meta_description'); 
			elseif( empty(get_field('meta_description')) && !empty(get_the_content()) ): 
				$meta_description = wp_strip_all_tags( str_replace('&nbsp;', '', get_the_excerpt()), true );
			else: 
				$meta_description = $KtSeo['meta_description']; 
			endif;
				echo '<meta name="twitter:card" content="summary_large_image" />';
				echo '<meta name="twitter:description" content="' . $meta_description . '" />';
				echo '<meta name="twitter:title" content="' . get_the_title() . '" />';
				if ( !has_post_thumbnail( $post->ID )) {
					$default_image=''; //replace this with a default image on your server or an image in your media library
					echo '<meta name="twitter:image" content="' . $default_image . '"/>';
				} else {
					$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
					echo '<meta name="twitter:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
				}
		echo "
	";
	}
	add_action( 'wp_head', __NAMESPACE__ . '\\insert_twitter_in_head', 6 );
}

/**
 * Add Google Site Verification
 */
if ( !is_admin() && !$KtSeo['google_site_verification'] ) {
	function insert_google_site_verification_in_head() {
		$KtSeo = KtSeo();
		$google_site_verification = $KtSeo['google_site_verification']; 
		echo '<meta name="google-site-verification" content="' . $google_site_verification . '" />';
	}
	add_action( 'wp_head', __NAMESPACE__ . '\\insert_google_site_verification_in_head', 8 );
}