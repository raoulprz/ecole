<?php
$catVar = get_query_var('cat', false);
$titleVar = get_query_var('titre', false);
$textVar = get_query_var('texte', false);
$postsVar = get_query_var('posts', false);
$postType = get_post_type();
$postID = get_the_ID();

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

$args = array(
    'post_type' => array( 'establishments' ),
    'post_status' => array( 'publish' ),
    'nopaging' => true,
    'posts_per_page' => $postsVar,
    'tax_query' => $tax_query,
);
?>

<div class="establishments grid">
    <?php if($titleVar) { ?>
        <div class="carousel-title">
            <h2><?= $titleVar ?></h2>
            <h6><?= $textVar ?></h6>
        </div>
    <?php } ?>

    <?php
    $establishments_query = new WP_Query( $args );
    if ( $establishments_query->have_posts() ) { ?>
        <div class="establishments-grid">
            <?php while ( $establishments_query->have_posts() ) {
                $establishments_query->the_post();
                ?>
                <div class="grid-element">
                    <?php get_template_part('partials/establishments-card'); ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <?php wp_reset_query(); ?>
</div>