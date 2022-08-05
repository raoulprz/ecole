
<form class="search" action="<?php echo home_url( '' ); ?>">
    <span class="search-field">
        <input type="radio" id="establishments" name="post_type" value="establishments">
        <label for="establishments">Etablissement</label>
        <input type="radio" id="offers" name="post_type" value="offers">
        <label for="offers">Offres</label>
        <input type="search" name="s" placeholder="terme…">
        <input type="search" name="title" placeholder="Un soin, un établissement…">
        <input type="search" name="locality" placeholder="Une ville…">
    </span>
    <span class="search-button">
        <input type="submit" value="Rechercher">
    </span>
    <!-- <input type="hidden" name="post_type" value="establishments"> -->
</form>