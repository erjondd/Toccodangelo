<?php

if (!function_exists('curly_mkdf_map_post_link_meta')) {
    function curly_mkdf_map_post_link_meta() {
        $link_post_format_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Link Post Format', 'curly'),
                'name' => 'post_format_link_meta'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_post_link_link_meta',
                'type' => 'text',
                'label' => esc_html__('Link', 'curly'),
                'description' => esc_html__('Enter link', 'curly'),
                'parent' => $link_post_format_meta_box
            )
        );
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_post_link_meta', 24);
}