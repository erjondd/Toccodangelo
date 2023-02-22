<?php

if (!function_exists('curly_mkdf_register_separator_widget')) {
    /**
     * Function that register separator widget
     */
    function curly_mkdf_register_separator_widget($widgets) {
        $widgets[] = 'CurlyMikadofSeparatorWidget';

        return $widgets;
    }

    add_filter('curly_core_filter_register_widgets', 'curly_mkdf_register_separator_widget');
}