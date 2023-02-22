<?php

if (!function_exists('curly_mkdf_include_blog_shortcodes')) {
    function curly_mkdf_include_blog_shortcodes() {
        include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-list/blog-list.php';
    }

    if (curly_mkdf_core_plugin_installed() && curly_mkdf_is_theme_registered()) {
        add_action('curly_core_action_include_shortcodes_file', 'curly_mkdf_include_blog_shortcodes');
    }
}

if (!function_exists('curly_mkdf_add_blog_shortcodes')) {
    function curly_mkdf_add_blog_shortcodes($shortcodes_class_name) {
        $shortcodes = array(
            'CurlyCore\CPT\Shortcodes\BlogList\BlogList',
        );

        $shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

        return $shortcodes_class_name;
    }

    if (curly_mkdf_core_plugin_installed() && curly_mkdf_is_theme_registered()) {
        add_filter('curly_core_filter_add_vc_shortcode', 'curly_mkdf_add_blog_shortcodes');
    }
}

if (!function_exists('curly_mkdf_set_blog_list_icon_class_name_for_vc_shortcodes')) {
    /**
     * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
     */
    function curly_mkdf_set_blog_list_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
        $shortcodes_icon_class_array[] = '.icon-wpb-blog-list';
        $shortcodes_icon_class_array[] = '.icon-wpb-blog-slider';

        return $shortcodes_icon_class_array;
    }

    if (curly_mkdf_core_plugin_installed() && curly_mkdf_is_theme_registered()) {
        add_filter('curly_core_filter_add_vc_shortcodes_custom_icon_class', 'curly_mkdf_set_blog_list_icon_class_name_for_vc_shortcodes');
    }
}

// Load blog elementor widgets
if ( ! function_exists( 'curly_mikado_include_blog_elementor_widgets_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function curly_mikado_include_blog_elementor_widgets_files() {
		if ( curly_mkdf_core_plugin_installed() && curly_mkdf_is_theme_registered()) {
			foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/*/elementor-*.php' ) as $shortcode_load ) {
				include_once $shortcode_load;
			}
		}
	}

	add_action( 'elementor/widgets/widgets_registered', 'curly_mikado_include_blog_elementor_widgets_files' );
}