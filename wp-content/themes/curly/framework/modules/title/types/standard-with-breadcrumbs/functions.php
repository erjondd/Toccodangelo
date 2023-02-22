<?php

if (!function_exists('curly_mkdf_set_title_standard_with_breadcrumbs_type_for_options')) {
    /**
     * This function set standard with breadcrumbs title type value for title options map and meta boxes
     */
    function curly_mkdf_set_title_standard_with_breadcrumbs_type_for_options($type) {
        $type['standard-with-breadcrumbs'] = esc_html__('Standard With Breadcrumbs', 'curly');

        return $type;
    }

    add_filter('curly_mkdf_title_type_global_option', 'curly_mkdf_set_title_standard_with_breadcrumbs_type_for_options');
    add_filter('curly_mkdf_title_type_meta_boxes', 'curly_mkdf_set_title_standard_with_breadcrumbs_type_for_options');
}