<?php

if (!function_exists('curly_mkdf_add_product_list_shortcode')) {
    function curly_mkdf_add_product_list_shortcode($shortcodes_class_name) {
        $shortcodes = array(
            'CurlyCore\CPT\Shortcodes\ProductList\ProductList',
        );

        $shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

        return $shortcodes_class_name;
    }

    if (curly_mkdf_core_plugin_installed()) {
        add_filter('curly_core_filter_add_vc_shortcode', 'curly_mkdf_add_product_list_shortcode');
    }
}

if (!function_exists('curly_mkdf_add_product_list_into_shortcodes_list')) {
    function curly_mkdf_add_product_list_into_shortcodes_list($woocommerce_shortcodes) {
        $woocommerce_shortcodes[] = 'mkdf_product_list';

        return $woocommerce_shortcodes;
    }

    add_filter('curly_mkdf_woocommerce_shortcodes_list', 'curly_mkdf_add_product_list_into_shortcodes_list');
}