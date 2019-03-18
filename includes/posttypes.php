<?php

function mls_post_type() {
    $labels = array(
        'name'                  => _x( 'MLS', 'Post type general name', 'mls' ),
        'singular_name'         => _x( 'MLS', 'Post type singular name', 'mls' ),
        'menu_name'             => _x( 'MLSes', 'Admin Menu text', 'mls' ),
        'name_admin_bar'        => _x( 'MLS', 'Add New on Toolbar', 'mls' ),
        'add_new'               => __( 'Add New', 'mls' ),
        'add_new_item'          => __( 'Add New MLS', 'mls' ),
        'new_item'              => __( 'New MLS', 'mls' ),
        'edit_item'             => __( 'Editar MLS', 'mls' ),
        'view_item'             => __( 'Ver MLS', 'mls' ),
        'all_items'             => __( 'Todos MLSes', 'mls' ),
        'search_items'          => __( 'Buscar MLSes', 'mls' ),
        'parent_item_colon'     => __( 'Padre MLSes:', 'mls' ),
        'not_found'             => __( 'No encontrados.', 'mls' ),
        'not_found_in_trash'    => __( 'No encontrados.', 'mls' ),
        'featured_image'        => _x( 'Imagen Destacada', '', 'mls' ),
        'set_featured_image'    => _x( 'Añadir imagen destacada', '', 'mls' ),
        'remove_featured_image' => _x( 'Borrar imagen', '', 'mls' ),
        'use_featured_image'    => _x( 'Usar como imagen', '', 'mls' ),
        'archives'              => _x( 'MLSes Archivo', '', 'mls' ),
        'insert_into_item'      => _x( 'Insertar en MLS', '', 'mls' ),
        'uploaded_to_this_item' => _x( 'Cargado en este MLS', '', 'mls' ),
        'filter_items_list'     => _x( 'Filtrar MLSes por lista', '”. Added in 4.4', 'mls' ),
        'items_list_navigation' => _x( 'Navegación de MLSes', '', 'mls' ),
        'items_list'            => _x( 'Lista de MLSes', '', 'mls' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'mls' ),
        'capability_type'    => 'page',
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports'           => array( 'title', 'editor'),
    );

    register_post_type( 'mls', $args );
}

add_action( 'init', 'mls_post_type' );


function mls_rewrite_flush() {
	mls_post_type();
	flush_rewrite_rules();
}


register_activation_hook(__FILE__, 'mls_rewrite_flush');