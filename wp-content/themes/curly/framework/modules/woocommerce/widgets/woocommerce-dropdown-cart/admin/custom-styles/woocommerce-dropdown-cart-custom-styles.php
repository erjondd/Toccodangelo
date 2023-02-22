<?php

if (!function_exists('curly_mkdf_dropdown_cart_icon_styles')) {
    /**
     * Generates styles for dropdown cart icon
     */
    function curly_mkdf_dropdown_cart_icon_styles() {
        $icon_color = curly_mkdf_options()->getOptionValue('dropdown_cart_icon_color');
        $icon_hover_color = curly_mkdf_options()->getOptionValue('dropdown_cart_hover_color');

        if (!empty($icon_color)) {
            echo curly_mkdf_dynamic_css('.mkdf-shopping-cart-holder .mkdf-header-cart a', array('color' => $icon_color));
        }

        if (!empty($icon_hover_color)) {
            echo curly_mkdf_dynamic_css('.mkdf-shopping-cart-holder .mkdf-header-cart a:hover', array('color' => $icon_hover_color));
        }
    }

    add_action('curly_mkdf_style_dynamic', 'curly_mkdf_dropdown_cart_icon_styles');
}