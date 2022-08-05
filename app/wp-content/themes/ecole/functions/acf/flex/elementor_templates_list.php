<?php
use Kalysto\ACFBuilder;

ACFBuilder::$field_prefix = 'elementor_templates_list';

$flex_elementor_templates_list = array (
    'key' => 'flex_'.ACFBuilder::$field_prefix,
    'name' => ACFBuilder::$field_prefix,
    'label' => 'Bloc Elementor',
    'display' => 'block',
    'sub_fields' => array (
        ACFBuilder::addField('list', 'Liste des modèles', 'post_object', [
            'post_type' => 'elementor_library',
            'required' => true,
            'max' => 1,
            'label'=> 'Choix du modèle Elementor',
            'filters' => [
                0 => 'search',
                1 => 'taxonomy',
            ],
            'return_format' => 'id'
        ]),
    ),
    'min' => '',
    'max' => '',
);
