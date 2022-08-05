<?php
use Kalysto\ACFBuilder;

ACFBuilder::$field_prefix = 'text';

$flex_text = array (
    'key' => 'flex_'.ACFBuilder::$field_prefix,
    'name' => ACFBuilder::$field_prefix,
    'label' => 'Texte',
    'display' => 'block',
    'sub_fields' => array (
        ACFBuilder::addField('text', 'Texte', 'wysiwyg' )
    ),
    'min' => '',
    'max' => '',
);
