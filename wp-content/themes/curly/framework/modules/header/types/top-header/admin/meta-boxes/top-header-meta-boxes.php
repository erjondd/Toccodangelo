<?php

if (!function_exists('curly_mkdf_get_hide_dep_for_top_header_area_meta_boxes')) {
    function curly_mkdf_get_hide_dep_for_top_header_area_meta_boxes() {
        $hide_dep_options = apply_filters('curly_mkdf_top_header_hide_meta_boxes', $hide_dep_options = array());

        return $hide_dep_options;
    }
}

if (!function_exists('curly_mkdf_header_top_area_meta_options_map')) {
    function curly_mkdf_header_top_area_meta_options_map($header_meta_box) {
        $hide_dep_options = curly_mkdf_get_hide_dep_for_top_header_area_meta_boxes();

        $top_header_container = curly_mkdf_add_admin_container_no_style(
            array(
                'type' => 'container',
                'name' => 'top_header_container',
                'parent' => $header_meta_box,
                'dependency' => array(
                    'hide' => array(
                        'mkdf_header_type_meta' => $hide_dep_options
                    )
                )
            )
        );

        curly_mkdf_add_admin_section_title(
            array(
                'parent' => $top_header_container,
                'name' => 'top_area_style',
                'title' => esc_html__('Top Area', 'curly')
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_top_bar_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Header Top Bar', 'curly'),
                'description' => esc_html__('Enabling this option will show header top bar area', 'curly'),
                'parent' => $top_header_container,
                'options' => curly_mkdf_get_yes_no_select_array(),
            )
        );

        $top_bar_container = curly_mkdf_add_admin_container_no_style(
            array(
                'name' => 'top_bar_container_no_style',
                'parent' => $top_header_container,
                'dependency' => array(
                    'show' => array(
                        'mkdf_top_bar_meta' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_top_bar_in_grid_meta',
                'type' => 'select',
                'label' => esc_html__('Top Bar In Grid', 'curly'),
                'description' => esc_html__('Set top bar content to be in grid', 'curly'),
                'parent' => $top_bar_container,
                'default_value' => '',
                'options' => curly_mkdf_get_yes_no_select_array()
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_top_bar_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Top Bar Background Color', 'curly'),
                'parent' => $top_bar_container
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_top_bar_background_transparency_meta',
                'type' => 'text',
                'label' => esc_html__('Top Bar Background Color Transparency', 'curly'),
                'description' => esc_html__('Set top bar background color transparenct. Value should be between 0 and 1', 'curly'),
                'parent' => $top_bar_container,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_top_bar_border_meta',
                'type' => 'select',
                'label' => esc_html__('Top Bar Border', 'curly'),
                'description' => esc_html__('Set border on top bar', 'curly'),
                'parent' => $top_bar_container,
                'default_value' => '',
                'options' => curly_mkdf_get_yes_no_select_array()
            )
        );

        $top_bar_border_container = curly_mkdf_add_admin_container(
            array(
                'type' => 'container',
                'name' => 'top_bar_border_container',
                'parent' => $top_bar_container,
                'dependency' => array(
                    'show' => array(
                        'mkdf_top_bar_border_meta' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_top_bar_border_color_meta',
                'type' => 'color',
                'label' => esc_html__('Border Color', 'curly'),
                'description' => esc_html__('Choose color for top bar border', 'curly'),
                'parent' => $top_bar_border_container
            )
        );
    }

    add_action('curly_mkdf_additional_header_area_meta_boxes_map', 'curly_mkdf_header_top_area_meta_options_map', 10, 1);
}