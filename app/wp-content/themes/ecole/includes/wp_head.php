<?php
function popup_templates() {
    get_template_part( 'partials/popup-login' );
    get_template_part( 'partials/popup-register' );
    get_template_part( 'partials/establishment-popup-map' );
}
add_action( 'wp_footer', 'popup_templates' );