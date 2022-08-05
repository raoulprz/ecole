<div class="login-form">
    <?php if ( ! is_user_logged_in() ) { // Display WordPress login form:
        ?>
            <h2>Connectez-vous</h2>
            <p>Vous n'avez pas de compte ? <span class="k-popper-register"><a href="#register">Inscrivez-vous</a></span></p>
        <?php
        $args = array(
            'redirect' => home_url().'/dashboard',
            'form_id' => 'loginform',
            'label_username' => __( 'Votre email' ),
            'label_password' => __( 'Votre mot de passe' ),
            'label_remember' => __( 'Se souvenir de moi' ),
            'label_log_in'   => __( 'Se connecter' ),
            'remember' => false
        );
        wp_login_form( $args );
    } else { // If logged in:
        ?>
            <h2>Vous êtes connecté</h2>
        <?php
        echo '<span class="btn">';
            wp_loginout( home_url() ); // Display "Log Out" link.
        echo '</span>';
    } ?>
</div>