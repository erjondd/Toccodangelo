<?php

if (!function_exists('curly_mkdf_disable_wpml_css')) {
    function curly_mkdf_disable_wpml_css() {
        define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
    }

    add_action('after_setup_theme', 'curly_mkdf_disable_wpml_css');
}