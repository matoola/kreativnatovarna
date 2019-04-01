<?php

// KT Backend custom style
function custom_loginlogo() {
echo '<style type="text/css">
body {background: #e57d4a!important;}
h1 a {background-image: url('.get_bloginfo('template_directory').'/dist/images/kreativnatovarna-logo.svg) !important; }
</style>';
}
add_action('login_head', 'custom_loginlogo');

function my_custom_css() {
	echo '<style>
.wp-block {
	max-width: 1600px;
}
#dashboard-widgets-wrap .metabox-holder h2.hndle {
	background: #e57d4a;
	color: #fff;
	font-weight: bold;
	text-transform: uppercase;
}
#dashboard-widgets-wrap .metabox-holder h2.hndle:before {
	display: inline-block;
	width: 20px;
	height: 20px;
	font-size: 20px;
	padding-right: 10px;
	line-height: 1;	
	font-family: dashicons;
	text-decoration: inherit;
	font-weight: 400;
	font-style: normal;
	vertical-align: top;
	text-align: center;
	transition: color .1s ease-in 0;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}
#dashboard-widgets-wrap .toggle-indicator {
	color: #fff;
}
#kt_support_desk_widget h2.hndle:before {
	content: "\f101";
}
#kt_guide_widget h2.hndle:before {
	content: "\f105";
}
#gadwp-widget h2.hndle:before, #show_dashboard h2.hndle:before {
content: "\f239";
}
#text2 h2.hndle:before, #text1 h2.hndle:before {
	content: "\f214";
}
.kt-dash {
	padding-right: 10px;
	font-size: 40px;
	width: 40px;
	height: 38px;
}
 </style>';
}
add_action('admin_head', 'my_custom_css');

/** 
* DASHBOARD WIDGET
*/
/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function kt_support_desk_widget() {

	wp_add_dashboard_widget(
                 'kt_support_desk_widget',         			// Widget slug.
                 'Podpora - Kreativna tovarna',  				// Title.
                 'kt_support_desk_widget_function' 			// Display function.
        );	
}
add_action( 'wp_dashboard_setup', 'kt_support_desk_widget' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function kt_support_desk_widget_function() {
	
//	$support_contact = '[contact-form-7 id="704" title="Contact Form Podpora"]';
//
//	// Display whatever it is you want to show.
//	echo "<div class='row'><div class='col-12'>
//	".do_shortcode($support_contact)."
//	</div></div>";
	echo '<h3 style="color:#e57d4a;">ODDAJTE ZAHTEVEK <span style="color:#444;">za prijavo napake /  pomoč ali svetovanje</span></h3>';
	echo '<p>Pišite nam na:  &nbsp;<a href="mailto:podpora@kreativnatovarna.si">podpora@kreativnatovarna.si</a></p>';
	echo '<p>ali obiščite:  &nbsp;<a href="https://kreativnatovarna.freshdesk.com/support/home" target="_blank">podpora.kreativnatovarna.si </a></p>';


}

function kt_guide_widget() {
	wp_add_dashboard_widget(
		'kt_guide_widget',         					// Widget slug.
		'Navodila - Kreativna tovarna',  		// Title.
		'kt_guide_widget_function' 					// Display function.
	);	
}
add_action( 'wp_dashboard_setup', 'kt_guide_widget' );


/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function kt_guide_widget_function() {

	echo "
	<hr>
	<a href='".get_template_directory_uri()."/pdf/wp_navodila.pdf'><h5><span class='kt-dash dashicons dashicons-wordpress'></span> <strong>NAVODILA ZA UPORABO (PDF)</strong></h5></a>
	<hr>";
}

function disable_default_dashboard_widgets() {
	// disable default dashboard widgets
	//remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_activity', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');

	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');

	// disable Simple:Press dashboard widget
	remove_meta_box('sf_announce', 'dashboard', 'normal');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');

remove_action('welcome_panel', 'wp_welcome_panel');