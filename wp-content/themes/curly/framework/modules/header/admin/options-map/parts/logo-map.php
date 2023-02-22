<?php

if (!function_exists('curly_mkdf_logo_options_map')) {
    function curly_mkdf_logo_options_map() {

        curly_mkdf_add_admin_page(
            array(
                'slug' => '_logo_page',
                'title' => esc_html__('Logo', 'curly'),
                'icon' => 'fa fa-coffee'
            )
        );

        $panel_logo = curly_mkdf_add_admin_panel(
            array(
                'page' => '_logo_page',
                'name' => 'panel_logo',
                'title' => esc_html__('Logo', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $panel_logo,
                'type' => 'yesno',
                'name' => 'hide_logo',
                'default_value' => 'no',
                'label' => esc_html__('Hide Logo', 'curly'),
                'description' => esc_html__('Enabling this option will hide logo image', 'curly')
            )
        );

        $hide_logo_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $panel_logo,
                'name' => 'hide_logo_container',
                'dependency' => array(
                    'hide' => array(
                        'hide_logo' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'name' => 'logo_image',
                'type' => 'image',
                'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
                'label' => esc_html__('Logo Image - Default', 'curly'),
                'parent' => $hide_logo_container
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'name' => 'logo_image_dark',
                'type' => 'image',
                'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
                'label' => esc_html__('Logo Image - Dark', 'curly'),
                'parent' => $hide_logo_container
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'name' => 'logo_image_light',
                'type' => 'image',
                'default_value' => MIKADO_ASSETS_ROOT . "/img/logo_white.png",
                'label' => esc_html__('Logo Image - Light', 'curly'),
                'parent' => $hide_logo_container
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'name' => 'logo_image_sticky',
                'type' => 'image',
                'default_value' => MIKADO_ASSETS_ROOT . "/img/logo_white.png",
                'label' => esc_html__('Logo Image - Sticky', 'curly'),
                'parent' => $hide_logo_container
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'name' => 'logo_image_mobile',
                'type' => 'image',
                'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
                'label' => esc_html__('Logo Image - Mobile', 'curly'),
                'parent' => $hide_logo_container
            )
        );
    }

    add_action('curly_mkdf_options_map', 'curly_mkdf_logo_options_map', 2);
}