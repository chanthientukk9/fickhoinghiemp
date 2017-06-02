<?php

/*
Widget Name: Show Gallery
Description: Display gallery in a multi-column grid, filterable by gallery categories.
Author: LiveMesh
Author URI: http://gallerytheme.org
*/


class MO_Show_Gallery_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-show-gallery",
            __("Show Gallery", "mo_theme"),
            array(
                "description" => __("Display gallery in a multi-column grid, filterable by gallery categories.", "mo_theme"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "widget_title" => array(
                    "type" => "text",
                    "label" => __("Title", "mo_theme"),
                ),
                "number_of_columns" => array(
                    "type" => "slider",
                    "description" => __("Number of gallery items to display per row. ", "mo_theme"),
                    "label" => __("Number of columns", "mo_theme"),
                    "min" => 1,
                    "max" => 5,
                    "integer" => true,
                    "default" => 4,
                ),
                "post_count" => array(
                    "type" => "number",
                    "description" => __("Number of gallery items to display.", "mo_theme"),
                    "label" => __("Post count", "mo_theme"),
                    "default" => 12,
                ),
                "image_size" => array(
                    "type" => "select",
                    "description" => __("Size of the image to be displayed in the gallery.", "mo_theme"),
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
                "filterable" => array(
                    "type" => "checkbox",
                    "description" => __("The gallery items will be filterable based on gallery categories if checked.", "mo_theme"),
                    "label" => __("Filterable?", "mo_theme"),
                    "default" => true,
                ),
                "no_margin" => array(
                    "type" => "checkbox",
                    "description" => __("If checked, no margins are maintained between the columns. Helps to achieve the popular packed layout.", "mo_theme"),
                    "label" => __("Packed layout?", "mo_theme"),
                    "default" => false,
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "number_of_columns" => $instance["number_of_columns"],
            "post_count" => $instance["post_count"],
            "image_size" => $instance["image_size"],
            "filterable" => $instance["filterable"],
            "no_margin" => $instance["no_margin"],
        );
    }

}
siteorigin_widget_register("mo-show-gallery", __FILE__, "MO_Show_Gallery_Widget");