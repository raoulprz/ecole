<?php
use Kalysto\ACFBuilder;

ACFBuilder::$field_prefix = 'image';

$flex_image = array (
    'key' => 'flex_'.ACFBuilder::$field_prefix,
    'name' => ACFBuilder::$field_prefix,
    'label' => 'Image',
    'display' => 'block',
    'sub_fields' => array (
        ACFBuilder::addField('image', 'Image', 'image' )
    ),
    'min' => '',
    'max' => '',
);
