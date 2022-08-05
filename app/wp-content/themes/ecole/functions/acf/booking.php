<?php
use Kalysto\ACFBuilder;
ACFBuilder::$field_prefix = 'booking';
acf_add_local_field_group([
    'key' => 'group_'.ACFBuilder::$field_prefix,
    'title' => 'Contenu de la réservation',
    'fields' => [
        ACFBuilder::addField('id', 'ID de la réservation', 'text'),
        ACFBuilder::addField('offers', 'Nom de l\'offre', 'post_object', [
            'return_format' => 'id',
            'multiple' => 0,
            'allow_null' => 0,
            'post_type' => 'offers',
        ]),
        ACFBuilder::addField('establishments', 'Nom de l\'établissement', 'post_object', [
            'return_format' => 'id',
            'multiple' => 0,
            'allow_null' => 0,
            'post_type' => 'establishments',
        ]),
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'booking',
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

