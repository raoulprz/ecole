<?php

if ( ! function_exists('account_custom_post') ) {

    // Register Custom Post Type
    function account_custom_post() {

        $labels = array(
            'name'                  => _x( 'Compte', 'Post Type General Name', 'account' ),
            'singular_name'         => _x( 'Compte', 'Post Type Singular Name', 'account' ),
            'menu_name'             => __( 'Compte', 'account' ),
            'name_admin_bar'        => __( 'Compte', 'account' ),
            'archives'              => __( 'Archives', 'account' ),
            'attributes'            => __( 'Attributs', 'account' ),
            'parent_item_colon'     => __( 'Parent:', 'account' ),
            'all_items'             => __( 'Tous', 'account' ),
            'add_new_item'          => __( 'Ajouter', 'account' ),
            'add_new'               => __( 'Ajouter', 'account' ),
            'new_item'              => __( 'Nouveau', 'account' ),
            'edit_item'             => __( 'Modifier', 'account' ),
            'update_item'           => __( 'Mettre à jour', 'account' ),
            'view_item'             => __( 'Voir', 'account' ),
            'view_items'            => __( 'Voir toutes les Compte', 'account' ),
            'search_items'          => __( 'Rechercher', 'account' ),
            'not_found'             => __( 'Aucune Compte trouvée', 'account' ),
            'not_found_in_trash'    => __( 'Aucune trouvée dans la corbeille', 'account' ),
            'featured_image'        => __( 'Image de couverture', 'account' ),
            'set_featured_image'    => __( 'Sélectionner l\'image', 'account' ),
            'remove_featured_image' => __( 'Retirer l\'image', 'account' ),
            'use_featured_image'    => __( 'Utiliser comme couverture', 'account' ),
            'insert_into_item'      => __( 'Insérer', 'account' ),
            'uploaded_to_this_item' => __( 'Ajouter', 'account' ),
            'items_list'            => __( 'Liste', 'account' ),
            'items_list_navigation' => __( 'Navigation', 'account' ),
            'filter_items_list'     => __( 'Filtrer', 'account' ),
        );
        $rewrite = array(
            'slug'                  => 'compte',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'Compte', 'account' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'revisions', 'author' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-admin-users',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'post',
        );
        register_post_type( 'account', $args );

    }
    add_action( 'init', 'account_custom_post', 0 );
}
