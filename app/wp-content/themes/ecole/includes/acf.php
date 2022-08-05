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


function bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	$GLOBALS[ $global_name ] = 0;

    return $value;
}
add_filter('acf/update_value/name=relationship_link', 'bidirectional_acf_update_value', 10, 3);