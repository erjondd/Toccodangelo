<?php

if (!function_exists('curly_mkdf_set_search_covers_header_global_option')) {
    /**
     * This function set search type value for search options map
     */
    function curly_mkdf_set_search_covers_header_global_option($search_type_options) {
        $search_type_options['covers-header'] = esc_html__('Covers Header', 'curly');

        return $search_type_options;
    }

    add_filter('curly_mkdf_search_type_global_option', 'curly_mkdf_set_search_covers_header_global_option');
}