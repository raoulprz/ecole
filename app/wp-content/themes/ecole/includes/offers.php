<?php

if ( ! function_exists('offers_custom_post') ) {

    // Register Custom Post Type
    function offers_custom_post() {

        $labels = array(
            'name'                  => _x( 'Offres', 'Post Type General Name', 'offers' ),
            'singular_name'         => _x( 'Offre', 'Post Type Singular Name', 'offers' ),
            'menu_name'             => __( 'Offres', 'offers' ),
            'name_admin_bar'        => __( 'Offres', 'offers' ),
            'archives'              => __( 'Archives', 'offers' ),
            'attributes'            => __( 'Attributs', 'offers' ),
            'parent_item_colon'     => __( 'Parent:', 'offers' ),
            'all_items'             => __( 'Tous', 'offers' ),
            'add_new_item'          => __( 'Ajouter', 'offers' ),
            'add_new'               => __( 'Ajouter', 'offers' ),
            'new_item'              => __( 'Nouveau', 'offers' ),
            'edit_item'             => __( 'Modifier', 'offers' ),
            'update_item'           => __( 'Mettre à jour', 'offers' ),
            'view_item'             => __( 'Voir', 'offers' ),
            'view_items'            => __( 'Voir toutes les offres', 'offers' ),
            'search_items'          => __( 'Rechercher', 'offers' ),
            'not_found'             => __( 'Aucune offre trouvée', 'offers' ),
            'not_found_in_trash'    => __( 'Aucune trouvée dans la corbeille', 'offers' ),
            'featured_image'        => __( 'Image de couverture', 'offers' ),
            'set_featured_image'    => __( 'Sélectionner l\'image', 'offers' ),
            'remove_featured_image' => __( 'Retirer l\'image', 'offers' ),
            'use_featured_image'    => __( 'Utiliser comme couverture', 'offers' ),
            'insert_into_item'      => __( 'Insérer', 'offers' ),
            'uploaded_to_this_item' => __( 'Ajouter à cette offre', 'offers' ),
            'items_list'            => __( 'Liste des offres', 'offers' ),
            'items_list_navigation' => __( 'Navigation', 'offers' ),
            'filter_items_list'     => __( 'Filtrer', 'offers' ),
        );
        $rewrite = array(
            'slug'                  => 'offres',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'Offres', 'offers' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'revisions', 'author' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-cart',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'offres',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'post',
        );
        register_post_type( 'offers', $args );

    }
    add_action( 'init', 'offers_custom_post', 0 );
}

add_action('acf/save_post', 'offers_name_update');
function offers_name_update( $post_id ) {
    $postType = get_post_type($post_id);
	$title = get_the_title($post_id);
    $relation = get_field('relationship_link', $post_id);
    $relationID = $relation[0];
    $address = get_field('establishments_address', $relationID);
    $npa = get_field('establishments_npa', $relationID);
    $locality = get_field('establishments_locality', $relationID);
    $fulladdress = $address.', '.$npa.' '.$locality;
    $cantons = get_the_terms( $relationID, 'cantons' );
    if ( $postType == 'offers' ) {
        if ($title) {
            update_field('offers_name', $title, $post_id);
        }
        if ($fulladdress) {
            update_field('offers_fulladdress', $fulladdress, $post_id);
        }
        if ($cantons) {
            wp_set_post_terms( $post_id, $cantons[0]->term_id, 'cantons', true );
        }
    }
}