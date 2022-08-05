<?php
use Kalysto\ACFBuilder;
ACFBuilder::$field_prefix = 'relationship';
acf_add_local_field_group([
    'key' => 'group_'.ACFBuilder::$field_prefix,
    'title' => 'Relations',
    'fields' => [
        ACFBuilder::addField('link', '', 'relationship', [
            'post_type' => ['offers', 'establishments' ],
            'filters' => [
                0 => 'search',
            ],
            'min' => '',
            'max' => '',
            'return_format' => 'id',
        ]),
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'establishments',
            ],
        ],
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'offers',
            ],
        ],
    ],
    'menu_order' => 3,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => 1,
    'description' => '',
]);
