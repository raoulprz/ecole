<?php

if ( ! function_exists('booking_custom_post') ) {

    // Register Custom Post Type
    function booking_custom_post() {

        $labels = array(
            'name'                  => _x( 'Réservations', 'Post Type General Name', 'booking' ),
            'singular_name'         => _x( 'Réservation', 'Post Type Singular Name', 'booking' ),
            'menu_name'             => __( 'Réservations', 'booking' ),
            'name_admin_bar'        => __( 'Réservations', 'booking' ),
            'archives'              => __( 'Archives', 'booking' ),
            'attributes'            => __( 'Attributs', 'booking' ),
            'parent_item_colon'     => __( 'Parent:', 'booking' ),
            'all_items'             => __( 'Tous', 'booking' ),
            'add_new_item'          => __( 'Ajouter', 'booking' ),
            'add_new'               => __( 'Ajouter', 'booking' ),
            'new_item'              => __( 'Nouveau', 'booking' ),
            'edit_item'             => __( 'Modifier', 'booking' ),
            'update_item'           => __( 'Mettre à jour', 'booking' ),
            'view_item'             => __( 'Voir', 'booking' ),
            'view_items'            => __( 'Voir toutes les réservations', 'booking' ),
            'search_items'          => __( 'Rechercher', 'booking' ),
            'not_found'             => __( 'Aucune Réservation trouvée', 'booking' ),
            'not_found_in_trash'    => __( 'Aucune trouvée dans la corbeille', 'booking' ),
            'featured_image'        => __( 'Image de couverture', 'booking' ),
            'set_featured_image'    => __( 'Sélectionner l\'image', 'booking' ),
            'remove_featured_image' => __( 'Retirer l\'image', 'booking' ),
            'use_featured_image'    => __( 'Utiliser comme couverture', 'booking' ),
            'insert_into_item'      => __( 'Insérer', 'booking' ),
            'uploaded_to_this_item' => __( 'Ajouter à cette Réservation', 'booking' ),
            'items_list'            => __( 'Liste des réservations', 'booking' ),
            'items_list_navigation' => __( 'Navigation', 'booking' ),
            'filter_items_list'     => __( 'Filtrer', 'booking' ),
        );
        $rewrite = array(
            'slug'                  => 'reservations',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'Réservations', 'booking' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'revisions', 'author' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-thumbs-up',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'post',
        );
        register_post_type( 'booking', $args );

    }
    add_action( 'init', 'booking_custom_post', 0 );
}

add_action('acf/save_post', 'booking_uniq_id');
function booking_uniq_id( $post_id ) {
    $postType = get_post_type($post_id);
    $resaID = get_field('booking_id', $post_id);
    $id = uniqid ('resa');
    if ( empty($resaID) && ($postType == 'booking') ) {
        update_field('booking_id', $id, $post_id);
        wp_update_post( [
            'ID' => $post_id,
            'post_title' => $id,
        ] );
    }
}