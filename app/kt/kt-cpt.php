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
 * CPT 02 -- Projekti
 */
function cpt_project() {
    $labels = array(
        'name'                => _x( 'Projekti', 'Post Type General Name', 'kt-cpt' ),
        'singular_name'       => _x( 'Projekt', 'Post Type Singular Name', 'kt-cpt' ),
        'menu_name'           => __( 'Projekti', 'kt-cpt' ),
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
        'label'               => __( 'Projekti', 'kt-cpt' ),
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
        'rewrite' => array('slug' => 'projekti'),
    );
    register_post_type( 'projekt', $args );

}
add_action( 'init', 'cpt_project', 0 );


/**
 * CPT 03 -- Storitve
 */
function cpt_service() {
    $labels = array(
        'name'                => _x( 'Storitve', 'Post Type General Name', 'kt-cpt' ),
        'singular_name'       => _x( 'Storitev', 'Post Type Singular Name', 'kt-cpt' ),
        'menu_name'           => __( 'Storitve', 'kt-cpt' ),
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
        'label'               => __( 'Storitve', 'kt-cpt' ),
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
        'rewrite' => array('slug' => 'storitve'),
    );
    register_post_type( 'storitev', $args );

}
add_action( 'init', 'cpt_service', 0 );


/**
 * TAX 01 -- Projekti
 */
function cat_project() {
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
    register_taxonomy( 'cat_project', array( 'projekt' ), $args );
}

add_action( 'init', 'cat_project', 0 );


/**
 * TAX 02 -- Storitve
 */
function cat_service() {
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
    register_taxonomy( 'cat_service', array( 'storitev' ), $args );
}

add_action( 'init', 'cat_service', 0 );