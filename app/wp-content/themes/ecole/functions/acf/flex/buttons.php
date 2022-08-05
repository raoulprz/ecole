<?php
use Kalysto\ACFBuilder;

ACFBuilder::$field_prefix = 'buttons';

$flex_buttons = array (
    'key' => 'flex_'.ACFBuilder::$field_prefix,
    'name' => ACFBuilder::$field_prefix,
    'label' => 'Boutons',
    'display' => 'block',
    'sub_fields' => array (
        ACFBuilder::addField('buttons', 'Boutons', 'repeater', [
            'min'=> 1,
            'max' => 8,
            'button_label' => 'Ajouter un bouton',
            'sub_fields' => [
                ACFBuilder::addField('button', 'Bouton', 'link', [
                    'required' => true
                ]),
            ],
        ]),
        ACFBuilder::addField('align', 'Alignement horizontal', 'radio', [
            'choices' => array (
                'left' => 'A gauche',
                'center' => 'Centré',
            ),
            'layout' => 'horizontal',
            'default_value' => 'left',
        ]),
    ),
    'min' => '',
    'max' => '',
);
