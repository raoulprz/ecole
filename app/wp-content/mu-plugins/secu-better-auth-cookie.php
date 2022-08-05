<?php
/*
Plugin Name: Better Auth Cookie
Description: Implements better security by obfuscating the username stored in the auth cookie
Version: 0.1
*/
if (!function_exists('wp_generate_auth_cookie')) {
    /**
     * Generate authentication cookie contents.
     *
     * @since 2.5.0
     *
     * @param int $user_id User ID
     * @param int $expiration Cookie expiration in seconds
     * @param string $scheme Optional. The cookie scheme to use: auth, secure_auth, or logged_in
     * @param string $token User's session token to use for this cookie
     * @return string Authentication cookie contents. Empty string if user does not exist.
     */
    function wp_generate_auth_cookie( $user_id, $expiration, $scheme = 'auth', $token = '' ) {
        $user = get_userdata($user_id);
        if ( ! $user ) {
            return '';
        }

        if ( ! $token ) {
            $manager = WP_Session_Tokens::get_instance( $user_id );
            $token = $manager->create( $expiration );
        }

        $pass_frag = substr($user->user_pass, 8, 4);

        $key = wp_hash( $user->user_login . '|' . $pass_frag . '|' . $expiration . '|' . $token, $scheme );

        // If ext/hash is not present, compat.php's hash_hmac() does not support sha256.
        $algo = function_exists( 'hash' ) ? 'sha256' : 'sha1';
        $hash = hash_hmac( $algo, $user->user_login . '|' . $expiration . '|' . $token, $key );

        $cookie = base64_encode($user_id) . '|' . $expiration . '|' . $token . '|' . $hash;

        /**
         * Filter the authentication cookie.
         *
         * @since 2.5.0
         *
         * @param string $cookie     Authentication cookie.
         * @param int    $user_id    User ID.
         * @param int    $expiration Authentication cookie expiration in seconds.
         * @param string $scheme     Cookie scheme used. Accepts 'auth', 'secure_auth', or 'logged_in'.
         * @param string $token      User's session token used.
         */
        return apply_filters( 'auth_cookie', $cookie, $user_id, $expiration, $scheme, $token );
    }
}

if (!function_exists('wp_parse_auth_cookie')) {
    /**
     * Parse a cookie into its components
     *
     * @since 2.7.0
     *
     * @param string $cookie
     * @param string $scheme Optional. The cookie scheme to use: auth, secure_auth, or logged_in
     * @return array Authentication cookie components
     */
    function wp_parse_auth_cookie($cookie = '', $scheme = '') {
        if ( empty($cookie) ) {
            switch ($scheme){
                case 'auth':
                    $cookie_name = AUTH_COOKIE;
                    break;
                case 'secure_auth':
                    $cookie_name = SECURE_AUTH_COOKIE;
                    break;
                case "logged_in":
                    $cookie_name = LOGGED_IN_COOKIE;
                    break;
                default:
                    if ( is_ssl() ) {
                        $cookie_name = SECURE_AUTH_COOKIE;
                        $scheme = 'secure_auth';
                    } else {
                        $cookie_name = AUTH_COOKIE;
                        $scheme = 'auth';
                    }
            }

            if ( empty($_COOKIE[$cookie_name]) )
                return false;
            $cookie = $_COOKIE[$cookie_name];
        }

        $cookie_elements = explode('|', $cookie);
        if ( count( $cookie_elements ) !== 4 ) {
            return false;
        }

        list( $user_id, $expiration, $token, $hmac ) = $cookie_elements;

        $userdata = WP_User::get_data_by('id', base64_decode($user_id));
     
        if ( $userdata ) {
            $user = new WP_User;
            $user->init( $userdata );
     
            $username = ( ! $user ) ? '' : $user->user_login;
        } else {
            $username = '';
        }

        return compact( 'username', 'expiration', 'token', 'hmac', 'scheme' );
    }
}
