<?php

if (!function_exists('curly_mkdf_include_mobile_header_menu')) {
    function curly_mkdf_include_mobile_header_menu($menus) {
        $menus['mobile-navigation'] = esc_html__('Mobile Navigation', 'curly');

        return $menus;
    }

    add_filter('curly_mkdf_register_headers_menu', 'curly_mkdf_include_mobile_header_menu');
}

if (!function_exists('curly_mkdf_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function curly_mkdf_register_mobile_header_areas() {
        if (curly_mkdf_is_responsive_on()) {
            register_sidebar(
                array(
                    'id' => 'mkdf-right-from-mobile-logo',
                    'name' => esc_html__('Mobile Header Widget Area', 'curly'),
                    'description' => esc_html__('Widgets added here will appear on the right hand side from the mobile logo on mobile header', 'curly'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-right-from-mobile-logo">',
                    'after_widget' => '</div>'
                )
            );
        }
    }

    add_action('widgets_init', 'curly_mkdf_register_mobile_header_areas');
}

if (!function_exists('curly_mkdf_mobile_header_class')) {
    function curly_mkdf_mobile_header_class($classes) {
        $classes[] = 'mkdf-default-mobile-header';

        $classes[] = 'mkdf-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'curly_mkdf_mobile_header_class');
}

if (!function_exists('curly_mkdf_get_mobile_header')) {
    /**
     * Loads mobile header HTML only if responsiveness is enabled
     */
    function curly_mkdf_get_mobile_header($slug = '', $module = '') {
        if (curly_mkdf_is_responsive_on()) {
            $mobile_menu_title = curly_mkdf_options()->getOptionValue('mobile_menu_title');
            $has_navigation = has_nav_menu('main-navigation') || has_nav_menu('mobile-navigation') ? true : false;

            $parameters = array(
                'show_navigation_opener' => $has_navigation,
                'mobile_menu_title' => $mobile_menu_title,
                'mobile_icon_class' => curly_mkdf_get_mobile_navigation_icon_class()
            );

            $module = apply_filters('curly_mkdf_mobile_menu_module', 'header/types/mobile-header');
            $slug = apply_filters('curly_mkdf_mobile_menu_slug', '');
            $parameters = apply_filters('curly_mkdf_mobile_menu_parameters', $parameters);

            curly_mkdf_get_module_template_part('templates/mobile-header', $module, $slug, $parameters);
        }
    }

    add_action('curly_mkdf_after_wrapper_inner', 'curly_mkdf_get_mobile_header', 20);
}

if (!function_exists('curly_mkdf_get_mobile_logo')) {
    /**
     * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
     */
    function curly_mkdf_get_mobile_logo() {
        $show_logo_image = curly_mkdf_options()->getOptionValue('hide_logo') === 'yes' ? false : true;

        if ($show_logo_image) {
            $mobile_logo_image = curly_mkdf_get_meta_field_intersect('logo_image_mobile', curly_mkdf_get_page_id());

            //check if mobile logo has been set and use that, else use normal logo
            $logo_image = !empty($mobile_logo_image) ? $mobile_logo_image : curly_mkdf_get_meta_field_intersect('logo_image', curly_mkdf_get_page_id());

            //get logo image dimensions and set style attribute for image link.
            $logo_dimensions = curly_mkdf_get_image_dimensions($logo_image);

            $logo_height = '';
            $logo_styles = '';
            if (is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
                $logo_height = $logo_dimensions['height'];
                $logo_styles = 'height: ' . intval($logo_height / 2) . 'px'; //divided with 2 because of retina screens
            }

            //set parameters for logo
            $parameters = array(
                'logo_image' => $logo_image,
                'logo_dimensions' => $logo_dimensions,
                'logo_height' => $logo_height,
                'logo_styles' => $logo_styles
            );

            curly_mkdf_get_module_template_part('templates/mobile-logo', 'header/types/mobile-header', '', $parameters);
        }
    }
}

if (!function_exists('curly_mkdf_get_mobile_nav')) {
    /**
     * Loads mobile navigation HTML
     */
    function curly_mkdf_get_mobile_nav() {
        curly_mkdf_get_module_template_part('templates/mobile-navigation', 'header/types/mobile-header');
    }
}

if (!function_exists('curly_mkdf_mobile_header_per_page_js_var')) {
    function curly_mkdf_mobile_header_per_page_js_var($perPageVars) {
        $perPageVars['mkdfMobileHeaderHeight'] = curly_mkdf_set_default_mobile_menu_height_for_header_types();

        return $perPageVars;
    }

    add_filter('curly_mkdf_per_page_js_vars', 'curly_mkdf_mobile_header_per_page_js_var');
}

if (!function_exists('curly_mkdf_get_mobile_navigation_icon_class')) {
    /**
     * Loads mobile navigation icon class
     */
    function curly_mkdf_get_mobile_navigation_icon_class() {

        $mobile_icon_icon_source = curly_mkdf_options()->getOptionValue('mobile_icon_icon_source');

        $mobile_icon_class_array = array(
            'mkdf-mobile-menu-opener'
        );

        $mobile_icon_class_array[] = $mobile_icon_icon_source == 'icon_pack' ? 'mkdf-mobile-menu-opener-icon-pack' : 'mkdf-mobile-menu-opener-svg-path';

        return $mobile_icon_class_array;
    }
}

if (!function_exists('curly_mkdf_get_mobile_navigation_icon_html')) {
    /**
     * Loads mobile navigation icon HTML
     */
    function curly_mkdf_get_mobile_navigation_icon_html() {

        $mobile_icon_icon_source = curly_mkdf_options()->getOptionValue('mobile_icon_icon_source');
        $mobile_icon_icon_pack = curly_mkdf_options()->getOptionValue('mobile_icon_icon_pack');
        $mobile_icon_svg_path = curly_mkdf_options()->getOptionValue('mobile_icon_svg_path');

        $mobile_navigation_icon_html = '';

        if (($mobile_icon_icon_source == 'icon_pack') && (isset($mobile_icon_icon_pack))) {
            $mobile_navigation_icon_html .= curly_mkdf_icon_collections()->getMobileMenuIcon($mobile_icon_icon_pack);
        } else if (isset($mobile_icon_svg_path)) {
            $mobile_navigation_icon_html .= $mobile_icon_svg_path;
        }

        return $mobile_navigation_icon_html;
    }
}