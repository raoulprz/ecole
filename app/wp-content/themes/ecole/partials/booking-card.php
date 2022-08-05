<?php
$postID = get_the_ID();

$bookingID = get_field('booking_id', $postID);
$offers = get_field('booking_offers', $postID);
$offersTitle = get_the_title($offers);
$offersLink = get_permalink($offers);
$establishments = get_field('booking_establishments', $postID);
$establishmentsTitle = get_the_title($establishments);
$establishmentsLink = get_permalink($establishments);
?>
<div class="booking post-item">
    <div class="id">
        <?= $bookingID ?>
    </div>
    <div class="establishments">
        <a href="<?= $establishmentsLink ?>" target="_blank"><?= $establishmentsTitle ?></a>
    </div>
    <div class="offers">
        <a href="<?= $offersLink ?>" target="_blank"><?= $offersTitle ?></a>
    </div>
</div>
