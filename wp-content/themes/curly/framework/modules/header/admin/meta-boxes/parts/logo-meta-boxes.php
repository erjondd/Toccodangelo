<?php

if (!function_exists('curly_mkdf_logo_meta_box_map')) {
    function curly_mkdf_logo_meta_box_map() {

        $logo_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => apply_filters('curly_mkdf_set_scope_for_meta_boxes', array('page', 'post'), 'logo_meta'),
                'title' => esc_html__('Logo', 'curly'),
                'name' => 'logo_meta'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_logo_image_meta',
                'type' => 'image',
                'label' => esc_html__('Logo Image - Default', 'curly'),
                'description' => esc_html__('Choose a default logo image to display ', 'curly'),
                'parent' => $logo_meta_box
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_logo_image_dark_meta',
                'type' => 'image',
                'label' => esc_html__('Logo Image - Dark', 'curly'),
                'description' => esc_html__('Choose a default logo image to display ', 'curly'),
                'parent' => $logo_meta_box
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_logo_image_light_meta',
                'type' => 'image',
                'label' => esc_html__('Logo Image - Light', 'curly'),
                'description' => esc_html__('Choose a default logo image to display ', 'curly'),
                'parent' => $logo_meta_box
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_logo_image_sticky_meta',
                'type' => 'image',
                'label' => esc_html__('Logo Image - Sticky', 'curly'),
                'description' => esc_html__('Choose a default logo image to display ', 'curly'),
                'parent' => $logo_meta_box
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_logo_image_mobile_meta',
                'type' => 'image',
                'label' => esc_html__('Logo Image - Mobile', 'curly'),
                'description' => esc_html__('Choose a default logo image to display ', 'curly'),
                'parent' => $logo_meta_box
            )
        );
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_logo_meta_box_map', 47);
}