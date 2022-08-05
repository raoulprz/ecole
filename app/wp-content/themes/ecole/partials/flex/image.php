<?php
$fields = get_query_var('fields', false);

$image = $fields['image_image'];

if (!empty($image)) {
?>
    <img class="image" src="<?= $image['url'] ?>" />
<?php } ?>
