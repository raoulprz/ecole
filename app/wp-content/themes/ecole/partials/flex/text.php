<?php
$fields = get_query_var('fields', false);

$text = $fields['text_text'];

if (!empty($text)) {
?>
    <?= $text ?>
<?php } ?>
