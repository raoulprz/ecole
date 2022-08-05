<?php
$titleVar = get_query_var('titre', false);
$textVar = get_query_var('texte', false);
$postID = get_the_ID();

$types = get_terms( 'establishments_types', array(
    'hide_empty' => false,
));
?>

<?php if( $types ) { ?>
    <div class="types carousel">
        <?php if($titleVar) { ?>
            <div class="carousel-title">
                <h2><?= $titleVar ?></h2>
                <h6><?= $textVar ?></h6>
            </div>
        <?php } ?>
        <div class="owl-carousel owl-theme types-carousel nodots">
            <?php  foreach( $types as $type ) {
                set_query_var('type', $type);
                get_template_part('partials/types-card');
            } ?>
        </div>
    </div>
<?php } ?>