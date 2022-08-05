<?php
use Kalysto\ACFBuilder;

ACFBuilder::$field_prefix = 'block_infos';

$flex_block_infos = array (
    'key' => 'flex_'.ACFBuilder::$field_prefix,
    'name' => ACFBuilder::$field_prefix,
    'label' => 'Blocs d\'informations',
    'display' => 'block',
    'sub_fields' => array (
        ACFBuilder::addField('blocks', 'Blocs', 'repeater', [
            'min'=> 1,
            'max' => 2,
            'button_label' => 'Ajouter un bloc',
            'sub_fields' => [
                ACFBuilder::addField('title', 'Titre', 'text'),
                ACFBuilder::addField('subtitle', 'Sous-titre', 'text'),
                ACFBuilder::addField('description', 'Description', 'textarea'),
                ACFBuilder::addField('buttons', 'Boutons', 'repeater', [
                    'min'=> 1,
                    'max' => 6,
                    'button_label' => 'Ajouter un bouton',
                    'sub_fields' => [
                        ACFBuilder::addField('button', 'Bouton', 'link', [
                            'required' => true
                        ]),
                    ],
                ]),
            ],
        ]),
    ),
    'min' => '',
    'max' => '',
);
