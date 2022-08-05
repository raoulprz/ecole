<?php
use Kalysto\ACFBuilder;
ACFBuilder::$field_prefix = 'offers';
acf_add_local_field_group([
    'key' => 'group_'.ACFBuilder::$field_prefix,
    'title' => 'Contenu de l\'offre',
    'fields' => [
        ACFBuilder::addField('tab_datas', 'Données', 'tab'),
        ACFBuilder::addField('name', 'Nom de l\'offre', 'text', [
            'wrapper' => [
                'class' => 'acf-hidden-field',
            ],
        ]),
        ACFBuilder::addField('fulladdress', 'Adresse', 'text', [
            'wrapper' => [
                // 'class' => 'acf-hidden-field',
            ],
        ]),
        ACFBuilder::addField('fullprice', 'Prix de base', 'number', [
            'wrapper' => [
                'width' => '30',
            ],
        ]),
        ACFBuilder::addField('discount', 'Prix au rabais', 'number', [
            'wrapper' => [
                'width' => '30',
            ],
        ]),
        ACFBuilder::addField('discounttag', 'Tag du rabais', 'text', [
            'wrapper' => [
                'width' => '40',
            ],
        ]),
        ACFBuilder::addField('start', 'Début de l\'offre', 'date_picker', [
            'return_format' => 'Ymd',
            'wrapper' => [
                'width' => '50',
            ],
        ]),
        ACFBuilder::addField('end', 'Fin de l\'offre', 'date_picker', [
            'return_format' => 'Ymd',
            'wrapper' => [
                'width' => '50',
            ],
        ]),
        ACFBuilder::addField('details', 'Détail de l\'offre', 'wysiwyg'),

        ACFBuilder::addField('tab_medias', 'Médias', 'tab'),
        ACFBuilder::addField('gallery', 'Galerie d\'images', 'gallery', [
            'instructions' => 'La première image de la galerie est sélectionnée comme image principale',
        ]),
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'offers',
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

