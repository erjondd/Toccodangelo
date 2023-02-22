<?php

foreach (glob(MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/custom-styles/*.php') as $options_load) {
    include_once $options_load;
}

if (!function_exists('curly_mkdf_title_area_typography_style')) {
    function curly_mkdf_title_area_typography_style() {

        // title default/small style

        $item_styles = curly_mkdf_get_typography_styles('page_title');

        $item_selector = array(
            '.mkdf-title-holder .mkdf-title-wrapper .mkdf-page-title'
        );

        echo curly_mkdf_dynamic_css($item_selector, $item_styles);

        // subtitle style

        $item_styles = curly_mkdf_get_typography_styles('page_subtitle');

        $item_selector = array(
            '.mkdf-title-holder .mkdf-title-wrapper .mkdf-page-subtitle'
        );

        echo curly_mkdf_dynamic_css($item_selector, $item_styles);
    }

    add_action('curly_mkdf_style_dynamic', 'curly_mkdf_title_area_typography_style');
}