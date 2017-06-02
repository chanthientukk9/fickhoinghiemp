<?php

/*
Widget Name: Stats Bars
Description: Display a set of animated line bars to display percentage stats.
Author: LiveMesh
Author URI: http://portfoliotheme.org
*/


class MO_Stats_Bars_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-stats-bars",
            __("Stats Bars", "mo_theme"),
            array(
                "description" => __("Display a set of animated line bars to display percentage stats.", "mo_theme"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),

            array(
                'title' => array(
                    'type' => 'text',
                    'label' => __('Title', 'mo_theme'),
                ),

                'stats_bars' => array(
                    'type' => 'repeater',
                    'label' => __('Stats Bars', 'mo_theme'),
                    'item_name' => __('Stats Bar', 'mo_theme'),
                    'item_label' => array(
                        'selector' => "[id*='title']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(

                        "title" => array(
                            "type" => "text",
                            "description" => __("The title to be displayed above the stats line bar.", "mo_theme"),
                            "label" => __("Stats title", "mo_theme"),
                            "default" => __("Web Design 87%", "mo_theme"),
                        ),
                        "value" => array(
                            "type" => "number",
                            "description" => __("The percentage value for the stats to be displayed.", "mo_theme"),
                            "label" => __("Value", "mo_theme"),
                            "default" => 87,
                        ),
                    )
                ),

            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "title" => $instance["title"],
            'stats_bars' => !empty($instance['stats_bars']) ? $instance['stats_bars'] : array(),
        );
    }

}

siteorigin_widget_register("mo-stats-bars", __FILE__, "MO_Stats_Bars_Widget");

