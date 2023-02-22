<?php

if (!function_exists('curly_mkdf_register_woocommerce_dropdown_cart_widget')) {
    /**
     * Function that register dropdown cart widget
     */
    function curly_mkdf_register_woocommerce_dropdown_cart_widget($widgets) {
        $widgets[] = 'CurlyMikadofWoocommerceDropdownCart';

        return $widgets;
    }

    add_filter('curly_core_filter_register_widgets', 'curly_mkdf_register_woocommerce_dropdown_cart_widget');
}

if (!function_exists('curly_mkdf_get_dropdown_cart_icon_class')) {
    /**
     * Returns dropdow cart icon class
     */
    function curly_mkdf_get_dropdown_cart_icon_class() {
        $dropdown_cart_icon_source = curly_mkdf_options()->getOptionValue('dropdown_cart_icon_source');

        $dropdown_cart_icon_class_array = array(
            'mkdf-header-cart'
        );

        $dropdown_cart_icon_class_array[] = $dropdown_cart_icon_source == 'icon_pack' ? 'mkdf-header-cart-icon-pack' : 'mkdf-header-cart-svg-path';

        return $dropdown_cart_icon_class_array;
    }
}

if (!function_exists('curly_mkdf_get_dropdown_cart_icon_html')) {
    /**
     * Returns dropdown cart icon HTML
     */
    function curly_mkdf_get_dropdown_cart_icon_html() {
        $dropdown_cart_icon_source = curly_mkdf_options()->getOptionValue('dropdown_cart_icon_source');
        $dropdown_cart_icon_pack = curly_mkdf_options()->getOptionValue('dropdown_cart_icon_pack');
        $dropdown_cart_icon_svg_path = curly_mkdf_options()->getOptionValue('dropdown_cart_icon_svg_path');

        $dropdown_cart_icon_html = '';

        if (($dropdown_cart_icon_source == 'icon_pack') && (isset($dropdown_cart_icon_pack))) {
            $dropdown_cart_icon_html .= curly_mkdf_icon_collections()->getDropdownCartIcon($dropdown_cart_icon_pack);
        } else if (isset($dropdown_cart_icon_svg_path)) {
            $dropdown_cart_icon_html .= $dropdown_cart_icon_svg_path;
        }

        return $dropdown_cart_icon_html;
    }
}