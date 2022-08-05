<?php
$postID = get_the_ID();
$relation = get_field('relationship_link', $postID);
$relationID = $relation[0];

if ($relationID) {
    $title = get_the_title($relationID);
    $link = get_permalink($relationID);
    $address = get_field('establishments_address', $relationID);
    $npa = get_field('establishments_npa', $relationID);
    $locality = get_field('establishments_locality', $relationID);
    ?>
    <div class="offers relation">
        <h6>Institut</h6>
        <h2><?= $title ?></h2>
        <p><?= $address ?>,<br>
        <?= $npa ?> <?= $locality ?></p>
        <a href="<?= $link ?>" class="btn btn--txt">Voir toutes les offres de l'établissement</a>
    </div>
<?php } ?>
