<?php

if (!function_exists('curly_mkdf_search_body_class')) {
    /**
     * Function that adds body classes for different search types
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function curly_mkdf_search_body_class($classes) {
        $classes[] = 'mkdf-search-covers-header';

        return $classes;
    }

    add_filter('body_class', 'curly_mkdf_search_body_class');
}

if (!function_exists('curly_mkdf_get_search')) {
    /**
     * Loads search HTML based on search type option.
     */
    function curly_mkdf_get_search() {
        curly_mkdf_load_search_template();
    }

    add_action('curly_mkdf_before_page_header_html_close', 'curly_mkdf_get_search');
    add_action('curly_mkdf_before_mobile_header_html_close', 'curly_mkdf_get_search');
}

if (!function_exists('curly_mkdf_load_search_template')) {
    /**
     * Loads search HTML based on search type option.
     */
    function curly_mkdf_load_search_template() {

        $search_in_grid = curly_mkdf_options()->getOptionValue('search_in_grid') == 'yes' ? true : false;

        $parameters = array(
            'search_in_grid' => $search_in_grid,
            'search_close_icon_class' => curly_mkdf_get_search_close_icon_class()
        );

        curly_mkdf_get_module_template_part('types/covers-header/templates/covers-header', 'search', '', $parameters);
    }
}