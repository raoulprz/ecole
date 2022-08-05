<?php

//Custom Macros
add_filter( 'jet-engine/listings/macros-list', 'ad_add_marcos' );
function ad_add_marcos( $list ) {
    $list['Aujourd\'hui'] = 'today';
    $list['Offre - Début'] = 'offers_start';
    $list['Offre - Fin'] = 'offers_end';

    return $list;
}

function today() {
    return date('Ymd');
}

function offers_start() {
    $postID = get_the_ID();
    $datefrom_string = get_field('offers_start', $postID);
    return $datefrom_string;
}

function offers_end() {
    $postID = get_the_ID();
    $dateto_string = get_field('offers_end', $postID);
    return $dateto_string;
}
