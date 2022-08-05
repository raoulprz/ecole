<?php

if ( ! function_exists('establishments_custom_post') ) {

    // Register Custom Post Type
    function establishments_custom_post() {

        $labels = array(
            'name'                  => _x( 'Etablissements', 'Post Type General Name', 'establishments' ),
            'singular_name'         => _x( 'Etablissement', 'Post Type Singular Name', 'establishments' ),
            'menu_name'             => __( 'Etablissements', 'establishments' ),
            'name_admin_bar'        => __( 'Etablissement', 'establishments' ),
            'archives'              => __( 'Archives', 'establishments' ),
            'attributes'            => __( 'Attributs', 'establishments' ),
            'parent_item_colon'     => __( 'Parent:', 'establishments' ),
            'all_items'             => __( 'Tous', 'establishments' ),
            'add_new_item'          => __( 'Ajouter', 'establishments' ),
            'add_new'               => __( 'Ajouter', 'establishments' ),
            'new_item'              => __( 'Nouveau', 'establishments' ),
            'edit_item'             => __( 'Modifier', 'establishments' ),
            'update_item'           => __( 'Mettre à jour', 'establishments' ),
            'view_item'             => __( 'Voir', 'establishments' ),
            'view_items'            => __( 'Voir tous les établissements', 'establishments' ),
            'search_items'          => __( 'Rechercher', 'establishments' ),
            'not_found'             => __( 'Aucun trouvé', 'establishments' ),
            'not_found_in_trash'    => __( 'Aucun trouvé dans la corbeille', 'establishments' ),
            'featured_image'        => __( 'Image de couverture', 'establishments' ),
            'set_featured_image'    => __( 'Sélectionner l\'image', 'establishments' ),
            'remove_featured_image' => __( 'Retirer l\'image', 'establishments' ),
            'use_featured_image'    => __( 'Utiliser comme couverture', 'establishments' ),
            'insert_into_item'      => __( 'Insérer', 'establishments' ),
            'uploaded_to_this_item' => __( 'Ajouter à cet établissement', 'establishments' ),
            'items_list'            => __( 'Liste des établissements', 'establishments' ),
            'items_list_navigation' => __( 'Navigation', 'establishments' ),
            'filter_items_list'     => __( 'Filtrer', 'establishments' ),
        );
        $rewrite = array(
            'slug'                  => 'etablissements',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'Etablissement', 'establishments' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'revisions', 'author' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-admin-home',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'etablissements',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'post',
        );
        register_post_type( 'establishments', $args );

    }
    add_action( 'init', 'establishments_custom_post', 0 );
}

add_action('acf/save_post', 'establishments_name_update');
function establishments_name_update( $post_id ) {
    $postType = get_post_type($post_id);
	$title = get_the_title($post_id);
    if ( $postType == 'establishments' ) {
        if( $title ) {
            update_field('establishments_name', $title, $post_id);
        }
    }
}