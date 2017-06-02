<?php

/*
  Widget Name: HTML5 Video Showcase
  Description: Displays an HTML5 video with controls for play/pause/mute. The video is not auto-played by default and waits for the user input via the play button.
  Author: LiveMesh
  Author URI: http://portfoliotheme.org
 */

class MO_Video_Showcase_Widget extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            "mo-video-showcase", __("HTML5 Video Showcase", "mo_theme"), array(
            "description" => __("Displays an HTML5 video with controls for play/pause/mute. The video is not auto-played by default and waits for the user input via the play button.", "mo_theme"),
            "panels_icon" => "dashicons dashicons-minus",
        ), array(), array(
                "id" => array(
                    "type" => "text",
                    "description" => __("The id of the DIV element created to wrap the HTML5 video (optional).", "mo_theme"),
                    "label" => __("Id", "mo_theme"),
                    "default" => __("video-intro", "mo_theme"),
                ),
                "class" => array(
                    "type" => "text",
                    "description" => __("The CSS class of the DIV element created to wrap the HTML5 video", "mo_theme"),
                    "label" => __("Class", "mo_theme"),
                    "default" => __("video-heading", "mo_theme"),
                ),
                "video_id" => array(
                    "type" => "text",
                    "description" => __("The id of the VIDEO element.", "mo_theme"),
                    "label" => __("Video ID", "mo_theme"),
                    "default" => __("video1", "mo_theme"),
                ),
                "mp4_url" => array(
                    'type' => 'media',
                    'library' => 'video',
                    'fallback' => true,
                    "description" => __("The URL of the video uploaded in MP4 format.", "mo_theme"),
                    "label" => __("MP4 Video URL", "mo_theme"),
                ),
                "ogg_url" => array(
                    'type' => 'media',
                    'library' => 'video',
                    'fallback' => true,
                    "description" => __("The URL of the video uploaded in OGG format.", "mo_theme"),
                    "label" => __("OGG Video URL", "mo_theme"),
                ),
                "webm_url" => array(
                    'type' => 'media',
                    'library' => 'video',
                    'fallback' => true,
                    "description" => __("The URL of the video uploaded in WebM format.", "mo_theme"),
                    "label" => __("WebM Video URL", "mo_theme"),
                ),
                "placeholder_url" => array(
                    'type' => 'media',
                    'library' => 'image',
                    'fallback' => true,
                    "description" => __("The placeholder image to be displayed instead of video in mobile devices.", "mo_theme"),
                    "label" => __("Placeholder Image", "mo_theme"),
                ),
                "title" => array(
                    "type" => "text",
                    "description" => __("The title text displayed on top of the video. ", "mo_theme"),
                    "label" => __("Title", "mo_theme"),
                    "default" => "",
                ),
                "text" => array(
                    "type" => "text",
                    "description" => __("The text displayed on top of the video.", "mo_theme"),
                    "label" => __("Subtitle", "mo_theme"),
                    "default" => "",
                ),
                "button_text" => array(
                    "type" => "text",
                    "description" => __("Text of the button shown to the user on top of the video.", "mo_theme"),
                    "label" => __("Button text", "mo_theme"),
                    "default" => __("Purchase Now »", "mo_theme"),
                ),
                "button_url" => array(
                    "type" => "link",
                    "description" => __("The URL to which the button needs to point to.", "mo_theme"),
                    "label" => __("Button url", "mo_theme"),
                    "default" => __("http://example.com", "mo_theme"),
                ),
                'overlay_settings' => array(
                    'type' => 'section',
                    'label' => __('Overlay Settings', 'livemesh-so-widgets'),
                    'fields' => array(
                        "overlay_color" => array(
                            "type" => "color",
                            "description" => __("The color of the overlay to be applied on the video.", "mo_theme"),
                            "label" => __("Overlay color", "mo_theme"),
                        ),
                        "overlay_opacity" => array(
                            "type" => "slider",
                            "description" => __("The opacity of the overlay color applied on the video.", "mo_theme"),
                            "label" => __("Overlay opacity", "mo_theme"),
                            'min' => 0,
                            'max' => 100,
                            'integer' => true,
                            'default' => 40
                        ),
                        "overlay_pattern" => array(
                            "type" => "media",
                            "library" => "image",
                            'fallback' => true,
                            "description" => __("The image which can act as a pattern displayed on top of the video.", "mo_theme"),
                            "label" => __("Overlay pattern", "mo_theme"),
                        ),
                    )
                ),


                'settings' => array(
                    'type' => 'section',
                    'label' => __('Settings', 'livemesh-so-widgets'),
                    'fields' => array(

                        "loop" => array(
                            "type" => "checkbox",
                            "description" => __("Specify if you need to loop the video", "mo_theme"),
                            "label" => __("Loop", "mo_theme"),
                            "default" => true,
                        ),
                        "muted" => array(
                            "type" => "checkbox",
                            "description" => __("A boolean value indicating if the video needs to be started muted. The user can unmute/mute during video play if required with the help of mute/unmute button", "mo_theme"),
                            "label" => __("Mute", "mo_theme"),
                            "default" => true,
                        ),
                        "autoplay" => array(
                            "type" => "checkbox",
                            "description" => __("Specify if the video should autoplay once the video once ready.", "mo_theme"),
                            "label" => __("Autoplay", "mo_theme"),
                            "default" => true,
                        ),
                        "preload" => array(
                            "type" => "select",
                            "description" => __("Specify if the HTML5 video needs to be preloaded irrespective of whether the user chooses to play or not. Possible values are auto (preloads entire video when the page loads), metadata (load only metadata when page loads) and none (preload nothing on page load).", "mo_theme"),
                            "label" => __("Preload", "mo_theme"),
                            "default" => __("none", "mo_theme"),
                            "options" => array(
                                "none" => __("No Preload", "mo_theme"),
                                "metadata" => __("Preload Metadata", "mo_theme"),
                                "auto" => __("Preload Video", "mo_theme"),
                            )
                        ),


                    )
                ),

            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "id" => $instance["id"],
            "class" => $instance["class"],
            "video_id" => $instance["video_id"],
            
            "mp4_url" => $instance["mp4_url"],
            "ogg_url" => $instance["ogg_url"],
            "webm_url" => $instance["webm_url"],
            "mp4_url_fallback" => $instance["mp4_url_fallback"],
            "ogg_url_fallback" => $instance["ogg_url_fallback"],
            "webm_url_fallback" => $instance["webm_url_fallback"],
            
            "placeholder_url" => $instance["placeholder_url"],
            "placeholder_url_fallback" => $instance["placeholder_url_fallback"],
            
            "text" => $instance["text"],
            "title" => $instance["title"],
            "button_text" => $instance["button_text"],
            "button_url" => (!empty($instance['button_url'])) ? sow_esc_url($instance['button_url']) : '',

            "overlay_color" => (isset($instance["overlay_settings"]["overlay_color"]) ? $instance["overlay_settings"]["overlay_color"] : ''),
            "overlay_opacity" => (isset($instance["overlay_settings"]["overlay_opacity"]) ? $instance["overlay_settings"]["overlay_opacity"] : 40),
            "overlay_pattern" => (isset($instance["overlay_settings"]["overlay_pattern"]) ? $instance["overlay_settings"]["overlay_pattern"] : ''),
            "overlay_pattern_fallback" => (isset($instance["overlay_settings"]["overlay_pattern_fallback"]) ? $instance["overlay_settings"]["overlay_pattern_fallback"] : ''),

            'settings' => $instance['settings']
        );
    }

}

siteorigin_widget_register("mo-video-showcase", __FILE__, "MO_Video_Showcase_Widget");



