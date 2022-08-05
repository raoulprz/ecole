<?php

/**
 * Custom buttons
 */

add_shortcode('bouton','myshortcode_my_buttons');
function myshortcode_my_buttons( $atts = '' ){
    $value = shortcode_atts( array(
        'texte' => "Plus d'infos",
        'lien' => "",
        'class' => "",
        'cible' => "",
        'titre' => "",
        'type' => "default",
        'largeur' => "default",
        'taille' => "default",
        'position' => "gauche",
    ), $atts );

    if ($value['type'] == 'default') {
        $btnType = 'btn--default';
    } else if ($value['type'] == 'style2') {
        $btnType = 'btn--style2';
    } else if ($value['type'] == 'inverse') {
        $btnType = 'btn--inverse';
    } else if ($value['type'] == 'frame') {
        $btnType = 'btn--frame';
    }

    if ($value['largeur'] == 'default') {
        $btnWidth = '';
    } else if ($value['largeur'] == 'fullwidth') {
        $btnWidth = 'btn--fullwidth';
    }

    if ($value['taille'] == 'default') {
        $btnSize = '';
    } else if ($value['taille'] == 'small') {
        $btnSize = 'btn--small';
    } else if ($value['taille'] == 'big') {
        $btnSize = 'btn--big';
    }

    if ($value['cible'] == 'oui') {
        $btnTarget = 'target="_blank"';
    }

    if (!empty($value['titre'])) {
        $btnTitle = 'title="'.$value['titre'].'"';
    }

    if ($value['position'] == 'gauche') {
        $btnPosition = 'btn--position-left';
    } else if ($value['position'] == 'center') {
        $btnPosition = 'btn--position-center';
    } else if ($value['position'] == 'right') {
        $btnPosition = 'btn--position-right';
    }

    if (!empty($value['lien'])) {
        $btnLink = 'href="'.$value['lien'].'"';
    }

    if (!empty($value['class'])) {
        $btnClass = $value['class'];
    }

    return '<div class="'.$btnPosition.'"><a
            class="btn '.$btnType.' '.$btnWidth.' '.$btnSize.' '.$btnClass.'"
                '.$btnLink.'
                '.$btnTarget.'
                '.$btnTitle.'
            >
            '. $value['texte'] .'
        </a></div>';
}