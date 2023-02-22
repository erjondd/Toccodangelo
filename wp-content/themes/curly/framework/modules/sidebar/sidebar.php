<?php

if (!function_exists('curly_mkdf_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function curly_mkdf_register_sidebars() {

        register_sidebar(
            array(
                'id' => 'sidebar',
                'name' => esc_html__('Sidebar', 'curly'),
                'description' => esc_html__('Default Sidebar area. In order to display this area you need to enable it through global theme options or on page meta box options.', 'curly'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="mkdf-widget-title-holder"><h4 class="mkdf-widget-title">',
                'after_title' => '</h4></div>'
            )
        );
    }

    add_action('widgets_init', 'curly_mkdf_register_sidebars', 1);
}

if (!function_exists('curly_mkdf_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates CurlyMikadofSidebar object
     */
    function curly_mkdf_add_support_custom_sidebar() {
        add_theme_support('CurlyMikadofSidebar');

        if (get_theme_support('CurlyMikadofSidebar')) {
            new CurlyMikadofSidebar();
        }
    }

    add_action('after_setup_theme', 'curly_mkdf_add_support_custom_sidebar');
}