<?php
$fields = get_query_var('fields', false);
$classes = '';

if (!empty($fields['buttons_align']) && $fields['buttons_align'] == 'center') {
    $classes .= ' buttons--align-center';
}

if (!empty($fields['buttons_align']) && $fields['buttons_align'] == 'right') {
    $classes .= ' buttons--align-right';
}

if (!empty($fields['buttons_buttons'])) {
    ?>
    <div class="buttons<?= $classes ?>">
        <?php
        foreach ($fields['buttons_buttons'] as $button) {
            if ( !empty($button['buttons_button']['url'])) {
                ?>
                <div class="buttons__button">
                    <a class="btn" href="<?= $button['buttons_button']['url'] ?>" title="<?= $button['buttons_button']['title'] ?: __('En savoir plus', 'Kalysto')  ?>" <?= $button['buttons_button']['target'] ? 'target="_blank"' : '' ?>><?= $button['buttons_button']['title'] ?: __('En savoir plus', 'Kalysto')  ?></a>
                </div>
                <?php
            } else if (!empty($button['listing_button']['url'])) {
                ?>
                <div class="buttons__button">
                    <a class="btn" href="<?= $button['listing_button']['url'] ?>" title="<?= $button['listing_button']['title'] ?: __('En savoir plus', 'Kalysto')  ?>" <?= $button['listing_button']['target'] ? 'target="_blank"' : '' ?>><?= $button['listing_button']['title'] ?: __('En savoir plus', 'Kalysto')  ?></a>
                </div>
                <?php
            } else if (!empty($button['block_infos_button']['url'])) {
                ?>
                <div class="buttons__button">
                    <a class="btn" href="<?= $button['block_infos_button']['url'] ?>" title="<?= $button['block_infos_button']['title'] ?: __('En savoir plus', 'Kalysto')  ?>" <?= $button['block_infos_button']['target'] ? 'target="_blank"' : '' ?>><?= $button['block_infos_button']['title'] ?: __('En savoir plus', 'Kalysto')  ?></a>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <?php
}
?>