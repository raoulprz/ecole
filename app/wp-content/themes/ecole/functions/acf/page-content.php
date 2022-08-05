<?php
// includes all files in flex
$acf_files = glob(__dir__.'/*/*.php');
foreach ($acf_files as $filename) {
    include $filename;
}

use Kalysto\ACFBuilder;
ACFBuilder::$field_prefix = 'content';
acf_add_local_field_group([
    'key' => 'group_'.ACFBuilder::$field_prefix,
    'title' => 'Contenu',
    'fields' => [
        ACFBuilder::addField('text', 'Contenu de la page', 'wysiwyg'),
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ],
            [
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'default',
            ],
        ],
    ],
    'menu_order' => 1,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => 1,
    'description' => '',
    'hide_on_screen' => [
        'the_content',
    ],
]);