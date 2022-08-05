<?php
$postID = get_the_ID();
$title = get_the_title($postID);
$link = get_permalink($postID);
$fullprice = get_field('offers_fullprice', $postID);
$discount = get_field('offers_discount', $postID);
$discounttag = get_field('offers_discounttag', $postID);
$start = get_field('offers_start', $postID);
$end = get_field('offers_end', $postID);
$relation = get_field('relationship_link', $postID);
$relationID = $relation[0];
$establishment = get_the_title($relationID);
$establishmentLink = get_permalink($relationID);
$locality = get_field('establishments_locality', $relationID);

$fulladdress = get_field('offers_fulladdress', $postID);

$gallery = get_field('offers_gallery', $postID);
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
<div class="offers post-item">
    <div class="image" style="background-image:url(<?= $imageURL ?>);">
        <div class="discounttag"><?= $discounttag ?></div>
    </div>
    <div class="datas">
        <a class="title" href="<?= $link ?>"><h3><?= $title ?></h3></a>
        <div class="col left">
            <?php if ($relation) { ?>
            <div class="establishment">
                <a href="<?= $establishmentLink ?>">
                    <?= $establishment ?><br>
                    <?= $locality ?>
                </a>
            </div>
            <?php } ?>
        </div>
        <div class="col right">
            <div class="fullprice"><small>CHF </small><?= $fullprice ?>.–</div>
            <div class="discount"><small>CHF </small><?= $discount ?>.–</div>
        </div>
        <div class="permalink">
            <a class="btn" href="<?= $link ?>">J'en profite</a>
        </div>
    </div>
</div>
