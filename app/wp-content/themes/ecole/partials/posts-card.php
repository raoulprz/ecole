<?php
$postID = get_the_ID();
$title = get_the_title($postID);
$link = get_permalink($postID);
$thumbnail = get_the_post_thumbnail_url($postID);
$excerpt = get_the_excerpt($postID);
if ($thumbnail) {
    $imageURL = $thumbnail;
} else {
    $imageURL = esc_url(get_stylesheet_directory() . '/images/kalysto.jpg');
}
?>
<div class="posts post-item">
    <div class="image" style="background-image:url(<?= $imageURL ?>);">
    </div>
    <div class="datas">
        <a class="title" href="<?= $link ?>"><h3><?= $title ?></h3></a>
        <div class="excerpt">
            <?= $excerpt ?>
        </div>
        <div class="permalink">
            <a class="btn" href="<?= $link ?>">Lire plus</a>
        </div>
    </div>
</div>
