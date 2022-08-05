<?php
$postID = get_the_ID();
$details = get_field('offers_details', $postID);

if ($details) { ?>
    <div class="offers details">
        <h5>Détail de l'offre</h5>
        <?= $details ?>
    </div>
<?php }

$author = get_the_author_meta('ID');
$user = get_current_user_id();

if( $author == $user ) { ?>
    <div class="offers">
        <div class="edit-post">
            <?php echo do_shortcode('[frontend_admin form="1271"]'); ?>
        </div>
        <div class="delete-post">
            <?php echo do_shortcode('[frontend_admin form="1425"]'); ?>
        </div>
    </div>
<?php } ?>
