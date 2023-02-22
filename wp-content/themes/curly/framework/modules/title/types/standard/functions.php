<?php

if (!function_exists('curly_mkdf_set_title_standard_type_for_options')) {
    /**
     * This function set standard title type value for title options map and meta boxes
     */
    function curly_mkdf_set_title_standard_type_for_options($type) {
        $type['standard'] = esc_html__('Standard', 'curly');

        return $type;
    }

    add_filter('curly_mkdf_title_type_global_option', 'curly_mkdf_set_title_standard_type_for_options');
    add_filter('curly_mkdf_title_type_meta_boxes', 'curly_mkdf_set_title_standard_type_for_options');
}

if (!function_exists('curly_mkdf_set_title_standard_type_as_default_options')) {
    /**
     * This function set default title type value for global title option map
     */
    function curly_mkdf_set_title_standard_type_as_default_options($type) {
        $type = 'standard';

        return $type;
    }

    add_filter('curly_mkdf_default_title_type_global_option', 'curly_mkdf_set_title_standard_type_as_default_options');
}