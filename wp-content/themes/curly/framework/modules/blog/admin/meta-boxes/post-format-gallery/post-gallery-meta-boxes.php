<?php

if (!function_exists('curly_mkdf_map_post_gallery_meta')) {

    function curly_mkdf_map_post_gallery_meta() {
        $gallery_post_format_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Gallery Post Format', 'curly'),
                'name' => 'post_format_gallery_meta'
            )
        );

        curly_mkdf_add_multiple_images_field(
            array(
                'name' => 'mkdf_post_gallery_images_meta',
                'label' => esc_html__('Gallery Images', 'curly'),
                'description' => esc_html__('Choose your gallery images', 'curly'),
                'parent' => $gallery_post_format_meta_box,
            )
        );
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_post_gallery_meta', 21);
}
