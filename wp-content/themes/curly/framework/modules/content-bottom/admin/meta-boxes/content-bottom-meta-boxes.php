<?php

if (!function_exists('curly_mkdf_map_content_bottom_meta')) {
    function curly_mkdf_map_content_bottom_meta() {

        $content_bottom_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => apply_filters('curly_mkdf_set_scope_for_meta_boxes', array('page', 'post'), 'content_bottom_meta'),
                'title' => esc_html__('Content Bottom', 'curly'),
                'name' => 'content_bottom_meta'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_enable_content_bottom_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Content Bottom Area', 'curly'),
                'description' => esc_html__('This option will enable Content Bottom area on pages', 'curly'),
                'parent' => $content_bottom_meta_box,
                'options' => curly_mkdf_get_yes_no_select_array()
            )
        );

        $show_content_bottom_meta_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $content_bottom_meta_box,
                'name' => 'mkdf_show_content_bottom_meta_container',
                'dependency' => array(
                    'show' => array(
                        'mkdf_enable_content_bottom_area_meta' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_content_bottom_sidebar_custom_display_meta',
                'type' => 'selectblank',
                'default_value' => '',
                'label' => esc_html__('Sidebar to Display', 'curly'),
                'description' => esc_html__('Choose a content bottom sidebar to display', 'curly'),
                'options' => curly_mkdf_get_custom_sidebars(),
                'parent' => $show_content_bottom_meta_container,
                'args' => array(
                    'select2' => true
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'type' => 'select',
                'name' => 'mkdf_content_bottom_in_grid_meta',
                'default_value' => '',
                'label' => esc_html__('Display in Grid', 'curly'),
                'description' => esc_html__('Enabling this option will place content bottom in grid', 'curly'),
                'options' => curly_mkdf_get_yes_no_select_array(),
                'parent' => $show_content_bottom_meta_container
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'type' => 'color',
                'name' => 'mkdf_content_bottom_background_color_meta',
                'label' => esc_html__('Background Color', 'curly'),
                'description' => esc_html__('Choose a background color for content bottom area', 'curly'),
                'parent' => $show_content_bottom_meta_container
            )
        );
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_content_bottom_meta', 71);
}