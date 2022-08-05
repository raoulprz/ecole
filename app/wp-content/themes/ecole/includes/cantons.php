<?php
if ( ! function_exists( 'cantons' ) ) {

// Register Custom Taxonomy
function cantons() {

	$labels = array(
		'name'                       => _x( 'Cantons', 'Taxonomy General Name', 'cantons' ),
		'singular_name'              => _x( 'Canton', 'Taxonomy Singular Name', 'cantons' ),
		'menu_name'                  => __( 'Cantons', 'cantons' ),
		'all_items'                  => __( 'Tous les cantons', 'cantons' ),
		'parent_item'                => __( 'Parent', 'cantons' ),
		'parent_item_colon'          => __( 'canton parent:', 'cantons' ),
		'new_item_name'              => __( 'Ajouter', 'cantons' ),
		'add_new_item'               => __( 'Ajouter un canton', 'cantons' ),
		'edit_item'                  => __( 'Modifier le canton', 'cantons' ),
		'update_item'                => __( 'Mettre à jour', 'cantons' ),
		'view_item'                  => __( 'Voir le canton', 'cantons' ),
		'separate_items_with_commas' => __( 'Séparer les cantons par des virgules', 'cantons' ),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer', 'cantons' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'cantons' ),
		'popular_items'              => __( 'Popular Items', 'cantons' ),
		'search_items'               => __( 'Chercher un canton', 'cantons' ),
		'not_found'                  => __( 'Pas trouvé', 'cantons' ),
		'no_terms'                   => __( 'Aucun canton', 'cantons' ),
		'items_list'                 => __( 'Les cantons', 'cantons' ),
		'items_list_navigation'      => __( 'Items list navigation', 'cantons' ),
	);
	$rewrite = array(
		'slug'                       => 'cantons',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'cantons', array( 'establishments', 'offers' ), $args );

}
add_action( 'init', 'cantons', 0 );

}