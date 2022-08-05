<?php
$postID = get_the_ID();
$dateStartRaw = get_field('offers_start', $postID);
$dateStart = DateTime::createFromFormat('Ymd', $dateStartRaw);
$dateEndRaw = get_field('offers_end', $postID);
$dateEnd = DateTime::createFromFormat('Ymd', $dateEndRaw);

if ($dateStartRaw) { ?>
    <div class="offers dates">
        <h5>Valabilité</h5>
        Du <?= $dateStart->format('d/m/Y') ?> au <?= $dateEnd->format('d/m/Y') ?>
    </div>
<?php } ?>