<?php

if (!function_exists('mo_get_wp_thumb_name')) {

    function mo_get_wp_thumb_name($easy_name, $default = 'medium') {
        global $mo_theme;

        $image_size = null;

        $easy_name_map = $mo_theme->get_easy_image_name_map();

        if (array_key_exists($easy_name, $easy_name_map)) {
            $image_size = $easy_name_map [$easy_name];
        }
        elseif ($default != null)
            $image_size = $easy_name_map [$default];
        return $image_size;
    }
}

if (!function_exists('mo_get_thumbnail_args_for_singular')) {

    function mo_get_thumbnail_args_for_singular() {
        $layout_manager = mo_get_layout_manager();

        /* Set the default arguments. */
        $args = array('wrapper' => true,
            'size' => 'full',
            'before_html' => '<span>',
            'after_html' => '</span>',
            'image_scan' => false, /* Do not scan content for images - do not want to duplicate the image in content. Use featured image only */
            'attachment' => false /* Show only featured images as post image on the top */
        );

        $retain_image_height = mo_get_theme_option('mo_retain_image_height');

        if ($layout_manager->is_full_width_layout()) {
            $args['image_size'] = 'full';
            $args['image_class'] = 'featured thumbnail full-1c';
        }
        else {
            $args['image_size'] = 'large';
            $args['image_class'] = 'featured thumbnail full';
        }

        if ($retain_image_height) {
            $args['image_size'] = null; // retain original image - don't bother cropping
        }

        return $args;
    }
}

if (!function_exists('mo_is_youtube')) {

    function mo_is_youtube($video_url) {
        if (strpos($video_url, "youtube.com") || strpos($video_url, "youtu.be"))
            return true;
        else return false;
    }
}

if (!function_exists('mo_is_vimeo')) {
    function mo_is_vimeo($video_url) {
        if (strpos($video_url, "vimeo.com"))
            return true;
        else
            return false;
    }
}

if (!function_exists('mo_get_youtube_id')) {

    function mo_get_youtube_id($video_url) {
        preg_match('#(?:https?(?:a|vh?)?://)?youtu\.be/([A-Za-z0-9\-_]+)#', $video_url, $matches);
        return $matches[1];
    }
}

if (!function_exists('mo_get_vimeo_id')) {

    function mo_get_vimeo_id($video_url) {
        preg_match('#(?:http://)?(?:www\.)?vimeo\.com/([A-Za-z0-9\-_]+)#', $video_url, $matches);
        return $matches[1];
    }
}