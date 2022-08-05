<?php
$catVar = get_query_var('cat', false);
$titleVar = get_query_var('titre', false);
$textVar = get_query_var('texte', false);
$postsVar = get_query_var('posts', false);
$postType = get_post_type();
$meta_query = '';
$postID = get_the_ID();
$relation = get_field('relationship_link', $postID);
$relationID = $relation[0];
$today = date('Ymd');

$tax_query = '';
if ($catVar) {
    $tax_query = array(
        array (
            'taxonomy' => 'establishments_types',
            'field' => 'slug',
            'terms' => $catVar,
        )
    );
}

if ($postType == 'establishments') {
    // $offers = get_field('relationship_link', $postID);
    $meta_query = array(
        'relation' => 'AND',
        array(
            'key'     => 'offers_start',
            'value'   => date("Ymd"),
            'compare' => '<=',
            'type'    => 'DATE'
        ),
        array(
            'key'     => 'offers_end',
            'value'   => date("Ymd"),
            'compare' => '>=',
            'type'    => 'DATE'
        ),
        array(
            'key' => 'relationship_link',
            'value' => '"' . $postID . '"',
            'compare' => 'LIKE'
        )
    );
} else if ($postType == 'offers') {
    // $offers = get_field('relationship_link', $relationID);
    $meta_query = array(
        'relation' => 'AND',
        array(
            'key'     => 'offers_start',
            'value'   => date("Ymd"),
            'compare' => '<=',
            'type'    => 'DATE'
        ),
        array(
            'key'     => 'offers_end',
            'value'   => date("Ymd"),
            'compare' => '>=',
            'type'    => 'DATE'
        ),
        array(
            'key' => 'relationship_link',
            'value' => '"' . $relationID . '"',
            'compare' => 'LIKE'
        )
    );
} else {
    $meta_query = array(
        'relation' => 'AND',
        array(
            'key'     => 'offers_start',
            'value'   => date("Ymd"),
            'compare' => '<=',
            'type'    => 'DATE'
        ),
        array(
            'key'     => 'offers_end',
            'value'   => date("Ymd"),
            'compare' => '>=',
            'type'    => 'DATE'
        ),
    );
}

$offers = get_posts(array(
    'post_type' => 'offers',
    'posts_per_page' => $postsVar,
    'tax_query' => $tax_query,
    'meta_query' => $meta_query,
));

if( $offers ) { ?>
    <div class="offers carousel">
        <?php if($titleVar) { ?>
            <div class="carousel-title">
                <h2><?= $titleVar ?></h2>
                <h6><?= $textVar ?></h6>
            </div>
        <?php } ?>
        <div class="owl-carousel owl-theme offers-carousel nodots">
            <?php  foreach( $offers as $post ) {
                setup_postdata($post);
                get_template_part('partials/offers-card');
            } ?>
        </div>
    </div>
<?php } ?>
<?php wp_reset_postdata(); ?>