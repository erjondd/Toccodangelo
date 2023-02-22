<?php

if (!function_exists('curly_mkdf_map_post_video_meta')) {
    function curly_mkdf_map_post_video_meta() {
        $video_post_format_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Video Post Format', 'curly'),
                'name' => 'post_format_video_meta'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_video_type_meta',
                'type' => 'select',
                'label' => esc_html__('Video Type', 'curly'),
                'description' => esc_html__('Choose video type', 'curly'),
                'parent' => $video_post_format_meta_box,
                'default_value' => 'social_networks',
                'options' => array(
                    'social_networks' => esc_html__('Video Service', 'curly'),
                    'self' => esc_html__('Self Hosted', 'curly')
                )
            )
        );

        $mkdf_video_embedded_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'mkdf_video_embedded_container'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_post_video_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video URL', 'curly'),
                'description' => esc_html__('Enter Video URL', 'curly'),
                'parent' => $mkdf_video_embedded_container,
                'dependency' => array(
                    'show' => array(
                        'mkdf_video_type_meta' => 'social_networks'
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_post_video_custom_meta',
                'type' => 'text',
                'label' => esc_html__('Video MP4', 'curly'),
                'description' => esc_html__('Enter video URL for MP4 format', 'curly'),
                'parent' => $mkdf_video_embedded_container,
                'dependency' => array(
                    'show' => array(
                        'mkdf_video_type_meta' => 'self'
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_post_video_image_meta',
                'type' => 'image',
                'label' => esc_html__('Video Image', 'curly'),
                'description' => esc_html__('Enter video image', 'curly'),
                'parent' => $mkdf_video_embedded_container,
                'dependency' => array(
                    'show' => array(
                        'mkdf_video_type_meta' => 'self'
                    )
                )
            )
        );
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_post_video_meta', 22);
}