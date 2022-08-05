<?php
$postID = get_the_ID();
$title = get_the_title($postID);
$link = get_permalink($postID);

$address = get_field('establishments_address', $postID);
$npa = get_field('establishments_npa', $postID);
$locality = get_field('establishments_locality', $postID);
$cantons = get_the_terms( $postID, 'cantons' );

$relations = get_field('relationship_link', $postID);

$gallery = get_field('establishments_gallery', $postID);
$image = $gallery[0];

$terms = get_the_terms( $postID, 'establishments_types' );
shuffle($terms);
$termID = $terms[0]->term_id;
$typeImage = get_field('establishments_types_image', 'establishments_types_' . $termID);
if ($image['url']) {
    $imageURL = $image['url'];
} else {
    $imageURL = $typeImage['url'];
}
?>
<div class="establishments post-item">
    <div class="image" style="background-image:url(<?= $imageURL ?>);">
        <?= do_shortcode('[elementor-template id="1652"]'); ?>
    </div>
    <div class="datas">
        <a class="title" href="<?= $link ?>"><h3><?= $title ?></h3></a>
        <div class="address">
            <?= $address ?>,<br>
            <?= $npa ?> <?= $locality ?><br>
            <?php foreach ( $cantons as $canton ) {
                echo $canton->name;
            } ?>
        </div>
        <?php if ($relations) { ?>
            <?php $count = count($relations); ?>
            <?php if ($count == 1) { ?>
                <div class="count"><?= $count ?> offre disponible</div>
            <?php } else { ?>
                <div class="count"><?= $count ?> offres disponibles</div>
            <?php } ?>
        <?php } ?>
        <div class="permalink">
            <a class="btn" href="<?= $link ?>">Découvrir</a>
        </div>
    </div>
</div>
