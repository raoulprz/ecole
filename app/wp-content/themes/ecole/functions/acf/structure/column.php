<?php
use Kalysto\ACFBuilder;

ACFBuilder::$field_prefix = 'column';
$flex_column = array (
    'key' => 'flex_'.ACFBuilder::$field_prefix,
    'name' => ACFBuilder::$field_prefix,
    'label' => 'Colonne',
    'display' => 'block',
    'sub_fields' => array (
        //Content tab
        ACFBuilder::addField('content', 'Eléments', 'tab'),
        ACFBuilder::addField('flex_elements', '', 'flexible_content', [
            'layouts' => [
                $flex_text,
                $flex_image,
                $flex_slider,
                $flex_buttons,
                $flex_video,
            ],
            'button_label' => 'Ajouter un élément',
            'wrapper' => [
                'class' => 'acf-main-columns',
            ],
        ]),

        //Styles tab
        ACFBuilder::addField('customize', '<i class="fa fa-cog" aria-hidden="true"></i> Styles de la colonne', 'tab'),
        ACFBuilder::addField('customize_group', '', 'group', [
            'sub_fields' => [
                ACFBuilder::addField('vertical_align', 'Alignement vertical', 'select', [
                    'choices' => array (
                        'align-items-strech' => 'Par défaut',
                        'align-items-start' => 'En-haut',
                        'align-items-center' => 'Centrer',
                        'align-items-end' => 'En-bas',
                    ),
                    'return_format' => 'value',
                    'default_value' => 'align-items-strech',
                    'wrapper' => [
                        'width' => '70',
                    ],
                ]),
                ACFBuilder::addField('custom_width', 'Largeur', 'select', [
                    'choices' => array (
                        'default' => 'Par défaut',
                        '-2' => '2',
                        '-3' => '3',
                        '-4' => '4',
                        '-5' => '5',
                        '-6' => '6',
                        '-7' => '7',
                        '-8' => '8',
                        '-9' => '9',
                        '-10' => '10',
                    ),
                    'return_format' => 'value',
                    'default_value' => 'default',
                    'instructions' => '2 = étroit | 10 = large',
                    'wrapper' => [
                        'width' => '30',
                    ],
                ]),
                ACFBuilder::addField('background', 'Fond de la colonne', 'select', [
                    'choices' => array (
                        'default' => 'Par défaut',
                        'primary' => 'Couleur principale',
                        'secondary' => 'Couleur secondaire',
                        'custom' => 'Personnalisée',
                        'image' => 'Image',
                    ),
                    'return_format' => 'value',
                    'default_value' => 'default',
                    'wrapper' => [
                        'width' => '70',
                    ],
                ]),
                ACFBuilder::addField('background_color', 'Couleur de fond', 'color_picker', [
                    'conditional_logic' => ACFBuilder::showFieldIf('field_column_background', 'custom', '=='),
                    'wrapper' => [
                        'width' => '30',
                    ],
                ]),
                ACFBuilder::addField('background_image', 'Image de fond', 'image', [
                    'conditional_logic' => ACFBuilder::showFieldIf('field_column_background', 'image', '=='),
                    'wrapper' => [
                        'width' => '30',
                    ],
                ]),
            ],
            'wrapper' => [
                'class' => 'acf-customizer',
            ],
        ]),
    ),
    'min' => '',
    'max' => '4',
    'wrapper' => [
        'class' => 'acf-main-columns',
    ],
);
