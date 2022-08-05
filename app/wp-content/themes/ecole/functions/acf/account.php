<?php
use Kalysto\ACFBuilder;
ACFBuilder::$field_prefix = 'account';
acf_add_local_field_group([
    'key' => 'group_'.ACFBuilder::$field_prefix,
    'title' => 'Modèles',
    'fields' => [
        ACFBuilder::addField('list', 'Liste des modèles', 'post_object', [
            'post_type' => 'elementor_library',
            'required' => true,
            'max' => 1,
            'label'=> 'Choix du modèle Elementor',
            'filters' => [
                0 => 'search',
            ],
            'return_format' => 'id'
        ]),
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'account',
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
