<?php
// includes all files in flex
$acf_files = glob(__dir__.'/*/*.php');
foreach ($acf_files as $filename) {
    include $filename;
}

use Kalysto\ACFBuilder;
ACFBuilder::$field_prefix = 'sections';
acf_add_local_field_group([
    'key' => 'group_'.ACFBuilder::$field_prefix,
    'title' => 'Contenu',
    'fields' => [
        [
            'layouts' => [
                $flex_elementor_templates_list,
                $flex_text,
                $flex_image,
                $flex_slider,
                $flex_buttons,
                $flex_video,
                $flex_section,
            ],
            'min' => '',
            'max' => '',
            'button_label' => 'Ajouter une section',
            'key' => 'field_'.ACFBuilder::$field_prefix,
            'label' => '',
            'name' => 'flex_sections',
            'type' => 'flexible_content',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => [
                'class' => 'acf-main-content',
            ],
        ],
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
                'value' => 'template_acf.php',
            ],
        ],
    ],
    'menu_order' => 1,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => [
        'the_content',
    ],
    'active' => 1,
    'description' => '',
]);