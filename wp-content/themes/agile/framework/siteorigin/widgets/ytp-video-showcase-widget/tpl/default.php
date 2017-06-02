<?php
/**
 * @var $id
 * @var $class
 * @var $video_url
 * @var $placeholder_url
 * @var $placeholder_url_fallback
 * @var $title
 * @var $text
 * @var $button_text
 * @var $button_url
 * @var $overlay_color
 * @var $overlay_opacity
 * @var $overlay_pattern
 * @var $overlay_pattern_fallback
 * @var $settings
 */


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

echo do_shortcode('[ytp_video_showcase id="' . $id . '" class="' . $class . '" video_url="' . $video_url . '" placeholder_url="' . $placeholder_url . '" title="' . $title . '" text="' . $text . '" button_text="' . $button_text . '" button_url="' . $button_url . '" overlay_color="' . $overlay_color . '" overlay_opacity="' . $overlay_opacity . '" overlay_pattern="' . $overlay_pattern . '" containment="' . $settings['containment'] . '" start_at="' . $settings['start_at'] . '" loop="' . ($settings['loop'] ? 'true' : 'false') . '" mute="' . ($settings['mute'] ? 'true' : 'false') . '" quality="' . $settings['quality'] . '" opacity="' . ($settings['opacity'] / 100) . '" vol="' . $settings['vol'] . '" ratio="\'' . $settings['ratio'] . '\'" autoplay="' . ($settings['autoplay'] ? 'true' : 'false') . '" optimize_display="' . ($settings['optimize_display'] ? 'true' : 'false') . '" start_at="' . $settings['start_at'] . '" stop_at="' . $settings['stop_at'] . '" show_controls="' . ($settings['show_controls'] ? 'true' : 'false') . '"]');