<?php
/*
Plugin Name: ACF Builder
Description: Add helper methods to help you registering fields via PHP
Version: 0.1
*/

namespace Kalysto;

class ACFBuilder
{
    public static $field_prefix;


    /**
     * Add a field in a short looking fashion
     *
     * @param  $machine_name  string  the ACF machine name. That's the string you will use to retrieve the value in a theme.
     * @param  $label  string  Label of the field, displayed in the admin interface.
     * @param  $type  string  ACF field type. Defaults to 'text'.
     * @param  $more_options  array  Pass an array indicating ACF optional options.
     *
     * @return array  Array constituting a field
     */
    public static function addField($machine_name, $label, $type = 'text', $more_options = []) {
        return array_merge([
            'key' => 'field_'.self::$field_prefix.'_'.$machine_name,
            'name' => self::$field_prefix.'_'.$machine_name,
            'label' => $label,
            'type' => $type,
        ], $more_options);
    }

    /**
     * For conditional logic usage, show a field if a unique rule is true.
     *
     * @param  $field_key  string  ACF field key.
     * @param  $required_value  string  Indicate the value you want to be true to display your field.
     * @param  $operator  string  Indicate a valid comparison operator.
     *
     * @return array  Array of conditions
     */
    public static function showFieldIf($field_key, $required_value, $operator = '==')
    {
        return [
            'status' => 1,
            'rules' => [
                [
                    'field' => $field_key,
                    'operator' => $operator,
                    'value' => $required_value,
                ],
            ],
            'allorany' => 'all',
        ];
    }
}

