<?php

if (!function_exists('curly_mkdf_get_title_types_meta_boxes')) {
    function curly_mkdf_get_title_types_meta_boxes() {
        $title_type_options = apply_filters('curly_mkdf_title_type_meta_boxes', $title_type_options = array('' => esc_html__('Default', 'curly')));

        return $title_type_options;
    }
}

foreach (glob(MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php') as $meta_box_load) {
    include_once $meta_box_load;
}

if (!function_exists('curly_mkdf_map_title_meta')) {
    function curly_mkdf_map_title_meta() {
        $title_type_meta_boxes = curly_mkdf_get_title_types_meta_boxes();

        $title_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => apply_filters('curly_mkdf_set_scope_for_meta_boxes', array('page', 'post'), 'title_meta'),
                'title' => esc_html__('Title', 'curly'),
                'name' => 'title_meta'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_show_title_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'curly'),
                'description' => esc_html__('Disabling this option will turn off page title area', 'curly'),
                'parent' => $title_meta_box,
                'options' => curly_mkdf_get_yes_no_select_array()
            )
        );

        $show_title_area_meta_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $title_meta_box,
                'name' => 'mkdf_show_title_area_meta_container',
                'dependency' => array(
                    'hide' => array(
                        'mkdf_show_title_area_meta' => 'no'
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area Type', 'curly'),
                'description' => esc_html__('Choose title type', 'curly'),
                'parent' => $show_title_area_meta_container,
                'options' => $title_type_meta_boxes
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_title_area_in_grid_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area In Grid', 'curly'),
                'description' => esc_html__('Set title area content to be in grid', 'curly'),
                'options' => curly_mkdf_get_yes_no_select_array(),
                'parent' => $show_title_area_meta_container
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_title_area_height_meta',
                'type' => 'text',
                'label' => esc_html__('Height', 'curly'),
                'description' => esc_html__('Set a height for Title Area', 'curly'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_title_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'curly'),
                'description' => esc_html__('Choose a background color for title area', 'curly'),
                'parent' => $show_title_area_meta_container
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_title_area_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'curly'),
                'description' => esc_html__('Choose an Image for title area', 'curly'),
                'parent' => $show_title_area_meta_container
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_title_area_background_image_behavior_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Image Behavior', 'curly'),
                'description' => esc_html__('Choose title area background image behavior', 'curly'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'hide' => esc_html__('Hide Image', 'curly'),
                    'responsive' => esc_html__('Enable Responsive Image', 'curly'),
                    'responsive-disabled' => esc_html__('Disable Responsive Image', 'curly'),
                    'parallax' => esc_html__('Enable Parallax Image', 'curly'),
                    'parallax-zoom-out' => esc_html__('Enable Parallax With Zoom Out Image', 'curly'),
                    'parallax-disabled' => esc_html__('Disable Parallax Image', 'curly')
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_title_area_vertical_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Vertical Alignment', 'curly'),
                'description' => esc_html__('Specify title area content vertical alignment', 'curly'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'header-bottom' => esc_html__('From Bottom of Header', 'curly'),
                    'window-top' => esc_html__('From Window Top', 'curly')
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_title_area_title_tag_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Tag', 'curly'),
                'options' => curly_mkdf_get_title_tag(true),
                'parent' => $show_title_area_meta_container
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_title_text_color_meta',
                'type' => 'color',
                'label' => esc_html__('Title Color', 'curly'),
                'description' => esc_html__('Choose a color for title text', 'curly'),
                'parent' => $show_title_area_meta_container
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_title_area_subtitle_meta',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Subtitle Text', 'curly'),
                'description' => esc_html__('Enter your subtitle text', 'curly'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    'col_width' => 6
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_title_area_subtitle_tag_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Subtitle Tag', 'curly'),
                'options' => curly_mkdf_get_title_tag(true, array('p' => 'p')),
                'parent' => $show_title_area_meta_container
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_subtitle_color_meta',
                'type' => 'color',
                'label' => esc_html__('Subtitle Color', 'curly'),
                'description' => esc_html__('Choose a color for subtitle text', 'curly'),
                'parent' => $show_title_area_meta_container
            )
        );

        /***************** Additional Title Area Layout - start *****************/

        do_action('curly_mkdf_additional_title_area_meta_boxes', $show_title_area_meta_container);

        /***************** Additional Title Area Layout - end *****************/

    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_title_meta', 60);
}