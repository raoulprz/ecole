<?php
use Kalysto\ACFBuilder;

ACFBuilder::$field_prefix = 'video';

$flex_video = [
    'key' => 'flex_'.ACFBuilder::$field_prefix,
    'name' => ACFBuilder::$field_prefix,
    'label' => 'Video',
    'display' => 'block',
    'sub_fields' => array (
        ACFBuilder::addField('youtube_id', 'Youtube video id', 'text', [
            'wrapper' => [
                'width' => '40',
            ],
        ]),
        ACFBuilder::addField('width', 'Largeur', 'select', [
            'choices' => array (
                '16-9' => 'Standard',
                'full' => 'Pleine largeur',
                'custom' => 'Personnalisée'
            ),
            'return_format' => 'value',
            'default_value' => '16-9',
            'wrapper' => [
                'width' => '30',
            ],
        ]),
        ACFBuilder::addField('align', 'Alignement', 'radio', [
            'choices' => array (
                'left' => '<i class="fa fa-align-left"></i>',
                'center' => '<i class="fa fa-align-center"></i>',
                'right' => '<i class="fa fa-align-right"></i>',
            ),
            'layout' => 'horizontal',
            'return_format' => 'value',
            'default_value' => 'center',
            'wrapper' => [
                'width' => '30',
            ],
        ]),
        ACFBuilder::addField('custom_width', 'Largeur personnalisée', 'text', [
            'placeholder' => 'XXX% / XXXpx',
            'conditional_logic' => ACFBuilder::showFieldIf('field_video_width', 'custom', '=='),
        ]),
    ),
    'min' => '',
    'max' => '',
];
