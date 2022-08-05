<?php
$postID = get_the_ID();
$title = get_the_title($postID);
$link = get_permalink($postID);

$relation = get_field('relationship_link', $postID);
$relationID = $relation[0];
$establishment = get_the_title($relationID);

$address = get_field('establishments_address', $relationID);
$npa = get_field('establishments_npa', $relationID);
$locality = get_field('establishments_locality', $relationID);
?>
<div class="offers post-item">
    <div class="datas">
        <a class="title" href="<?= $link ?>"><h3><?= $title ?></h3></a>
        <?= $establishment ?><br>
        <?= $address ?>,<br>
        <?= $npa ?> <?= $locality ?>
        <div class="permalink">
            <a class="btn" href="<?= $link ?>">Découvrir</a>
        </div>
    </div>
</div>
