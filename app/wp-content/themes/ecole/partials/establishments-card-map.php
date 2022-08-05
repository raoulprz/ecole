<?php
$postID = get_the_ID();
$title = get_the_title($postID);
$link = get_permalink($postID);

$address = get_field('establishments_address', $postID);
$npa = get_field('establishments_npa', $postID);
$locality = get_field('establishments_locality', $postID);
?>
<div class="establishments post-item">
    <div class="datas">
        <a class="title" href="<?= $link ?>"><h3><?= $title ?></h3></a>
        <?= $address ?>,<br>
        <?= $npa ?> <?= $locality ?>
        <div class="permalink">
            <a class="btn" href="<?= $link ?>">Découvrir</a>
        </div>
    </div>
</div>
