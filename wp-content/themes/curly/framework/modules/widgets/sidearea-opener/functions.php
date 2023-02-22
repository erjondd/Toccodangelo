<?php

if (!function_exists('curly_mkdf_register_sidearea_opener_widget')) {
    /**
     * Function that register sidearea opener widget
     */
    function curly_mkdf_register_sidearea_opener_widget($widgets) {
        $widgets[] = 'CurlyMikadofSideAreaOpener';

        return $widgets;
    }

    add_filter('curly_core_filter_register_widgets', 'curly_mkdf_register_sidearea_opener_widget');
}