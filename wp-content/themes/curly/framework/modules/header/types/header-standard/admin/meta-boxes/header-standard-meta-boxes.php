<?php

if (!function_exists('curly_mkdf_get_hide_dep_for_header_standard_meta_boxes')) {
    function curly_mkdf_get_hide_dep_for_header_standard_meta_boxes() {
        $hide_dep_options = apply_filters('curly_mkdf_header_standard_hide_meta_boxes', $hide_dep_options = array());

        return $hide_dep_options;
    }
}

if (!function_exists('curly_mkdf_header_standard_meta_map')) {
    function curly_mkdf_header_standard_meta_map($parent) {
        $hide_dep_options = curly_mkdf_get_hide_dep_for_header_standard_meta_boxes();

        curly_mkdf_create_meta_box_field(
            array(
                'parent' => $parent,
                'type' => 'select',
                'name' => 'mkdf_set_menu_area_position_meta',
                'default_value' => '',
                'label' => esc_html__('Choose Menu Area Position', 'curly'),
                'description' => esc_html__('Select menu area position in your header', 'curly'),
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'left' => esc_html__('Left', 'curly'),
                    'right' => esc_html__('Right', 'curly'),
                    'center' => esc_html__('Center', 'curly')
                ),
                'dependency' => array(
                    'hide' => array(
                        'mkdf_header_type_meta' => $hide_dep_options
                    )
                )
            )
        );
    }

    add_action('curly_mkdf_additional_header_area_meta_boxes_map', 'curly_mkdf_header_standard_meta_map');
}