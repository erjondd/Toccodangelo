<?php

if (!function_exists('curly_mkdf_sticky_header_meta_boxes_options_map')) {
    function curly_mkdf_sticky_header_meta_boxes_options_map($header_meta_box) {

        $sticky_amount_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $header_meta_box,
                'name' => 'sticky_amount_container_meta_container',
                'dependency' => array(
                    'hide' => array(
                        'mkdf_header_behaviour_meta' => array('', 'no-behavior', 'fixed-on-scroll', 'sticky-header-on-scroll-up')
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_scroll_amount_for_sticky_meta',
                'type' => 'text',
                'label' => esc_html__('Scroll Amount for Sticky Header Appearance', 'curly'),
                'description' => esc_html__('Define scroll amount for sticky header appearance', 'curly'),
                'parent' => $sticky_amount_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        $curly_custom_sidebars = curly_mkdf_get_custom_sidebars();
        if (count($curly_custom_sidebars) > 0) {
            curly_mkdf_create_meta_box_field(
                array(
                    'name' => 'mkdf_custom_sticky_menu_area_sidebar_meta',
                    'type' => 'selectblank',
                    'label' => esc_html__('Choose Custom Widget Area In Sticky Header Menu Area', 'curly'),
                    'description' => esc_html__('Choose custom widget area to display in sticky header menu area"', 'curly'),
                    'parent' => $header_meta_box,
                    'options' => $curly_custom_sidebars,
                    'dependency' => array(
                        'show' => array(
                            'mkdf_header_behaviour_meta' => array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
                        )
                    )
                )
            );
        }
    }

    add_action('curly_mkdf_additional_header_area_meta_boxes_map', 'curly_mkdf_sticky_header_meta_boxes_options_map', 8, 1);
}