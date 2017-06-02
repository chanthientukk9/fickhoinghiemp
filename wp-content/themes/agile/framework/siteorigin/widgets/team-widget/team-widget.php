<?php

/*
Widget Name: Team
Description: Displays a list of team members created in the Team Profiles tab of the WordPress Admin.
Author: LiveMesh
Author URI: http://portfoliotheme.org
*/


class MO_Team_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-team",
            __("Team", "mo_theme"),
            array(
                "description" => __("Displays a list of team members entered by creating Team custom post types in the Team Profiles tab of the WordPress Admin.", "mo_theme"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "widget_title" => array(
                    "type" => "text",
                    "label" => __("Title", "mo_theme"),
                ),
                'type' => array(
                    'type' => 'select',
                    'label' => __('Choose Style', 'mo_theme'),
                    'default' => 'team_slider',
                    'options' => array(
                        'team' => __('Team List', 'mo_theme'),
                        'team_slider' => __('Team Slider', 'mo_theme')
                    )
                ),
                "department" => array(
                    "type" => "text",
                    "description" => __("The comma separated slugs of the department(s) for which the team needs to be displayed.(optional). Example: sales,accounting.", "mo_theme"),
                    "label" => __("Department", "mo_theme"),
                    "default" => "",
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "department" => $instance["department"],
            "type" => $instance["type"],
        );
    }

}
siteorigin_widget_register("mo-team", __FILE__, "MO_Team_Widget");

