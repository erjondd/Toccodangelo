<?php

if (!function_exists('curly_mkdf_get_content_bottom_area')) {
    /**
     * Loads content bottom area HTML with all needed parameters
     */
    function curly_mkdf_get_content_bottom_area() {
        $parameters = array();

        //Current page id
        $id = curly_mkdf_get_page_id();

        //is content bottom area enabled for current page?
        $parameters['content_bottom_area'] = curly_mkdf_get_meta_field_intersect('enable_content_bottom_area', $id);

        if ($parameters['content_bottom_area'] === 'yes') {

            //Sidebar for content bottom area
            $parameters['content_bottom_area_sidebar'] = curly_mkdf_get_meta_field_intersect('content_bottom_sidebar_custom_display', $id);
            //Content bottom area in grid
            $parameters['grid_class'] = (curly_mkdf_get_meta_field_intersect('content_bottom_in_grid', $id)) === 'yes' ? 'mkdf-grid' : 'mkdf-full-width';

            $parameters['content_bottom_style'] = array();

            //Content bottom area background color
            $background_color = curly_mkdf_get_meta_field_intersect('content_bottom_background_color', $id);
            if ($background_color !== '') {
                $parameters['content_bottom_style'][] = 'background-color: ' . $background_color . ';';
            }

            if (is_active_sidebar($parameters['content_bottom_area_sidebar'])) {
                curly_mkdf_get_module_template_part('templates/content-bottom-area', 'content-bottom', '', $parameters);
            }
        }
    }

    add_action('curly_mkdf_before_footer_content', 'curly_mkdf_get_content_bottom_area');
}