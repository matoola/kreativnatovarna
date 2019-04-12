<?php

/**
 * CPT 01 -- Drsnik
 */
function cpt_slideshow() {
  $labels = array(
    'name'                => _x( 'Drsnik', 'Post Type General Name', 'kt-cpt' ),
    'singular_name'       => _x( 'Drsnik', 'Post Type Singular Name', 'kt-cpt' ),
    'menu_name'           => __( 'Drsnik', 'kt-cpt' ),
    'parent_item_colon'   => __( 'Starševski prispevek', 'kt-cpt' ),
    'all_items'           => __( 'Vsi prispevki', 'kt-cpt' ),
    'view_item'           => __( 'Poglej prispevek', 'kt-cpt' ),
    'add_new_item'        => __( 'Dodaj nov', 'kt-cpt' ),
    'add_new'             => __( 'Dodaj nov', 'kt-cpt' ),
    'edit_item'           => __( 'Uredi', 'kt-cpt' ),
    'update_item'         => __( 'Posodobi', 'kt-cpt' ),
    'search_items'        => __( 'Išči', 'kt-cpt' ),
    'not_found'           => __( 'Nič ni bilo najdenega', 'kt-cpt' ),
    'not_found_in_trash'  => __( 'V smeteh ni bilo nič najdenega', 'kt-cpt' ),
  );
  $args = array(
    'label'               => __( 'Drsnik', 'kt-cpt' ),
    'description'         => __( 'Opis', 'kt-cpt' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'author' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-slides',
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => false,
  );
  register_post_type( 'drsnik', $args );

}
add_action( 'init', 'cpt_slideshow', 0 );


/**
 * CPT 02 -- Dejavnosti
 */
function cpt_activity() {
  $labels = array(
    'name'                => _x( 'Dejavnosti', 'Post Type General Name', 'kt-cpt' ),
    'singular_name'       => _x( 'Dejavnost', 'Post Type Singular Name', 'kt-cpt' ),
    'menu_name'           => __( 'Dejavnosti', 'kt-cpt' ),
    'parent_item_colon'   => __( 'Starševski prispevek', 'kt-cpt' ),
    'all_items'           => __( 'Vse dejavnosti', 'kt-cpt' ),
    'view_item'           => __( 'Poglej prispevek', 'kt-cpt' ),
    'add_new_item'        => __( 'Dodaj nov', 'kt-cpt' ),
    'add_new'             => __( 'Dodaj nov', 'kt-cpt' ),
    'edit_item'           => __( 'Uredi', 'kt-cpt' ),
    'update_item'         => __( 'Posodobi', 'kt-cpt' ),
    'search_items'        => __( 'Išči', 'kt-cpt' ),
    'not_found'           => __( 'Nič ni bilo najdenega', 'kt-cpt' ),
    'not_found_in_trash'  => __( 'V smeteh ni bilo nič najdenega', 'kt-cpt' ),
  );
  $args = array(
    'label'               => __( 'Dejavnosti', 'kt-cpt' ),
    'description'         => __( 'Opis', 'kt-cpt' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'author' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-portfolio',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite' => array('slug' => 'dejavnosti'),
  );
  register_post_type( 'dejavnost', $args );

}
add_action( 'init', 'cpt_activity', 0 );


/**
 * CPT 03 -- Dogodki
 */
function cpt_event() {
  $labels = array(
    'name'                => _x( 'Dogodki', 'Post Type General Name', 'kt-cpt' ),
    'singular_name'       => _x( 'Dogodek', 'Post Type Singular Name', 'kt-cpt' ),
    'menu_name'           => __( 'Dogodki', 'kt-cpt' ),
    'parent_item_colon'   => __( 'Starševski prispevek', 'kt-cpt' ),
    'all_items'           => __( 'Vsi dogodki', 'kt-cpt' ),
    'view_item'           => __( 'Poglej prispevek', 'kt-cpt' ),
    'add_new_item'        => __( 'Dodaj nov', 'kt-cpt' ),
    'add_new'             => __( 'Dodaj nov', 'kt-cpt' ),
    'edit_item'           => __( 'Uredi', 'kt-cpt' ),
    'update_item'         => __( 'Posodobi', 'kt-cpt' ),
    'search_items'        => __( 'Išči', 'kt-cpt' ),
    'not_found'           => __( 'Nič ni bilo najdenega', 'kt-cpt' ),
    'not_found_in_trash'  => __( 'V smeteh ni bilo nič najdenega', 'kt-cpt' ),
  );
  $args = array(
    'label'               => __( 'Dogodki', 'kt-cpt' ),
    'description'         => __( 'Opis', 'kt-cpt' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'author' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 6,
    'menu_icon'           => 'dashicons-book',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite' => array('slug' => 'dogodki'),
  );
  register_post_type( 'dogodek', $args );

}
add_action( 'init', 'cpt_event', 0 );


/**
 * CPT 04 -- Uporabni viri
 */
function cpt_source() {
  $labels = array(
    'name'                => _x( 'Uporabni viri', 'Post Type General Name', 'kt-cpt' ),
    'singular_name'       => _x( 'Uporabni vir', 'Post Type Singular Name', 'kt-cpt' ),
    'menu_name'           => __( 'Uporabni viri', 'kt-cpt' ),
    'parent_item_colon'   => __( 'Starševski prispevek', 'kt-cpt' ),
    'all_items'           => __( 'Vsi uporabni viri', 'kt-cpt' ),
    'view_item'           => __( 'Poglej prispevek', 'kt-cpt' ),
    'add_new_item'        => __( 'Dodaj nov', 'kt-cpt' ),
    'add_new'             => __( 'Dodaj nov', 'kt-cpt' ),
    'edit_item'           => __( 'Uredi', 'kt-cpt' ),
    'update_item'         => __( 'Posodobi', 'kt-cpt' ),
    'search_items'        => __( 'Išči', 'kt-cpt' ),
    'not_found'           => __( 'Nič ni bilo najdenega', 'kt-cpt' ),
    'not_found_in_trash'  => __( 'V smeteh ni bilo nič najdenega', 'kt-cpt' ),
  );
  $args = array(
    'label'               => __( 'Uporabni viri', 'kt-cpt' ),
    'description'         => __( 'Opis', 'kt-cpt' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'author' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 6,
    'menu_icon'           => 'dashicons-book-alt',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite' => array('slug' => 'uporabni-viri'),
  );
  register_post_type( 'uporabni_vir', $args );

}
add_action( 'init', 'cpt_source', 0 );


/**
 * TAX 01 -- Kategorije dogodkov
 */
function cat_event() {
	$labels = array(
		'name'                       => _x( 'Kategorije', 'taxonomy general name', 'kt-cpt' ),
		'singular_name'              => _x( 'Kategorija', 'taxonomy singular name', 'kt-cpt' ),
		'search_items'               => __( 'Išči kategorijo', 'kt-cpt' ),
		'popular_items'              => __( 'Popularne kategorije', 'kt-cpt' ),
		'all_items'                  => __( 'Vse kategorije', 'kt-cpt' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Uredi kategorijo', 'kt-cpt' ),
		'update_item'                => __( 'Posodobi kategorijo', 'kt-cpt' ),
		'add_new_item'               => __( 'Dodaj novo kategorijo', 'kt-cpt' ),
		'new_item_name'              => __( 'Novo ime za kategorijo', 'kt-cpt' ),
		'separate_items_with_commas' => __( 'Razdeli z vejicami', 'kt-cpt' ),
		'add_or_remove_items'        => __( 'Dodaj ali odstrani', 'kt-cpt' ),
		'choose_from_most_used'      => __( 'Največkrat uporabljene', 'kt-cpt' ),
		'not_found'                  => __( 'Nič ni bilo najdenega.', 'kt-cpt' ),
		'menu_name'                  => __( 'Kategorije', 'kt-cpt' )
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => false,
    'public'                => false,
    'show_in_nav_menus'     => false,
	);
    register_taxonomy( 'cat_event', array( 'dogodek' ), $args );
}

add_action( 'init', 'cat_event', 0 );


/**
 * TAX 02 -- Tip dogodka
 */
function cat_event_type() {
	$labels = array(
		'name'                       => _x( 'Tip dogodka', 'taxonomy general name', 'kt-cpt' ),
		'singular_name'              => _x( 'Tip dogodka', 'taxonomy singular name', 'kt-cpt' ),
		'search_items'               => __( 'Išči kategorijo', 'kt-cpt' ),
		'popular_items'              => __( 'Popularne kategorije', 'kt-cpt' ),
		'all_items'                  => __( 'Vse kategorije', 'kt-cpt' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Uredi kategorijo', 'kt-cpt' ),
		'update_item'                => __( 'Posodobi kategorijo', 'kt-cpt' ),
		'add_new_item'               => __( 'Dodaj novo kategorijo', 'kt-cpt' ),
		'new_item_name'              => __( 'Novo ime za kategorijo', 'kt-cpt' ),
		'separate_items_with_commas' => __( 'Razdeli z vejicami', 'kt-cpt' ),
		'add_or_remove_items'        => __( 'Dodaj ali odstrani', 'kt-cpt' ),
		'choose_from_most_used'      => __( 'Največkrat uporabljene', 'kt-cpt' ),
		'not_found'                  => __( 'Nič ni bilo najdenega.', 'kt-cpt' ),
		'menu_name'                  => __( 'Tip dogodka', 'kt-cpt' )
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => false,
    'public'                => false,
    'show_in_nav_menus'     => false,
	);
    register_taxonomy( 'cat_event_type', array( 'dogodek' ), $args );
}

add_action( 'init', 'cat_event_type', 0 );


/**
 * TAX 03 -- Kategorije za uporabne vire
 */
function cat_source() {
	$labels = array(
		'name'                       => _x( 'Kategorije', 'taxonomy general name', 'kt-cpt' ),
		'singular_name'              => _x( 'Kategorija', 'taxonomy singular name', 'kt-cpt' ),
		'search_items'               => __( 'Išči kategorijo', 'kt-cpt' ),
		'popular_items'              => __( 'Popularne kategorije', 'kt-cpt' ),
		'all_items'                  => __( 'Vse kategorije', 'kt-cpt' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Uredi kategorijo', 'kt-cpt' ),
		'update_item'                => __( 'Posodobi kategorijo', 'kt-cpt' ),
		'add_new_item'               => __( 'Dodaj novo kategorijo', 'kt-cpt' ),
		'new_item_name'              => __( 'Novo ime za kategorijo', 'kt-cpt' ),
		'separate_items_with_commas' => __( 'Razdeli z vejicami', 'kt-cpt' ),
		'add_or_remove_items'        => __( 'Dodaj ali odstrani', 'kt-cpt' ),
		'choose_from_most_used'      => __( 'Največkrat uporabljene', 'kt-cpt' ),
		'not_found'                  => __( 'Nič ni bilo najdenega.', 'kt-cpt' ),
		'menu_name'                  => __( 'Kategorije', 'kt-cpt' )
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => false,
    'public'                => false,
    'show_in_nav_menus'     => false,
	);
    register_taxonomy( 'cat_source', array( 'uporabni_vir' ), $args );
}

add_action( 'init', 'cat_source', 0 );