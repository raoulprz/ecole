<?php
$fields = get_query_var('fields', false);
$carrousel = $fields['carrousel_slides'];

if ($carrousel) { ?>
    <div class="adveo-carrousel owl-carousel owl-theme">
        <?php foreach ($carrousel as $slide) { ?>
            <div class="slide item">
                <a href="<?= $slide['url'] ?>" class="content">
                    <img src="<?= $slide['url'] ?>" />
                </a>
            </div>
        <?php } ?>
    </div>
<?php } ?>
