<?php
add_filter('quform_element_valid_1_3', function ($valid, $value, Quform_Element_Field $element) {
    if (username_exists($value)) {
        $element->addError('Ce nom d\'utilisateur existe déjà.');
        $valid = false;
    }

    return $valid;
}, 10, 3);

add_filter('quform_element_valid_1_5', function ($valid, $value, Quform_Element_Field $element) {
    if (email_exists($value)) {
        $element->addError('Cette adresse email est déjà utilisée.');
        $valid = false;
    }

    return $valid;
}, 10, 3);

add_action('quform_post_process_1', function (array $result, Quform_Form $form) {
    $username = $form->getValueText('quform_1_3');
    $email = $form->getValueText('quform_1_5');
    $password = $form->getValueText('quform_1_6');

    wp_insert_user(array(
        'user_login' => $username,
        'user_pass' => $password,
        'user_email' => $email
    ));

    return $result;
}, 10, 2);

add_filter('quform_element_valid_2_3', function ($valid, $value, Quform_Element_Field $element) {
    if (username_exists($value)) {
        $element->addError('Ce nom d\'utilisateur existe déjà.');
        $valid = false;
    }

    return $valid;
}, 10, 3);

add_filter('quform_element_valid_2_5', function ($valid, $value, Quform_Element_Field $element) {
    if (email_exists($value)) {
        $element->addError('Cette adresse email est déjà utilisée.');
        $valid = false;
    }

    return $valid;
}, 10, 3);

add_action('quform_post_process_2', function (array $result, Quform_Form $form) {
    $username = $form->getValueText('quform_2_3');
    $email = $form->getValueText('quform_2_5');
    $password = $form->getValueText('quform_2_6');

    wp_insert_user(array(
        'user_login' => $username,
        'user_pass' => $password,
        'user_email' => $email,
        'role' => 'prestataire',
    ));

    return $result;
}, 10, 2);