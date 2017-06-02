<?php

/*
Widget Name: Post Snippets Carousel
Description: Create a touch friendly responsive carousel of a collection of custom posts.
Author: LiveMesh
Author URI: http://portfoliotheme.org
*/


class MO_Post_Snippets_Carousel_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-post-snippets-carousel",
            __("Post Snippets Carousel", "mo_theme"),
            array(
                "description" => __("Create a responsive carousel of a collection of custom posts.", "mo_theme"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "widget_title" => array(
                    "type" => "text",
                    "label" => __("Title", "mo_theme"),
                ),
                "id" => array(
                    "type" => "text",
                    "description" => __("The element id to be set for the wrapper element created. (optional).", "mo_theme"),
                    "label" => __("Id", "mo_theme"),
                ),
                "class" => array(
                    "type" => "text",
                    "description" => __("The element class to be set for the wrapper element created. (optional).", "mo_theme"),
                    "label" => __("Class", "mo_theme"),
                ),
                "posts_query" => array(
                    "type" => "posts",
                    "label" => __("Posts Query", "mo_theme")
                ),
                "image_size" => array(
                    "type" => "select",
                    "description" => __("The image size to be used. ", "mo_theme"),
                    "label" => __("Image size", "mo_theme"),
                    "options" => array(
                        "thumbnail" => __("Thumbnail", "mo_theme"),
                        "small" => __("Small", "mo_theme"),
                        "medium" => __("Medium", "mo_theme"),
                        "large" => __("Large", "mo_theme"),
                        "full" => __("Full", "mo_theme"),
                        "square" => __("Square", "mo_theme"),
                        "proportional" => __("Proportional", "mo_theme"),
                    ),
                    "default" => "medium"
                ),
                "hide_thumbnail" => array(
                    "type" => "checkbox",
                    "description" => __("Display thumbnail image or hide the same.", "mo_theme"),
                    "label" => __("Hide thumbnail?", "mo_theme"),
                    "default" => false,
                ),
                "display_title" => array(
                    "type" => "checkbox",
                    "description" => __("Specify if the title of the post or custom post type needs to be displayed below the featured image", "mo_theme"),
                    "label" => __("Display title?", "mo_theme"),
                    "default" => true,
                ),
                "display_summary" => array(
                    "type" => "checkbox",
                    "description" => __("Specify if the excerpt or summary content of the post/custom post type needs to be displayed below the featured image thumbnail.", "mo_theme"),
                    "label" => __("Display summary?", "mo_theme"),
                    "default" => true,
                ),
                "show_excerpt" => array(
                    "type" => "checkbox",
                    "description" => __("Display excerpt for the post/custom post type. Has no effect if display_summary is set to false. If show_excerpt is set to false and display_summary is set to true, the content of the post is displayed truncated by the more WordPress tag. If more tag is not specified, the entire post content is displayed.", "mo_theme"),
                    "label" => __("Show excerpt?", "mo_theme"),
                    "default" => true,
                ),
                "excerpt_count" => array(
                    "type" => "number",
                    "description" => __("Applicable only to excerpts. The excerpt displayed is truncated to the number of characters specified with this parameter.", "mo_theme"),
                    "label" => __("Excerpt count", "mo_theme"),
                    "default" => 100,
                ),
                "show_meta" => array(
                    "type" => "checkbox",
                    "description" => __("Display meta information like the author, date of publishing and number of comments.", "mo_theme"),
                    "label" => __("Show meta?", "mo_theme"),
                    "default" => false,
                ),


                'settings' => array(
                    'type' => 'section',
                    'label' => __('Carousel Settings', 'livemesh-so-widgets'),
                    'fields' => array(

                        "pagination_speed" => array(
                            "type" => "number",
                            "description" => __("Pagination speed in milliseconds", "mo_theme"),
                            "label" => __("Pagination speed", "mo_theme"),
                            "default" => 800,
                        ),
                        "slide_speed" => array(
                            "type" => "number",
                            "description" => __("Slide speed in milliseconds.", "mo_theme"),
                            "label" => __("Slide speed", "mo_theme"),
                            "default" => 200,
                        ),
                        "rewind_speed" => array(
                            "type" => "number",
                            "description" => __("Rewind speed in milliseconds.", "mo_theme"),
                            "label" => __("Rewind speed", "mo_theme"),
                            "default" => 1000,
                        ),
                        "stop_on_hover" => array(
                            "type" => "checkbox",
                            "description" => __("Stop autoplay on mouse hover?", "mo_theme"),
                            "label" => __("Stop on hover?", "mo_theme"),
                            "default" => true,
                        ),
                        "auto_play" => array(
                            "type" => "text",
                            "description" => __("Change to any integer for example autoPlay : 5000 to play every 5 seconds. If you set text true default speed will be 5 seconds. Set to text false to disable autoplay.", "mo_theme"),
                            "label" => __("Auto play", "mo_theme"),
                            "default" => 'true',
                        ),
                        "scroll_per_page" => array(
                            "type" => "checkbox",
                            "description" => __("Scroll per page and not per item. This affect next/prev buttons and mouse/touch dragging.", "mo_theme"),
                            "label" => __("Scroll per page?", "mo_theme"),
                            "default" => false,
                        ),
                        "pagination" => array(
                            "type" => "checkbox",
                            "description" => __("Show pagination?", "mo_theme"),
                            "label" => __("Pagination?", "mo_theme"),
                            "default" => true,
                        ),
                        "navigation" => array(
                            "type" => "checkbox",
                            "description" => __("Display next and prev buttons?", "mo_theme"),
                            "label" => __("Navigation?", "mo_theme"),
                            "default" => false,
                        ),
                    )
                ),


                'responsive_settings' => array(
                    'type' => 'section',
                    'label' => __('Responsive Settings', 'livemesh-so-widgets'),
                    'fields' => array(
                        "items" => array(
                            "type" => "slider",
                            "description" => __("Maximum amount of items displayed at a time with the widest browser width.", "mo_theme"),
                            "label" => __("Items", "mo_theme"),
                            'min' => 1,
                            'max' => 5,
                            'integer' => true,
                            'default' => 3
                        ),
                        "items_desktop" => array(
                            "type" => "slider",
                            "description" => __("Maximum amount of items displayed at a time with the desktop browser width (<1200px).", "mo_theme"),
                            "label" => __("Items desktop", "mo_theme"),
                            'min' => 1,
                            'max' => 5,
                            'integer' => true,
                            'default' => 3
                        ),
                        "items_desktop_small" => array(
                            "type" => "slider",
                            "description" => __("Maximum amount of items displayed at a time with the smaller desktop browser width(<980px).", "mo_theme"),
                            "label" => __("Items desktop_small", "mo_theme"),
                            'min' => 1,
                            'max' => 5,
                            'integer' => true,
                            'default' => 3
                        ),
                        "items_tablet" => array(
                            "type" => "slider",
                            "description" => __("Maximum amount of items displayed at a time with the tablet browser width(<769px).", "mo_theme"),
                            "label" => __("Items tablet", "mo_theme"),
                            'min' => 1,
                            'max' => 4,
                            'integer' => true,
                            'default' => 2
                        ),
                        "items_tablet_small" => array(
                            "type" => "slider",
                            "description" => __("Maximum amount of items displayed at a time with the smaller tablet browser width.", "mo_theme"),
                            "label" => __("Items tablet_small", "mo_theme"),
                            'min' => 1,
                            'max' => 3,
                            'integer' => true,
                            'default' => 2
                        ),
                        "items_mobile" => array(
                            "type" => "slider",
                            "description" => __("Maximum amount of items displayed at a time with the smartphone mobile browser width(<480px).", "mo_theme"),
                            "label" => __("Items mobile", "mo_theme"),
                            'min' => 1,
                            'max' => 3,
                            'integer' => true,
                            'default' => 1
                        ),
                    )
                )
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "id" => $instance["id"],
            "posts_query" => $instance["posts_query"],
            "image_size" => $instance["image_size"],
            "hide_thumbnail" => $instance["hide_thumbnail"],
            "display_title" => $instance["display_title"],
            "display_summary" => $instance["display_summary"],
            "show_excerpt" => $instance["show_excerpt"],
            "excerpt_count" => $instance["excerpt_count"],
            "show_meta" => $instance["show_meta"],

            "pagination_speed" => $instance["settings"]["pagination_speed"],
            "slide_speed" => $instance["settings"]["slide_speed"],
            "rewind_speed" => $instance["settings"]["rewind_speed"],
            "stop_on_hover" => $instance["settings"]["stop_on_hover"],
            "auto_play" => $instance["settings"]["auto_play"],
            "scroll_per_page" => $instance["settings"]["scroll_per_page"],
            "pagination" => $instance["settings"]["pagination"],
            "navigation" => $instance["settings"]["navigation"],

            "items" => $instance["responsive_settings"]["items"],
            "items_mobile" => $instance["responsive_settings"]["items_mobile"],
            "items_tablet" => $instance["responsive_settings"]["items_tablet"],
            "items_tablet_small" => $instance["responsive_settings"]["items_tablet_small"],
            "items_desktop_small" => $instance["responsive_settings"]["items_desktop_small"],
            "items_desktop" => $instance["responsive_settings"]["items_desktop"],
        );
    }

}

siteorigin_widget_register("mo-post-snippets-carousel", __FILE__, "MO_Post_Snippets_Carousel_Widget");

