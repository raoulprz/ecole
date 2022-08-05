<?php
$type = get_query_var('type', false);
$typeID = $type->term_id;
$title = $type->name;
$link = get_term_link($type->slug, 'establishments_types');
$typeImage = get_field('establishments_types_image', 'establishments_types_' . $typeID);
$imageURL = $typeImage['url'];
?>
<div class="types post-item">
    <div class="image" style="background-image:url(<?= $imageURL ?>);">
    </div>
    <div class="datas">
        <a class="title" href="<?= $link ?>"><h3><?= $title ?></h3></a>
    </div>
</div>
