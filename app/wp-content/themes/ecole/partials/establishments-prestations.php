<?php
$postID = get_the_ID();
$prestations = get_field('establishments_prestations_repeater', $postID);
?>

<?php if ($prestations) { ?>
    <div class="establishments prestations">
        <h5>Prestations</h5>
        <?php foreach ($prestations as $row) {
            ?>
            <div class="prestation">
                <?php echo file_get_contents( get_stylesheet_directory_uri() . "/images/Star-Simple.svg"); ?>
                <?= $row['establishments_prestation'] ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>
