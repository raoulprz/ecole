<?php
$author = get_the_author_meta('ID');
$user = get_current_user_id();

if( $author == $user ) { ?>
    <div class="establishments">
        <div class="edit-post">
            <i class="bi bi-pencil-square"></i> Modifier mon établissement
        </div>
    </div>
<?php } ?>