<?php

/**
 * ACF License
 */
define('ACF_PRO_LICENSE', 'b3JkZXJfaWQ9ODgzMjF8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE2LTA4LTI0IDE1OjM2OjQy' );

/**
 * Include ACF fields
 */
if (function_exists('acf_add_local_field_group')) {
    $acf_files = glob(__dir__.'/../functions/acf/*.php');
    foreach ($acf_files as $filename) {
        include $filename;
    }
}

/**
 * Display sections flex fields
 */
add_action('display_sections_flex_content', function ($flex_contents) {
    $flex_contents = get_sub_field('sections_flex_content');
    if (empty($flex_contents)) {
        return false;
    }
    foreach ($flex_contents as $k => $flex) {
        echo '<div class="section-'.$flex['acf_fc_layout'].'">';

        set_query_var('fields', $flex);
        get_template_part('partials/flex/'.$flex['acf_fc_layout']);

        echo '</div>';
    }
});

/**
 *  Add ACF default options page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}
