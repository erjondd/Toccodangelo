<?php

if (!function_exists('curly_mkdf_footer_top_general_styles')) {
    /**
     * Generates general custom styles for footer top area
     */
    function curly_mkdf_footer_top_general_styles() {
        $item_styles = array();
        $background_color = curly_mkdf_options()->getOptionValue('footer_top_background_color');

        if (!empty($background_color)) {
            $item_styles['background-color'] = $background_color;
        }

        echo curly_mkdf_dynamic_css('.mkdf-page-footer .mkdf-footer-top-holder', $item_styles);
    }

    add_action('curly_mkdf_style_dynamic', 'curly_mkdf_footer_top_general_styles');
}

if (!function_exists('curly_mkdf_footer_bottom_general_styles')) {
    /**
     * Generates general custom styles for footer bottom area
     */
    function curly_mkdf_footer_bottom_general_styles() {
        $item_styles = array();
        $background_color = curly_mkdf_options()->getOptionValue('footer_bottom_background_color');

        if (!empty($background_color)) {
            $item_styles['background-color'] = $background_color;
        }

        echo curly_mkdf_dynamic_css('.mkdf-page-footer .mkdf-footer-bottom-holder', $item_styles);
    }

    add_action('curly_mkdf_style_dynamic', 'curly_mkdf_footer_bottom_general_styles');
}