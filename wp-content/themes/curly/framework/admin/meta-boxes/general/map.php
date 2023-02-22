<?php

if (!function_exists('curly_mkdf_map_general_meta')) {
    function curly_mkdf_map_general_meta() {

        $general_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => apply_filters('curly_mkdf_set_scope_for_meta_boxes', array('page', 'post'), 'general_meta'),
                'title' => esc_html__('General', 'curly'),
                'name' => 'general_meta'
            )
        );

        /***************** Slider Layout - begin **********************/

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_page_slider_meta',
                'type' => 'text',
                'label' => esc_html__('Slider Shortcode', 'curly'),
                'description' => esc_html__('Paste your slider shortcode here', 'curly'),
                'parent' => $general_meta_box
            )
        );

        /***************** Slider Layout - begin **********************/

        /***************** Content Layout - begin **********************/

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_page_content_behind_header_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Always put content behind header', 'curly'),
                'description' => esc_html__('Enabling this option will put page content behind page header', 'curly'),
                'parent' => $general_meta_box
            )
        );

        $mkdf_content_padding_group = curly_mkdf_add_admin_group(
            array(
                'name' => 'content_padding_group',
                'title' => esc_html__('Content Style', 'curly'),
                'description' => esc_html__('Define styles for Content area', 'curly'),
                'parent' => $general_meta_box
            )
        );

        $mkdf_content_padding_row = curly_mkdf_add_admin_row(
            array(
                'name' => 'mkdf_content_padding_row',
                'next' => true,
                'parent' => $mkdf_content_padding_group
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_page_content_padding',
                'type' => 'textsimple',
                'label' => esc_html__('Content Padding (e.g. 10px 5px 10px 5px)', 'curly'),
                'parent' => $mkdf_content_padding_row,
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_page_content_padding_mobile',
                'type' => 'textsimple',
                'label' => esc_html__('Content Padding for mobile (e.g. 10px 5px 10px 5px)', 'curly'),
                'parent' => $mkdf_content_padding_row,
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_page_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Page Background Color', 'curly'),
                'description' => esc_html__('Choose background color for page content', 'curly'),
                'parent' => $general_meta_box
            )
        );

        /***************** Content Layout - end **********************/

        /***************** Boxed Layout - begin **********************/

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_boxed_meta',
                'type' => 'select',
                'label' => esc_html__('Boxed Layout', 'curly'),
                'parent' => $general_meta_box,
                'options' => curly_mkdf_get_yes_no_select_array()
            )
        );

        $boxed_container_meta = curly_mkdf_add_admin_container(
            array(
                'parent' => $general_meta_box,
                'name' => 'boxed_container_meta',
                'dependency' => array(
                    'hide' => array(
                        'mkdf_boxed_meta' => array('', 'no')
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_page_background_color_in_box_meta',
                'type' => 'color',
                'label' => esc_html__('Page Background Color', 'curly'),
                'description' => esc_html__('Choose the page background color outside box', 'curly'),
                'parent' => $boxed_container_meta
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_boxed_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'curly'),
                'description' => esc_html__('Choose an image to be displayed in background', 'curly'),
                'parent' => $boxed_container_meta
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_boxed_pattern_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Pattern', 'curly'),
                'description' => esc_html__('Choose an image to be used as background pattern', 'curly'),
                'parent' => $boxed_container_meta
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_boxed_background_image_attachment_meta',
                'type' => 'select',
                'default_value' => 'fixed',
                'label' => esc_html__('Background Image Attachment', 'curly'),
                'description' => esc_html__('Choose background image attachment', 'curly'),
                'parent' => $boxed_container_meta,
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'fixed' => esc_html__('Fixed', 'curly'),
                    'scroll' => esc_html__('Scroll', 'curly')
                )
            )
        );

        /***************** Boxed Layout - end **********************/

        /***************** Passepartout Layout - begin **********************/

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_paspartu_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Passepartout', 'curly'),
                'description' => esc_html__('Enabling this option will display passepartout around site content', 'curly'),
                'parent' => $general_meta_box,
                'options' => curly_mkdf_get_yes_no_select_array(),
            )
        );

        $paspartu_container_meta = curly_mkdf_add_admin_container(
            array(
                'parent' => $general_meta_box,
                'name' => 'mkdf_paspartu_container_meta',
                'dependency' => array(
                    'hide' => array(
                        'mkdf_paspartu_meta' => array('', 'no')
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_paspartu_color_meta',
                'type' => 'color',
                'label' => esc_html__('Passepartout Color', 'curly'),
                'description' => esc_html__('Choose passepartout color, default value is #ffffff', 'curly'),
                'parent' => $paspartu_container_meta
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_paspartu_width_meta',
                'type' => 'text',
                'label' => esc_html__('Passepartout Size', 'curly'),
                'description' => esc_html__('Enter size amount for passepartout', 'curly'),
                'parent' => $paspartu_container_meta,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px or %'
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_paspartu_responsive_width_meta',
                'type' => 'text',
                'label' => esc_html__('Responsive Passepartout Size', 'curly'),
                'description' => esc_html__('Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'curly'),
                'parent' => $paspartu_container_meta,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px or %'
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'parent' => $paspartu_container_meta,
                'type' => 'select',
                'default_value' => '',
                'name' => 'mkdf_disable_top_paspartu_meta',
                'label' => esc_html__('Disable Top Passepartout', 'curly'),
                'options' => curly_mkdf_get_yes_no_select_array(),
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'parent' => $paspartu_container_meta,
                'type' => 'select',
                'default_value' => '',
                'name' => 'mkdf_enable_fixed_paspartu_meta',
                'label' => esc_html__('Enable Fixed Passepartout', 'curly'),
                'description' => esc_html__('Enabling this option will set fixed passepartout for your screens', 'curly'),
                'options' => curly_mkdf_get_yes_no_select_array(),
            )
        );

        /***************** Passepartout Layout - end **********************/

        /***************** Content Width Layout - begin **********************/

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_initial_content_width_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Initial Width of Content', 'curly'),
                'description' => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'curly'),
                'parent' => $general_meta_box,
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'mkdf-grid-1100' => esc_html__('1100px', 'curly'),
                    'mkdf-grid-1300' => esc_html__('1300px', 'curly'),
                    'mkdf-grid-1200' => esc_html__('1200px', 'curly'),
                    'mkdf-grid-1000' => esc_html__('1000px', 'curly'),
                    'mkdf-grid-800' => esc_html__('800px', 'curly')
                )
            )
        );

        /***************** Content Width Layout - end **********************/

        /***************** Smooth Page Transitions Layout - begin **********************/

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_smooth_page_transitions_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Smooth Page Transitions', 'curly'),
                'description' => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links', 'curly'),
                'parent' => $general_meta_box,
                'options' => curly_mkdf_get_yes_no_select_array()
            )
        );

        $page_transitions_container_meta = curly_mkdf_add_admin_container(
            array(
                'parent' => $general_meta_box,
                'name' => 'page_transitions_container_meta',
                'dependency' => array(
                    'hide' => array(
                        'mkdf_smooth_page_transitions_meta' => array('', 'no')
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_page_transition_preloader_meta',
                'type' => 'select',
                'label' => esc_html__('Enable Preloading Animation', 'curly'),
                'description' => esc_html__('Enabling this option will display an animated preloader while the page content is loading', 'curly'),
                'parent' => $page_transitions_container_meta,
                'options' => curly_mkdf_get_yes_no_select_array()
            )
        );

        $page_transition_preloader_container_meta = curly_mkdf_add_admin_container(
            array(
                'parent' => $page_transitions_container_meta,
                'name' => 'page_transition_preloader_container_meta',
                'dependency' => array(
                    'hide' => array(
                        'mkdf_page_transition_preloader_meta' => array('', 'no')
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_smooth_pt_bgnd_color_meta',
                'type' => 'color',
                'label' => esc_html__('Page Loader Background Color', 'curly'),
                'parent' => $page_transition_preloader_container_meta
            )
        );

        $group_pt_spinner_animation_meta = curly_mkdf_add_admin_group(
            array(
                'name' => 'group_pt_spinner_animation_meta',
                'title' => esc_html__('Loader Style', 'curly'),
                'description' => esc_html__('Define styles for loader spinner animation', 'curly'),
                'parent' => $page_transition_preloader_container_meta
            )
        );

        $row_pt_spinner_animation_meta = curly_mkdf_add_admin_row(
            array(
                'name' => 'row_pt_spinner_animation_meta',
                'parent' => $group_pt_spinner_animation_meta
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'type' => 'selectsimple',
                'name' => 'mkdf_smooth_pt_spinner_type_meta',
                'label' => esc_html__('Spinner Type', 'curly'),
                'parent' => $row_pt_spinner_animation_meta,
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'curly_loader' => esc_html__('Curly Loader', 'curly'),
                    'rotate_circles' => esc_html__('Rotate Circles', 'curly'),
                    'pulse' => esc_html__('Pulse', 'curly'),
                    'double_pulse' => esc_html__('Double Pulse', 'curly'),
                    'cube' => esc_html__('Cube', 'curly'),
                    'rotating_cubes' => esc_html__('Rotating Cubes', 'curly'),
                    'stripes' => esc_html__('Stripes', 'curly'),
                    'wave' => esc_html__('Wave', 'curly'),
                    'two_rotating_circles' => esc_html__('2 Rotating Circles', 'curly'),
                    'five_rotating_circles' => esc_html__('5 Rotating Circles', 'curly'),
                    'atom' => esc_html__('Atom', 'curly'),
                    'clock' => esc_html__('Clock', 'curly'),
                    'mitosis' => esc_html__('Mitosis', 'curly'),
                    'lines' => esc_html__('Lines', 'curly'),
                    'fussion' => esc_html__('Fussion', 'curly'),
                    'wave_circles' => esc_html__('Wave Circles', 'curly'),
                    'pulse_circles' => esc_html__('Pulse Circles', 'curly')
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'image',
                'name' => 'mkdf_smooth_pt_image_meta',
                'default_value' => '',
                'parent' => $row_pt_spinner_animation_meta,
                'dependency' => array(
                    'show' => array(
                        'mkdf_smooth_pt_spinner_type_meta' => 'curly_loader'
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'type' => 'colorsimple',
                'name' => 'mkdf_smooth_pt_spinner_color_meta',
                'label' => esc_html__('Spinner Color', 'curly'),
                'parent' => $row_pt_spinner_animation_meta,
                'dependency' => array(
                    'hide' => array(
                        'mkdf_smooth_pt_spinner_type_meta' => 'curly_loader'
                    )
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_page_transition_fadeout_meta',
                'type' => 'select',
                'label' => esc_html__('Enable Fade Out Animation', 'curly'),
                'description' => esc_html__('Enabling this option will turn on fade out animation when leaving page', 'curly'),
                'options' => curly_mkdf_get_yes_no_select_array(),
                'parent' => $page_transitions_container_meta

            )
        );

        /***************** Smooth Page Transitions Layout - end **********************/

        /***************** Comments Layout - begin **********************/

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_page_comments_meta',
                'type' => 'select',
                'label' => esc_html__('Show Comments', 'curly'),
                'description' => esc_html__('Enabling this option will show comments on your page', 'curly'),
                'parent' => $general_meta_box,
                'options' => curly_mkdf_get_yes_no_select_array()
            )
        );

        /***************** Comments Layout - end **********************/
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_general_meta', 10);
}