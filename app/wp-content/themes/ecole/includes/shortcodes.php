<?php

//Tell if a thumbnail exists
add_shortcode( 'thumbnail_exist', 'myshortcode_thumbnail_exist' );
function myshortcode_thumbnail_exist(){
    if ( has_post_thumbnail() ) {
        $thumbnail = 'true';
    } else {
        $thumbnail = 'false';
    }
    return $thumbnail;
}
add_shortcode( 'establishments-gallery', 'myshortcode_establishments_gallery' );

function myshortcode_search_grid($atts){
    $value = shortcode_atts( array(
        'titre' => "",
        'texte' => "",
    ), $atts );
    set_query_var('titre', $value['titre']);
    set_query_var('texte', $value['texte']);

    ob_start();
    get_template_part('partials/search-grid');
    return ob_get_clean();
}
add_shortcode( 'search-grid', 'myshortcode_search_grid' );

function myshortcode_include_ttemplate($atts){
    $value = shortcode_atts( array(
        'template' => "",
        'categorie' => "",
        'titre' => "",
        'texte' => "",
        'posts' => "-1",
    ), $atts );

    set_query_var('categorie', $value['categorie']);
    set_query_var('titre', $value['titre']);
    set_query_var('texte', $value['texte']);
    set_query_var('posts', $value['posts']);

    ob_start();
    get_template_part('partials/'.$value['template'].'');
    return ob_get_clean();
}
add_shortcode( 'include', 'myshortcode_include_ttemplate' );

/**
 * Establishments shortcodes
 */
function myshortcode_establishments_address($attr){
    $postID = get_the_ID();
    $address = get_field('establishments_address', $postID);
    $npa = get_field('establishments_npa', $postID);
    $locality = get_field('establishments_locality', $postID);
    $fullAddress = $address.', '.$npa.' '.$locality;
    return $fullAddress;
}
add_shortcode( 'establishments-address', 'myshortcode_establishments_address' );

function myshortcode_establishments_cover_url($attr){
    $postID = get_the_ID();
    $gallery = get_field('establishments_gallery', $postID);
    $firstImg = reset($gallery);
    $coverURL = $firstImg['url'];
    return $coverURL;
}
add_shortcode( 'establishments-cover', 'myshortcode_establishments_cover_url' );
