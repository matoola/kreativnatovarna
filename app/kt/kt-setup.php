<?php

namespace Kt;

$KtSetup = KtSetup();
$KtImages = KtImages();

/**
 * Sidebar
 */
add_filter('sage/display_sidebar', function ($display) {
    static $display;

    isset($display) || $display = in_array(true, [
      // The sidebar will be displayed if any of the following return true
	  //is_single(),
    ]);

    return $display;
});


/**
 * Google Fonts
 */
if ( $KtSetup['google_font'] ) {
	function wpb_add_google_fonts() { 
		$KtSetup = KtSetup();
		$google_font = $KtSetup['google_font'];
		wp_enqueue_style( 'wpb-google-fonts', $google_font, false ); 
	}
	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\wpb_add_google_fonts', 100 );
}


/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' ... ';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


/**
 * Limit word count in excerpt: echo excerpt(30);
 */
function excerpt($limit) 
{
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).' ... ';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
} 
add_filter('excerpt',  __NAMESPACE__ . '\\excerpt');


/**
 * Remove word 'archive' from the title
 */
function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', __NAMESPACE__ . '\\my_theme_archive_title' );


/**
 * Disable support for comments and trackbacks in post types
 */
if ( !$KtSetup['comments'] ) {
	function df_disable_comments_post_types_support() {
		$post_types = get_post_types();
		foreach ($post_types as $post_type) {
			if(post_type_supports($post_type, 'comments')) {
				remove_post_type_support($post_type, 'comments');
				remove_post_type_support($post_type, 'trackbacks');
			}
		}
	}
	add_action('admin_init', __NAMESPACE__ . '\\df_disable_comments_post_types_support');
	// Close comments on the front-end
	function df_disable_comments_status() {
		return false;
	}
	add_filter('comments_open', __NAMESPACE__ . '\\df_disable_comments_status', 20, 2);
	add_filter('pings_open', __NAMESPACE__ . '\\df_disable_comments_status', 20, 2);
	// Hide existing comments
	function df_disable_comments_hide_existing_comments($comments) {
		$comments = array();
		return $comments;
	}
	add_filter('comments_array', __NAMESPACE__ . '\\df_disable_comments_hide_existing_comments', 10, 2);
	// Remove comments page in menu
	function df_disable_comments_admin_menu() {
		remove_menu_page('edit-comments.php');
	}
	add_action('admin_menu', __NAMESPACE__ . '\\df_disable_comments_admin_menu');
	// Redirect any user trying to access comments page
	function df_disable_comments_admin_menu_redirect() {
		global $pagenow;
		if ($pagenow === 'edit-comments.php') {
			wp_redirect(admin_url()); exit;
		}
	}
	add_action('admin_init', __NAMESPACE__ . '\\df_disable_comments_admin_menu_redirect');
	// Remove comments metabox from dashboard
	function df_disable_comments_dashboard() {
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
	}
	add_action('admin_init', __NAMESPACE__ . '\\df_disable_comments_dashboard');
	// Remove comments links from admin bar
	function df_disable_comments_admin_bar() {
		if (is_admin_bar_showing()) {
			remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
		}
	}
	add_action('init', __NAMESPACE__ . '\\df_disable_comments_admin_bar');
}


/**
 * Image max size on upload (removes larger images)
 */
if ( $KtImages['width'] && $KtImages['height'] && $KtImages['quality'] ) {
	function max_handle_upload($params) {
		$filePath = $params['file'];

		$KtImages = KtImages();

		if ( !current_user_can('administrator') ) {
			$image_width = $KtImages['width'];
			$image_height = $KtImages['height'];
			$image_quality = $KtImages['quality'];
		} else {
			if ( !$KtImages['admin_width'] && !$KtImages['admin_height'] && !$KtImages['admin_quality'] ) {
				$image_width = $KtImages['width'];
				$image_height = $KtImages['height'];
				$image_quality = $KtImages['quality'];
			}	else {
				$image_width = $KtImages['admin_width'];
				$image_height = $KtImages['admin_height'];
				$image_quality = $KtImages['admin_quality'];
			}	
		}

		if ( (!is_wp_error($params)) && file_exists($filePath) && in_array($params['type'], array('image/png','image/gif','image/jpeg')))	{
			$quality                        = $image_quality;
			list($largeWidth, $largeHeight) = array( $image_width, $image_height );
			list($oldWidth, $oldHeight)     = getimagesize( $filePath );
			list($newWidth, $newHeight)     = wp_constrain_dimensions( $oldWidth, $oldHeight, $largeWidth, $largeHeight );
			$resizeImageResult = wp_get_image_editor( $filePath );

			unlink( $filePath );

			if ( ! is_wp_error( $resizeImageResult ) ) {
				$resizeImageResult->resize( $newWidth, $newHeight, false );
				$resizeImageResult->set_quality( $quality );
				$resizeImageResult->save( $filePath );
			}	else {
				$params = wp_handle_upload_error (
					$filePath,
					$resizeImageResult->get_error_message() 
				);
			}
		}
		return $params;
	}
	add_filter( 'wp_handle_upload', __NAMESPACE__ . '\\max_handle_upload' );
}


/**
 * Automatically set the image Title, Alt-Text, Caption & Description upon upload
 */
add_action( 'add_attachment', __NAMESPACE__ . '\\my_set_image_meta_upon_image_upload' );
function my_set_image_meta_upon_image_upload( $post_ID ) {

	// Check if uploaded file is an image, else do nothing

	if ( wp_attachment_is_image( $post_ID ) ) {

		$my_image_title = get_post( $post_ID )->post_title;

		// Sanitize the title:  remove hyphens, underscores & extra spaces:
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

		// Sanitize the title:  capitalize first letter of every word (other letters lower case):
		$my_image_title = ucwords( strtolower( $my_image_title ) );

		// Create an array with the image meta (Title, Caption, Description) to be updated
		// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
		$my_image_meta = array(
			'ID'		=> $post_ID,			// Specify the image (ID) to be updated
			'post_title'	=> $my_image_title,		// Set image Title to sanitized title
			//'post_excerpt'	=> $my_image_title,		// Set image Caption (Excerpt) to sanitized title
			//'post_content'	=> $my_image_title,		// Set image Description (Content) to sanitized title
		);

		// Set the image Alt-Text
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

		// Set the image meta (e.g. Title, Excerpt, Content)
		wp_update_post( $my_image_meta );

	} 
}


/**
 * The gallery output will always be generated as if you used link="file".
 */
add_filter( 'shortcode_atts_gallery',
    function( $out ){
        $out['link'] = 'file'; 
        return $out;
    }
);


/**
 * Add Editor (role) the privilege to edit theme and widgets
 */
// get the the role object
$role_object = get_role( 'editor' );
// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );


/**
 * Extend WordPress search to include custom fields
 *
 * https://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', __NAMESPACE__ . '\\cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', __NAMESPACE__ . '\\cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', __NAMESPACE__ . '\\cf_search_distinct' );
