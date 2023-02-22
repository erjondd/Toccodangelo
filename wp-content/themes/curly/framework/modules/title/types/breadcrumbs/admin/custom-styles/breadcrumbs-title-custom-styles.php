<?php

if (!function_exists('curly_mkdf_breadcrumbs_title_area_typography_style')) {
    function curly_mkdf_breadcrumbs_title_area_typography_style() {

        $item_styles = curly_mkdf_get_typography_styles('page_breadcrumb');

        $item_selector = array(
            '.mkdf-title-holder .mkdf-title-wrapper .mkdf-breadcrumbs'
        );

        echo curly_mkdf_dynamic_css($item_selector, $item_styles);


        $breadcrumb_hover_color = curly_mkdf_options()->getOptionValue('page_breadcrumb_hovercolor');

        $breadcrumb_hover_styles = array();
        if (!empty($breadcrumb_hover_color)) {
            $breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
        }

        $breadcrumb_hover_selector = array(
            '.mkdf-title-holder .mkdf-title-wrapper .mkdf-breadcrumbs a:hover'
        );

        echo curly_mkdf_dynamic_css($breadcrumb_hover_selector, $breadcrumb_hover_styles);
    }

    add_action('curly_mkdf_style_dynamic', 'curly_mkdf_breadcrumbs_title_area_typography_style');
}