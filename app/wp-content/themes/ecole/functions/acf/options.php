<?php
use Kalysto\ACFBuilder;
ACFBuilder::$field_prefix = 'options';
acf_add_local_field_group([
    'key' => 'group_'.ACFBuilder::$field_prefix,
    'title' => 'Options',
    'fields' => [
        ACFBuilder::addField('tab_email', 'Template email', 'tab'),
        ACFBuilder::addField('email_logo', 'Logo du mail', 'image', [
            'return_format' => 'array',
            'library' => 'all',
            'preview_size' => 'thumbnail',
            'wrapper' => [
                'width' => '50',
            ],
        ]),
        ACFBuilder::addField('email_image', 'Image du mail', 'image', [
            'return_format' => 'array',
            'library' => 'all',
            'preview_size' => 'thumbnail',
            'wrapper' => [
                'width' => '50',
            ],
        ]),
        ACFBuilder::addField('email_contenu', 'Contenu du mail', 'wysiwyg', [
            'instructions' => 'Texte qui apparaîtra dans tous les mails, après le texte dynamique de la notification',
            'media_upload' => 0,
        ]),
        ACFBuilder::addField('email_footer_content', 'Texte du footer du mail', 'wysiwyg', [
            'media_upload' => 0,
        ]),
        ACFBuilder::addField('email_group_design', 'Design email', 'tab'),
        ACFBuilder::addField('email_logo_width', 'Email: Largeur du logo', 'number', [
            'default_value' => '200'
        ]),
        ACFBuilder::addField('email_text_color', 'Email: Couleur des textes', 'color_picker', [
            'default_value' => '#000',
            'wrapper' => [
                'width' => '33',
            ],
        ]),
        ACFBuilder::addField('email_footer_text_color', 'Email: Couleur du texte du footer', 'color_picker', [
            'default_value' => '#000',
            'wrapper' => [
                'width' => '33',
            ],
        ]),
        ACFBuilder::addField('email_bg_color', 'Email: Couleur de fond', 'color_picker', [
            'default_value' => '#000',
            'wrapper' => [
                'width' => '33',
            ],
        ]),
        ACFBuilder::addField('email_header_bg_color', 'Email: Couleur de fond du header', 'color_picker', [
            'default_value' => '#e8e8e8',
            'wrapper' => [
                'width' => '33',
            ],
        ]),
        ACFBuilder::addField('email_content_bg_color', 'Email: Couleur de fond du contenu', 'color_picker', [
            'default_value' => '#fff',
            'wrapper' => [
                'width' => '33',
            ],
        ]),
        ACFBuilder::addField('email_footer_bg_color', 'Email: Couleur de fond du footer', 'color_picker', [
            'default_value' => '#e8e8e8',
            'wrapper' => [
                'width' => '33',
            ],
        ]),
        ACFBuilder::addField('email_css', 'Email: Personnalisation CSS', 'textarea'),
    ],
    'location' => [
        [
            [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options',
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