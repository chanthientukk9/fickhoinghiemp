<?php

/*
Widget Name: Header fancy
Description: Draws a nice looking header with a title displayed in the center and with a line dividing the content.
Author: LiveMesh
Author URI: http://portfoliotheme.org
*/


class MO_Header_Fancy_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-header-fancy",
            __("Header fancy", "mo_theme"),
            array(
                "description" => __("Draws a nice looking header with a title displayed in the center and with a line dividing the content.", "mo_theme"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "class" => array(
                    "type" => "text",
                    "description" => __("The CSS class to be set for the div element created (optional).", "mo_theme"),
                    "label" => __("Class", "mo_theme"),
                    "default" => "",
                ),
                "style" => array(
                    "type" => "text",
                    "description" => __("Inline CSS styling applied for the div element created (optional)", "mo_theme"),
                    "label" => __("Style", "mo_theme"),
                    "default" => "",
                ),
                "title" => array(
                    "type" => "text",
                    "description" => __("The title to be displayed in the center of the header.", "mo_theme"),
                    "label" => __("Title", "mo_theme"),
                    "default" => __("Our Courses", "mo_theme"),
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "class" => $instance["class"],
            "style" => $instance["style"],
            "title" => $instance["title"],
        );
    }

}
siteorigin_widget_register("mo-header-fancy", __FILE__, "MO_Header_Fancy_Widget");