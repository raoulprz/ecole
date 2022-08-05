<?php
use Kalysto\ACFBuilder;

ACFBuilder::$field_prefix = 'section';
$flex_section = array (
    'key' => 'flex_'.ACFBuilder::$field_prefix,
    'name' => ACFBuilder::$field_prefix,
    'label' => 'Contenus en colonnes',
    'display' => 'block',
    'sub_fields' => array (
        //Content tab
        ACFBuilder::addField('content', 'Colonnes', 'tab'),
        ACFBuilder::addField('flex_columns', '', 'flexible_content', [
            'layouts' => [
                $flex_column,
            ],
            'button_label' => 'Ajouter une colonne',
            'wrapper' => [
                'class' => 'acf-main-section',
            ],
        ]),

        //Styles tab
        ACFBuilder::addField('customize', '<i class="fa fa-cog" aria-hidden="true"></i> Styles de la section', 'tab'),
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
                ]),
                ACFBuilder::addField('content_width', 'Largeur du contenu', 'select', [
                    'choices' => array (
                        'pagewidth' => 'Par défaut',
                        'fullwidth' => 'Pleine largeur',
                        'custom' => 'Personnalisée',
                    ),
                    'return_format' => 'value',
                    'default_value' => 'pagewidth',
                    'wrapper' => [
                        'width' => '70',
                    ],
                ]),
                ACFBuilder::addField('custom_width', 'Largeur', 'text', [
                    'placeholder' => 'XXX% / XXXpx',
                    'conditional_logic' => ACFBuilder::showFieldIf('field_section_content_width', 'custom', '=='),
                    'wrapper' => [
                        'width' => '30',
                    ],
                ]),
                ACFBuilder::addField('background', 'Fond de la section', 'select', [
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
                    'conditional_logic' => ACFBuilder::showFieldIf('field_section_background', 'custom', '=='),
                    'wrapper' => [
                        'width' => '30',
                    ],
                ]),
                ACFBuilder::addField('background_image', 'Image de fond', 'image', [
                    'conditional_logic' => ACFBuilder::showFieldIf('field_section_background', 'image', '=='),
                    'wrapper' => [
                        'width' => '30',
                    ],
                ]),
                ACFBuilder::addField('content_background', 'Fond du contenu', 'select', [
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
                ACFBuilder::addField('content_background_color', 'Couleur de fond', 'color_picker', [
                    'conditional_logic' => ACFBuilder::showFieldIf('field_section_content_background', 'custom', '=='),
                    'wrapper' => [
                        'width' => '30',
                    ],
                ]),
                ACFBuilder::addField('content_background_image', 'Image de fond', 'image', [
                    'conditional_logic' => ACFBuilder::showFieldIf('field_section_content_background', 'image', '=='),
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
    'max' => '',
);
