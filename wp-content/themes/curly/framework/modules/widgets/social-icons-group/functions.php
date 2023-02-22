<?php

if (!function_exists('curly_mkdf_register_social_icons_widget')) {
    /**
     * Function that register social icon widget
     */
    function curly_mkdf_register_social_icons_widget($widgets) {
        $widgets[] = 'CurlyMikadofClassIconsGroupWidget';

        return $widgets;
    }

    add_filter('curly_core_filter_register_widgets', 'curly_mkdf_register_social_icons_widget');
}