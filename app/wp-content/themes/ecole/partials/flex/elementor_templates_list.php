<?php
$fields = get_query_var('fields', false);

if(!empty($fields['elementor_templates_list_list'])) {
    ?>
    <div class="elementor">
        <?=
        do_shortcode('[elementor-template id="'.$fields['elementor_templates_list_list'].'"]');
        ?>
    </div>
    <?php
}
?>
