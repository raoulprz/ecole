<?php
$fields = get_query_var('fields', false);
$video_id = $fields['video_youtube_id'];
$align = $fields['video_align'];
$width = $fields['video_width'];
$customWidth = '';
if ($width == 'custom') {
    $customWidth = 'style="width:'.$fields['video_custom_width'].'"';
}
?>


<div class="element-video__block align-<?= $align ?>">
    <div class="embed-responsive embed-responsive-16by9">
        <div class="js-video element-video__player embed-responsive-item <?= $width ?>width" id="<?= $video_id ?>" data-videoId="<?= $video_id ?>" <?= $customWidth ?>></div>
    </div>
</div>