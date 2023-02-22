<?php

if (!function_exists('curly_mkdf_get_hide_dep_for_header_standard_options')) {
    function curly_mkdf_get_hide_dep_for_header_standard_options() {
        $hide_dep_options = apply_filters('curly_mkdf_header_standard_hide_global_option', $hide_dep_options = array());

        return $hide_dep_options;
    }
}

if (!function_exists('curly_mkdf_header_standard_map')) {
    function curly_mkdf_header_standard_map($parent) {
        $hide_dep_options = curly_mkdf_get_hide_dep_for_header_standard_options();

        curly_mkdf_add_admin_field(
            array(
                'parent' => $parent,
                'type' => 'select',
                'name' => 'set_menu_area_position',
                'default_value' => 'right',
                'label' => esc_html__('Choose Menu Area Position', 'curly'),
                'description' => esc_html__('Select menu area position in your header', 'curly'),
                'options' => array(
                    'right' => esc_html__('Right', 'curly'),
                    'left' => esc_html__('Left', 'curly'),
                    'center' => esc_html__('Center', 'curly')
                ),
                'dependency' => array(
                    'hide' => array(
                        'header_options' => $hide_dep_options
                    )
                )
            )
        );
    }

    add_action('curly_mkdf_additional_header_menu_area_options_map', 'curly_mkdf_header_standard_map');
}