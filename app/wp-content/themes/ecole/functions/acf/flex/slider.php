<?php
use Kalysto\ACFBuilder;

ACFBuilder::$field_prefix = 'slider';

$flex_slider = array (
    'key' => 'flex_'.ACFBuilder::$field_prefix,
    'name' => ACFBuilder::$field_prefix,
    'label' => 'Slider',
    'display' => 'Slider',
    'sub_fields' => array (
        ACFBuilder::addField('slides', 'Slides', 'gallery', [
            'max' => 10,
        ]),
    ),
    'min' => '',
    'max' => '',
);
