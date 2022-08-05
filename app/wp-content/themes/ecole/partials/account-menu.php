<?php
$user = wp_get_current_user();
$roles = $user->roles;

if ($roles[0] == 'subscriber') {
    wp_nav_menu( array(
        'menu'           => 'Member Account menu', // Do not fall back to first non-empty menu.
        'theme_location' => 'member-account-menu',
        'container_id' => 'account-menu',
        'fallback_cb'    => false // Do not fall back to wp_page_menu()
    ));
} else {
    wp_nav_menu( array(
        'menu'           => 'Account menu', // Do not fall back to first non-empty menu.
        'theme_location' => 'account-menu',
        'container_id' => 'account-menu',
        'fallback_cb'    => false // Do not fall back to wp_page_menu()
    ));
}
?>