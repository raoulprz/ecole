<div class="form-register">
    <?php
    if ( ! is_user_logged_in() ) { // Display WordPress login form:
        $home = get_home_url();
        ?>
            <h2>Créez un compte gratuitement</h2>
            <p>Vous avez déjà un compte ? <span class="k-popper-login"><a href="#login">Se connecter</a></span></p>
            <?= do_shortcode('[frontend_admin form="945"]'); ?>
            <a class="btn btn--txt" href="<?= $home ?>/ajouter-un-etablissement/"><small>Créer un compte comme prestataire</small></a>
        <?php
    } else { // If logged in:
        ?>
            <h2>Vous êtes connecté</h2>
        <?php
        echo '<span class="btn">';
            wp_loginout( home_url() ); // Display "Log Out" link.
        echo '</span>';
    }
    ?>
</div>