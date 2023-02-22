<?php

if (!function_exists('curly_mkdf_register_search_opener_widget')) {
    /**
     * Function that register search opener widget
     */
    function curly_mkdf_register_search_opener_widget($widgets) {
        $widgets[] = 'CurlyMikadofSearchOpener';

        return $widgets;
    }

    add_filter('curly_core_filter_register_widgets', 'curly_mkdf_register_search_opener_widget');
}