<?php
$postID = get_the_ID();
$address = get_field('establishments_address', $postID);
if ($address) { ?>
<div class="k-pop k-pop--map">
    <div class="k-pop--flex">
        <div class="k-pop--container">
            <div class="k-pop--closer"><i class="bi bi-x-lg"></i></div>
            <?= do_shortcode('[elementor-template id="412"]') ?>
        </div>
    </div>
</div>

<?php } ?>