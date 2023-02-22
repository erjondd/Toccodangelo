<?php

if (!function_exists('curly_mkdf_map_post_audio_meta')) {
    function curly_mkdf_map_post_audio_meta() {
        $audio_post_format_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Audio Post Format', 'curly'),
                'name' => 'post_format_audio_meta'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_audio_type_meta',
                'type' => 'select',
                'label' => esc_html__('Audio Type', 'curly'),
                'description' => esc_html__('Choose audio type', 'curly'),
                'parent' => $audio_post_format_meta_box,
                'default_value' => 'social_networks',
                'options' => array(
                    'social_networks' => esc_html__('Audio Service', 'curly'),
                    'self' => esc_html__('Self Hosted', 'curly')
                )
            )
        );

        $mkdf_audio_embedded_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $audio_post_format_meta_box,
                'name' => 'mkdf_audio_embedded_container'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_post_audio_link_meta',
                'type' => 'text',
                'label' => esc_html__('Audio URL', 'curly'),
                'description' => esc_html__('Enter audio URL', 'curly'),
                'parent' => $mkdf_audio_embedded_container,
                'dependency' => array(
                    'show' => array(
                        'mkdf_audio_type_meta' => 'social_networks'
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_post_audio_custom_meta',
                'type' => 'text',
                'label' => esc_html__('Audio Link', 'curly'),
                'description' => esc_html__('Enter audio link', 'curly'),
                'parent' => $mkdf_audio_embedded_container,
                'dependency' => array(
                    'show' => array(
                        'mkdf_audio_type_meta' => 'self'
                    )
                )
            )
        );
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_post_audio_meta', 23);
}