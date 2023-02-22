<?php

/*** Post Settings ***/

if (!function_exists('curly_mkdf_map_post_meta')) {
    function curly_mkdf_map_post_meta() {

        $post_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Post', 'curly'),
                'name' => 'post-meta'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_blog_single_sidebar_layout_meta',
                'type' => 'select',
                'label' => esc_html__('Sidebar Layout', 'curly'),
                'description' => esc_html__('Choose a sidebar layout for Blog single page', 'curly'),
                'default_value' => '',
                'parent' => $post_meta_box,
                'options' => curly_mkdf_get_custom_sidebars_options(true)
            )
        );

        $curly_custom_sidebars = curly_mkdf_get_custom_sidebars();
        if (count($curly_custom_sidebars) > 0) {
            curly_mkdf_create_meta_box_field(array(
                'name' => 'mkdf_blog_single_custom_sidebar_area_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'curly'),
                'description' => esc_html__('Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'curly'),
                'parent' => $post_meta_box,
                'options' => curly_mkdf_get_custom_sidebars(),
                'args' => array(
                    'select2' => true
                )
            ));
        }

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_blog_list_featured_image_meta',
                'type' => 'image',
                'label' => esc_html__('Blog List Image', 'curly'),
                'description' => esc_html__('Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'curly'),
                'parent' => $post_meta_box
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_blog_masonry_gallery_fixed_dimensions_meta',
                'type' => 'select',
                'label' => esc_html__('Dimensions for Fixed Proportion', 'curly'),
                'description' => esc_html__('Choose image layout when it appears in Masonry lists in fixed proportion', 'curly'),
                'default_value' => 'small',
                'parent' => $post_meta_box,
                'options' => array(
                    'small' => esc_html__('Small', 'curly'),
                    'large-width' => esc_html__('Large Width', 'curly'),
                    'large-height' => esc_html__('Large Height', 'curly'),
                    'large-width-height' => esc_html__('Large Width/Height', 'curly')
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_blog_masonry_gallery_original_dimensions_meta',
                'type' => 'select',
                'label' => esc_html__('Dimensions for Original Proportion', 'curly'),
                'description' => esc_html__('Choose image layout when it appears in Masonry lists in original proportion', 'curly'),
                'default_value' => 'default',
                'parent' => $post_meta_box,
                'options' => array(
                    'default' => esc_html__('Default', 'curly'),
                    'large-width' => esc_html__('Large Width', 'curly')
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_show_title_area_blog_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'curly'),
                'description' => esc_html__('Enabling this option will show title area on your single post page', 'curly'),
                'parent' => $post_meta_box,
                'options' => curly_mkdf_get_yes_no_select_array()
            )
        );

        do_action('curly_mkdf_blog_post_meta', $post_meta_box);
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_post_meta', 20);
}
