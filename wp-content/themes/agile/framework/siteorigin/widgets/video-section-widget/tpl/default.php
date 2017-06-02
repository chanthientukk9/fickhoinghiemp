<?php
/**
 * @var $id
 * @var $class
 * @var $video_id
 * @var $mp4_url
 * @var $ogg_url
 * @var $webm_url
 * @var $mp4_url_fallback
 * @var $ogg_url_fallback
 * @var $webm_url_fallback
 * @var $placeholder_url
 * @var $placeholder_url_fallback
 * @var $text
 * @var $button_text
 * @var $button_url
 * @var $overlay_pattern
 * @var $overlay_pattern_fallback
 * @var $overlay_color
 * @var $overlay_opacity
 * @var $settings
*/


$mp4_url = !empty($mp4_url_fallback) ? $mp4_url_fallback : wp_get_attachment_url($mp4_url);

$ogg_url = !empty($ogg_url_fallback) ? $ogg_url_fallback : wp_get_attachment_url($ogg_url);

$webm_url = !empty($webm_url_fallback) ? $webm_url_fallback : wp_get_attachment_url($webm_url);

if (!empty($placeholder_url) || !empty($placeholder_url_fallback)) {
    $placeholder_url = siteorigin_widgets_get_attachment_image_src(
        $placeholder_url,
        'full',
        !empty($placeholder_url_fallback) ? $placeholder_url_fallback : ''
    );
    $placeholder_url = $placeholder_url[0];
}

if (!empty($overlay_pattern) || !empty($overlay_pattern_fallback)) {
    $overlay_pattern = siteorigin_widgets_get_attachment_image_src(
        $overlay_pattern,
        'full',
        !empty($overlay_pattern_fallback) ? $overlay_pattern_fallback : ''
    );
    $overlay_pattern = $overlay_pattern[0];
}

$overlay_opacity = $overlay_opacity / 100;

echo do_shortcode('[video_section id="' . $id . '" class="' . $class . '" video_id="' . $video_id . '" mp4_url="' . $mp4_url . '" ogg_url="' . $ogg_url . '" webm_url="' . $webm_url . '" placeholder_url="' . $placeholder_url . '" text="' . $text . '" button_text="' . $button_text . '" button_url="' . $button_url . '" overlay_pattern="' . $overlay_pattern . '" overlay_color="' . $overlay_color . '" overlay_opacity="' . $overlay_opacity . '" loop="' . ($settings['loop'] ? 'true' : 'false') . '" muted="' . ($settings['muted'] ? 'true' : 'false') . '" preload="' . $settings['preload'] . '" autoplay="' . ($settings['autoplay'] ? 'true' : 'false') . '"]');

