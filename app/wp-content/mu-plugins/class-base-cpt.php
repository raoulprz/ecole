<?php
/*
Plugin Name: Base class for custom post types
Version: 0.1
*/

namespace Kalysto;

class PostType
{
    protected static $post_type = 'post';

    /**
     * Get all
     *
     * @return array  array of  posts
     */
    public static function all()
    {
        $posts = get_posts([
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'post_type' => static::$post_type,
            'orderby' => 'title',
            'order'   => 'ASC',
            'suppress_filters' => false,
        ]);

        if (empty($posts)) {
            return false;
        }

        return $posts;
    }

    /**
     * Get one post object of the post type
     *
     * @return object  post object
     */
    public static function find($id)
    {
        $post = get_post($id);

        if (empty($post)) {
            return false;
        }

        if ($post->post_type !== static::$post_type) {
            return false;
        }

        return $post;
    }
}


