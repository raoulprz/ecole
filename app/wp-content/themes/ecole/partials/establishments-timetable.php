<?php
$postID = get_the_ID();
$timetable = get_field('establishments_timetable_repeater', $postID);
?>

<?php if ($timetable) { ?>
    <div class="establishments timetable">
        <h5>Horaires</h5>
        <?php foreach ($timetable as $field) {
            $day = $field['establishments_day'];
            $open = $field['establishments_opening'];
            $close = $field['establishments_closing'];
            ?>
            <div class="time">
                <strong><?= $day ?>:</strong> <?= $open ?> - <?= $close ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>

