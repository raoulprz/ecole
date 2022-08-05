<?php
$postID = get_the_ID();
$description = get_field('establishments_description', $postID);

if ($description) { ?>
    <div class="establishments description">
        <h5>Description du centre</h5>
        <?= $description ?>
    </div>
<?php }

$author = get_the_author_meta('ID');
$user = get_current_user_id();

if( $author == $user ) { ?>
    <div class="establishments">
        <div class="edit-post">
            <?php echo do_shortcode('[frontend_admin form="1271"]'); ?>
        </div>
        <div class="delete-post">
            <?php echo do_shortcode('[frontend_admin form="1425"]'); ?>
        </div>
    </div>
<?php } ?>