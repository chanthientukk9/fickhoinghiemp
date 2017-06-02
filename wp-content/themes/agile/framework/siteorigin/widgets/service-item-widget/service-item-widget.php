<?php

/*
Widget Name: Service Item
Description: Displays a service item part of services.
Author: LiveMesh
Author URI: http://portfoliotheme.org
*/


class MO_Service_Item_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-service-item",
            __("Service Item", "mo_theme"),
            array(
                "description" => __("Displays a service item part of services.", "mo_theme"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "title" => array(
                    "type" => "text",
                    "description" => __("The title for the service.", "mo_theme"),
                    "label" => __("Title", "mo_theme"),
                    "default" => __("Web Design", "mo_theme"),
                ),
                "description" => array(
                    "type" => "textarea",
                    "description" => __("A short description of the service.", "mo_theme"),
                    "label" => __("Description", "mo_theme"),
                ),
                'icon' => array(
                    'type' => 'text',
                    'label' => __('Service Icon', 'mo_theme'),
                    'description' => __('The font icon representing the service item being displayed, chosen from the list of icons listed at <a href="http://portfoliotheme.org/wp-content/uploads/icomoon/demo.html" target="_blank">http://portfoliotheme.org/wp-content/uploads/icomoon/demo.html</a>.', 'mo_theme'),
                    "default" => 'icon-heart'
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "icon" => $instance["icon"],
            "title" => $instance["title"],
            "description" => $instance["description"],
        );
    }

}
siteorigin_widget_register("mo-service-item", __FILE__, "MO_Service_Item_Widget");