<?php

if (!function_exists('curly_mkdf_map_footer_meta')) {
    function curly_mkdf_map_footer_meta() {

        $footer_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => apply_filters('curly_mkdf_set_scope_for_meta_boxes', array('page', 'post'), 'footer_meta'),
                'title' => esc_html__('Footer', 'curly'),
                'name' => 'footer_meta'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_disable_footer_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Disable Footer for this Page', 'curly'),
                'description' => esc_html__('Enabling this option will hide footer on this page', 'curly'),
                'options' => curly_mkdf_get_yes_no_select_array(),
                'parent' => $footer_meta_box
            )
        );

        $show_footer_meta_container = curly_mkdf_add_admin_container(
            array(
                'name' => 'mkdf_show_footer_meta_container',
                'parent' => $footer_meta_box,
                'dependency' => array(
                    'hide' => array(
                        'mkdf_disable_footer_meta' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_show_footer_top_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Footer Top', 'curly'),
                'description' => esc_html__('Enabling this option will show Footer Top area', 'curly'),
                'options' => curly_mkdf_get_yes_no_select_array(),
                'parent' => $show_footer_meta_container
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_show_footer_bottom_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Footer Bottom', 'curly'),
                'description' => esc_html__('Enabling this option will show Footer Bottom area', 'curly'),
                'options' => curly_mkdf_get_yes_no_select_array(),
                'parent' => $show_footer_meta_container
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_footer_in_grid_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Footer in Grid', 'curly'),
                'description' => esc_html__('Enabling this option will place Footer content in grid', 'curly'),
                'options' => curly_mkdf_get_yes_no_select_array(),
                'dependency' => array(
                    'hide' => array(
                        'mkdf_show_footer_top_meta' => array('', 'no'),
                        'mkdf_show_footer_bottom_meta' => array('', 'no')
                    )
                ),
                'parent' => $show_footer_meta_container
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_uncovering_footer_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Uncovering Footer', 'curly'),
                'description' => esc_html__('Enabling this option will make Footer gradually appear on scroll', 'curly'),
                'options' => curly_mkdf_get_yes_no_select_array(),
                'parent' => $show_footer_meta_container,
            )
        );
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_footer_meta', 70);
}