<?php
$fields = get_query_var('fields', false);
$video_id = uniqid();

$classes = '';

if (!empty($fields['position'])) {
    $classes .= ' video--'.$fields['position'];
}

if (!empty($fields['video_id'])) {
    ?>
    <div class="video<?= $classes ?>">
        <div class="video__blocks">
            <div class="video__block">
                <div class="embed-responsive embed-responsive-16by9">
                    <div class="js-video video__player embed-responsive-item" id="<?= $video_id ?>" data-videoId="<?= $fields['video_id'] ?>"></div>
                </div>
            </div>
            <?php
            if (!empty($fields['type'])) {
                ?>
                <div class="video__content">
                    <?php
                    if (!empty($fields['title'])) {
                        ?>
                        <h2 class="video__title"><?= $fields['title'] ?></h2>
                        <?php
                    }
                    if (!empty($fields['description'])) {
                        ?>
                        <div class="video__description"><?= $fields['description'] ?></div>
                        <?php
                    }
                    if (!empty($fields['btn']['url']) && !empty($fields['btn']['title'])) {
                        ?>
                        <div class="video__btn">
                            <a class="btn" href="<?= $fields['btn']['url'] ?>" title="<?= $fields['btn']['title'] ?>"><?= $fields['btn']['title'] ?></a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
?>