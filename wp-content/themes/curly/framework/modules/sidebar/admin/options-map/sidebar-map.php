<?php

if (!function_exists('curly_mkdf_sidebar_options_map')) {
    function curly_mkdf_sidebar_options_map() {

        curly_mkdf_add_admin_page(
            array(
                'slug' => '_sidebar_page',
                'title' => esc_html__('Sidebar Area', 'curly'),
                'icon' => 'fa fa-indent'
            )
        );

        $sidebar_panel = curly_mkdf_add_admin_panel(
            array(
                'title' => esc_html__('Sidebar Area', 'curly'),
                'name' => 'sidebar',
                'page' => '_sidebar_page'
            )
        );

        curly_mkdf_add_admin_field(array(
            'name' => 'sidebar_layout',
            'type' => 'select',
            'label' => esc_html__('Sidebar Layout', 'curly'),
            'description' => esc_html__('Choose a sidebar layout for pages', 'curly'),
            'parent' => $sidebar_panel,
            'default_value' => 'no-sidebar',
            'options' => curly_mkdf_get_custom_sidebars_options()
        ));

        $curly_custom_sidebars = curly_mkdf_get_custom_sidebars();
        if (count($curly_custom_sidebars) > 0) {
            curly_mkdf_add_admin_field(array(
                'name' => 'custom_sidebar_area',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'curly'),
                'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'curly'),
                'parent' => $sidebar_panel,
                'options' => $curly_custom_sidebars,
                'args' => array(
                    'select2' => true
                )
            ));
        }
    }

    add_action('curly_mkdf_options_map', 'curly_mkdf_sidebar_options_map', 9);
}