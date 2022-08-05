<?php
if ( ! function_exists( 'establishments_types' ) ) {

// Register Custom Taxonomy
function establishments_types() {

	$labels = array(
		'name'                       => _x( 'Types de soins', 'Taxonomy General Name', 'establishments_types' ),
		'singular_name'              => _x( 'Type de soins', 'Taxonomy Singular Name', 'establishments_types' ),
		'menu_name'                  => __( 'Types de soins', 'establishments_types' ),
		'all_items'                  => __( 'Tous les types', 'establishments_types' ),
		'parent_item'                => __( 'Parent', 'establishments_types' ),
		'parent_item_colon'          => __( 'type parent:', 'establishments_types' ),
		'new_item_name'              => __( 'Ajouter', 'establishments_types' ),
		'add_new_item'               => __( 'Ajouter un type', 'establishments_types' ),
		'edit_item'                  => __( 'Modifier le type', 'establishments_types' ),
		'update_item'                => __( 'Mettre à jour', 'establishments_types' ),
		'view_item'                  => __( 'Voir le type', 'establishments_types' ),
		'separate_items_with_commas' => __( 'Séparer les types par des virgules', 'establishments_types' ),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer', 'establishments_types' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'establishments_types' ),
		'popular_items'              => __( 'Popular Items', 'establishments_types' ),
		'search_items'               => __( 'Chercher un type', 'establishments_types' ),
		'not_found'                  => __( 'Pas trouvé', 'establishments_types' ),
		'no_terms'                   => __( 'Aucun type', 'establishments_types' ),
		'items_list'                 => __( 'Les types de soins', 'establishments_types' ),
		'items_list_navigation'      => __( 'Items list navigation', 'establishments_types' ),
	);
	$rewrite = array(
		'slug'                       => 'types',
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
	register_taxonomy( 'establishments_types', array( 'establishments', 'offers' ), $args );

}
add_action( 'init', 'establishments_types', 0 );

}