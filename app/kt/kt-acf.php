<?php

//if( function_exists('acf_add_options_page') ) {
//	
//	acf_add_options_sub_page(array(
//		'page_title' 	=> 'Theme Header Settings',
//		'menu_title'	=> 'Header',
//		'parent_slug'	=> 'themes.php',
//	));
//	
//}


// INIT ACF GOOGLE MAPS
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyBQNuJki7r5I6JmfTbMACKXfgERXBYVQXk');
}

add_action('acf/init', 'my_acf_init');


// CUSTOMIZE ACF ROW LAYOUT HANDLE
function my_acf_admin_head() {
    ?>
    <style type="text/css">

		.acf-flexible-content .layout {
			border-radius: 5px;
		}

    .acf-flexible-content .layout .acf-fc-layout-handle {
			background-color: #0085ba;
			color: #fff;
			text-transform: uppercase;
			font-weight: bold;
    }
		
    </style>
    <?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head');


// COLLAPSE LAYOUTS ON INIT
add_action('acf/input/admin_head', 'my_acf_input_admin_head');
function my_acf_input_admin_head() {
?>
<script type="text/javascript">
jQuery(function(){
  jQuery('.acf-flexible-content .layout').addClass('-collapsed');
});
</script>
<?php
}


// ADD TITLE TO THE ROW LAYOUT
function my_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {
	
	if( $text = get_sub_field('section_title') ) {	
		$title .= '<span style="color:#ffeaa7;">&nbsp;&nbsp; &rtrif;  &nbsp;&nbsp;' . $text . '</span>';
	}

	return $title;
}
add_filter('acf/fields/flexible_content/layout_title', 'my_acf_flexible_content_layout_title', 10, 4);
