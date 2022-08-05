<?php
$postID = get_the_id();
$list = get_field('account_list', $postID);

if(!empty($list)) {
    ?>
    <div class="elementor">
        <?= do_shortcode('[elementor-template id="'.$list.'"]'); ?>
    </div>
<?php } ?>
