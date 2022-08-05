<?php
function my_post_object_query( $args ) {
    if ( !current_user_can( 'manage_options' ) ) {
        //Something other than an administrator
        $args['author'] = get_current_user_id();
    }
    $args['post_status'] = array('publish');

    return $args;
}
