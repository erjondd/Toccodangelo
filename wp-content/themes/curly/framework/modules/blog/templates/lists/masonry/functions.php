<?php

if (!function_exists('curly_mkdf_register_blog_masonry_template_file')) {
    /**
     * Function that register blog masonry template
     */
    function curly_mkdf_register_blog_masonry_template_file($templates) {
        $templates['blog-masonry'] = esc_html__('Blog: Masonry', 'curly');

        return $templates;
    }

    add_filter('curly_mkdf_register_blog_templates', 'curly_mkdf_register_blog_masonry_template_file');
}

if (!function_exists('curly_mkdf_set_blog_masonry_type_global_option')) {
    /**
     * Function that set blog list type value for global blog option map
     */
    function curly_mkdf_set_blog_masonry_type_global_option($options) {
        $options['masonry'] = esc_html__('Blog: Masonry', 'curly');

        return $options;
    }

    add_filter('curly_mkdf_blog_list_type_global_option', 'curly_mkdf_set_blog_masonry_type_global_option');
}