<?php
$postID = get_the_ID();
$gallery = get_field('offers_gallery', $postID);
$terms = get_the_terms( $postID, 'establishments_types' );
shuffle($terms);
$termID = $terms[0]->term_id;
$typeImage = get_field('establishments_types_image', 'establishments_types_' . $termID);
$imageURL = $typeImage['url'];
?>

<?php if ($gallery) { ?>
    <div class="owl-carousel owl-theme gallery-carousel">
        <?php foreach ($gallery as $image) {
            ?>
            <a href="<?php echo esc_url($image['url']); ?>" style="background-image:url(<?= $image['url'] ?>);">
            </a>
            <?php } ?>
    </div>
<?php } else { ?>
    <div class="offers cover" style="background-image:url(<?= $imageURL ?>);">
    </div>
<?php } ?>