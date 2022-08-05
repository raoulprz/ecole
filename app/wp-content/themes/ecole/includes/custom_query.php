<?php
function custom_query($query) {
    //Serach limitations
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('events', 'medias'));
        $query->set('posts_per_page', 9 );
    }

    //Events archive
    if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'events' ) ) {
        $id = get_the_ID();
        //Set the order ASC or DESC
        $query->set( 'order', 'ASC' );
        $query->set('posts_per_page', -1 );
    }

    return $query;
}
add_filter('pre_get_posts','custom_query');