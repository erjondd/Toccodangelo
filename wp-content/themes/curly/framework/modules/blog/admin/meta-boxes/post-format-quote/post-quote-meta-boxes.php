<?php

if (!function_exists('curly_mkdf_map_post_quote_meta')) {
    function curly_mkdf_map_post_quote_meta() {
        $quote_post_format_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Quote Post Format', 'curly'),
                'name' => 'post_format_quote_meta'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_post_quote_text_meta',
                'type' => 'text',
                'label' => esc_html__('Quote Text', 'curly'),
                'description' => esc_html__('Enter Quote text', 'curly'),
                'parent' => $quote_post_format_meta_box
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_post_quote_author_meta',
                'type' => 'text',
                'label' => esc_html__('Quote Author', 'curly'),
                'description' => esc_html__('Enter Quote author', 'curly'),
                'parent' => $quote_post_format_meta_box
            )
        );
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_post_quote_meta', 25);
}