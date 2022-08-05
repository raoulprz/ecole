<?php
/*
Plugin Name: SVG upload
Description: Allow SVG upload
Version: 0.1
*/

add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});
