<?php

if (!function_exists('curly_mkdf_breadcrumbs_title_type_options_meta_boxes')) {
    function curly_mkdf_breadcrumbs_title_type_options_meta_boxes($show_title_area_meta_container) {

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_breadcrumbs_color_meta',
                'type' => 'color',
                'label' => esc_html__('Breadcrumbs Color', 'curly'),
                'description' => esc_html__('Choose a color for breadcrumbs text', 'curly'),
                'parent' => $show_title_area_meta_container
            )
        );
    }

    add_action('curly_mkdf_additional_title_area_meta_boxes', 'curly_mkdf_breadcrumbs_title_type_options_meta_boxes');
}