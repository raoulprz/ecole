<?php
$catVar = get_query_var('cat', false);
$titleVar = get_query_var('titre', false);
$textVar = get_query_var('texte', false);
$postsVar = get_query_var('posts', false);
$postType = get_post_type();
$meta_query = '';
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

$establishments = get_posts(array(
    'post_type' => 'establishments',
    'posts_per_page' => $postsVar,
    'tax_query' => $tax_query,
));
?>

<?php if( $establishments ) { ?>
    <div class="establishments carousel">
        <?php if($titleVar) { ?>
            <div class="carousel-title">
                <h2><?= $titleVar ?></h2>
                <h6><?= $textVar ?></h6>
            </div>
        <?php } ?>
        <div class="owl-carousel owl-theme establishments-carousel nodots">
            <?php  foreach( $establishments as $post ) {
                setup_postdata($post);
                get_template_part('partials/establishments-card');
            } ?>
        </div>
    </div>
<?php } ?>
<?php wp_reset_postdata(); ?>