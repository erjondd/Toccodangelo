<?php
if (!function_exists('curly_mkdf_register_side_area_sidebar')) {
    /**
     * Register side area sidebar
     */
    function curly_mkdf_register_side_area_sidebar() {
        register_sidebar(
            array(
                'id' => 'sidearea',
                'name' => esc_html__('Side Area', 'curly'),
                'description' => esc_html__('Side Area', 'curly'),
                'before_widget' => '<div id="%1$s" class="widget mkdf-sidearea %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="mkdf-widget-title-holder"><h5 class="mkdf-widget-title">',
                'after_title' => '</h5></div>'
            )
        );
    }

    add_action('widgets_init', 'curly_mkdf_register_side_area_sidebar');
}

if (!function_exists('curly_mkdf_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function curly_mkdf_side_menu_body_class($classes) {

        if (is_active_widget(false, false, 'mkdf_side_area_opener')) {

            if (curly_mkdf_options()->getOptionValue('side_area_type')) {

                $classes[] = 'mkdf-' . curly_mkdf_options()->getOptionValue('side_area_type');

            }

        }

        return $classes;
    }

    add_filter('body_class', 'curly_mkdf_side_menu_body_class');
}

if (!function_exists('curly_mkdf_get_side_area')) {
    /**
     * Loads side area HTML
     */
    function curly_mkdf_get_side_area() {

        if (is_active_widget(false, false, 'mkdf_side_area_opener')) {

            $parameters = array(
                'side_area_close_icon_class' => curly_mkdf_get_side_area_close_icon_class()
            );

            curly_mkdf_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);
        }
    }

    add_action('curly_mkdf_after_body_tag', 'curly_mkdf_get_side_area', 10);
}

if (!function_exists('curly_mkdf_get_side_area_close_class')) {
    /**
     * Loads side area close icon class
     */
    function curly_mkdf_get_side_area_close_icon_class() {

        $side_area_icon_source = curly_mkdf_options()->getOptionValue('side_area_icon_source');

        $side_area_close_icon_class_array = array(
            'mkdf-close-side-menu'
        );

        $side_area_close_icon_class_array[] = $side_area_icon_source == 'icon_pack' ? 'mkdf-close-side-menu-icon-pack' : 'mkdf-close-side-menu-svg-path';

        return $side_area_close_icon_class_array;
    }
}

if (!function_exists('curly_mkdf_get_side_area_close_icon_html')) {
    /**
     * Loads side area close icon HTML
     */
    function curly_mkdf_get_side_area_close_icon_html() {

        $side_area_icon_source = curly_mkdf_options()->getOptionValue('side_area_icon_source');
        $side_area_icon_pack = curly_mkdf_options()->getOptionValue('side_area_icon_pack');
        $side_area_close_icon_svg_path = curly_mkdf_options()->getOptionValue('side_area_close_icon_svg_path');

        $side_area_close_icon_html = '';

        if (($side_area_icon_source == 'icon_pack') && isset($side_area_icon_pack)) {
            $side_area_close_icon_html .= curly_mkdf_icon_collections()->getMenuCloseIcon($side_area_icon_pack);
        } else if (isset($side_area_close_icon_svg_path)) {
            $side_area_close_icon_html .= $side_area_close_icon_svg_path;
        }

        return $side_area_close_icon_html;
    }
}