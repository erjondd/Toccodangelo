<?php

if (!function_exists('curly_mkdf_register_header_standard_type')) {
    /**
     * This function is used to register header type class for header factory file
     */
    function curly_mkdf_register_header_standard_type($header_types) {
        $header_type = array(
            'header-standard' => 'CurlyMikadof\Modules\Header\Types\HeaderStandard'
        );

        $header_types = array_merge($header_types, $header_type);

        return $header_types;
    }
}

if (!function_exists('curly_mkdf_init_register_header_standard_type')) {
    /**
     * This function is used to wait header-function.php file to init header object and then to init hook registration function above
     */
    function curly_mkdf_init_register_header_standard_type() {
        add_filter('curly_mkdf_register_header_type_class', 'curly_mkdf_register_header_standard_type');
    }

    add_action('curly_mkdf_before_header_function_init', 'curly_mkdf_init_register_header_standard_type');
}