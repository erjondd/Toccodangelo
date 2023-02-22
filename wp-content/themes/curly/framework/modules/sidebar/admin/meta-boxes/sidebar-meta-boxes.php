<?php

if (!function_exists('curly_mkdf_map_sidebar_meta')) {
    function curly_mkdf_map_sidebar_meta() {
        $mkdf_sidebar_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => apply_filters('curly_mkdf_set_scope_for_meta_boxes', array('page'), 'sidebar_meta'),
                'title' => esc_html__('Sidebar', 'curly'),
                'name' => 'sidebar_meta'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_sidebar_layout_meta',
                'type' => 'select',
                'label' => esc_html__('Sidebar Layout', 'curly'),
                'description' => esc_html__('Choose the sidebar layout', 'curly'),
                'parent' => $mkdf_sidebar_meta_box,
                'options' => curly_mkdf_get_custom_sidebars_options(true)
            )
        );

        $mkdf_custom_sidebars = curly_mkdf_get_custom_sidebars();
        if (count($mkdf_custom_sidebars) > 0) {
            curly_mkdf_create_meta_box_field(
                array(
                    'name' => 'mkdf_custom_sidebar_area_meta',
                    'type' => 'selectblank',
                    'label' => esc_html__('Choose Widget Area in Sidebar', 'curly'),
                    'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'curly'),
                    'parent' => $mkdf_sidebar_meta_box,
                    'options' => $mkdf_custom_sidebars,
                    'args' => array(
                        'select2' => true
                    )
                )
            );
        }
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_sidebar_meta', 31);
}