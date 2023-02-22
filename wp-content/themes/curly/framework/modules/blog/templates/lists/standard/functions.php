<?php

if (!function_exists('curly_mkdf_register_blog_standard_template_file')) {
    /**
     * Function that register blog standard template
     */
    function curly_mkdf_register_blog_standard_template_file($templates) {
        $templates['blog-standard'] = esc_html__('Blog: Standard', 'curly');

        return $templates;
    }

    add_filter('curly_mkdf_register_blog_templates', 'curly_mkdf_register_blog_standard_template_file');
}

if (!function_exists('curly_mkdf_set_blog_standard_type_global_option')) {
    /**
     * Function that set blog list type value for global blog option map
     */
    function curly_mkdf_set_blog_standard_type_global_option($options) {
        $options['standard'] = esc_html__('Blog: Standard', 'curly');

        return $options;
    }

    add_filter('curly_mkdf_blog_list_type_global_option', 'curly_mkdf_set_blog_standard_type_global_option');
}