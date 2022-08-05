<?php
use Kalysto\ACFBuilder;
ACFBuilder::$field_prefix = 'establishments_types';
acf_add_local_field_group([
    'key' => 'group_'.ACFBuilder::$field_prefix,
    'title' => 'Contenu',
    'fields' => [
        ACFBuilder::addField('image', 'Image principale', 'image'),
    ],
    'location' => [
        [
            [
                'param' => 'taxonomy',
                'operator' => '==',
                'value' => 'establishments_types',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
]);