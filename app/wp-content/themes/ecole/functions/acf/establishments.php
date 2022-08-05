<?php
use Kalysto\ACFBuilder;
ACFBuilder::$field_prefix = 'establishments';
acf_add_local_field_group([
    'key' => 'group_'.ACFBuilder::$field_prefix,
    'title' => 'Contenu de l\'établissement',
    'fields' => [
        ACFBuilder::addField('tab_establishments_data', 'Coordonnées de l\'établissement', 'tab'),
        ACFBuilder::addField('name', 'Nom de l\'établissement', 'text', [
            'wrapper' => [
                'class' => 'acf-hidden-field',
            ],
        ]),
        ACFBuilder::addField('email', 'Email', 'email', [
            'wrapper' => [
                'width' => '50',
            ],
        ]),
        ACFBuilder::addField('phone', 'Téléphone', 'text', [
            'wrapper' => [
                'width' => '50',
            ],
        ]),
        ACFBuilder::addField('address', 'Adresse', 'text', [
            'wrapper' => [
                'width' => '100',
            ],
        ]),
        ACFBuilder::addField('npa', 'NPA', 'text', [
            'wrapper' => [
                'width' => '30',
            ],
        ]),
        ACFBuilder::addField('locality', 'Localité', 'text', [
            'wrapper' => [
                'width' => '70',
            ],
        ]),
        ACFBuilder::addField('tab_datas', 'Données', 'tab'),
        ACFBuilder::addField('description', 'Description', 'wysiwyg'),
        ACFBuilder::addField('prestations_repeater', 'Prestations', 'repeater', [
            'button_label' => 'Ajouter une prestation',
            'sub_fields' => [
                ACFBuilder::addField('prestation', 'Prestation', 'text')
            ],
        ]),
        ACFBuilder::addField('timetable_repeater', 'Horaires', 'repeater', [
            'button_label' => 'Ajouter un horaire',
            'sub_fields' => [
                ACFBuilder::addField('day', 'Jour', 'select', [
                    'choices' => array (
                        'Lundi' => 'Lundi',
                        'Mardi' => 'Mardi',
                        'Mercredi' => 'Mercredi',
                        'Jeudi' => 'Jeudi',
                        'Vendredi' => 'Vendredi',
                        'Samedi' => 'Samedi',
                        'Dimanche' => 'Dimanche',
                    ),
                    'return_format' => 'value',
                    'default_value' => 'mon',
                    'wrapper' => [
                        'width' => '40',
                    ],
                ]),
                ACFBuilder::addField('opening', 'Ouverture', 'time_picker', [
                    'display_format' => 'H:i',
                    'return_format' => 'H:i',
                    'wrapper' => [
                        'width' => '30',
                    ],
                ]),
                ACFBuilder::addField('closing', 'Fermeture', 'time_picker', [
                    'display_format' => 'H:i',
                    'return_format' => 'H:i',
                    'wrapper' => [
                        'width' => '30',
                    ],
                ]),
            ],
        ]),

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
                'value' => 'establishments',
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