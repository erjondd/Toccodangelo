<?php

if (!function_exists('curly_mkdf_get_hide_dep_for_full_screen_menu_options')) {
    function curly_mkdf_get_hide_dep_for_full_screen_menu_options() {
        $hide_dep_options = apply_filters('curly_mkdf_full_screen_menu_hide_global_option', $hide_dep_options = array());

        return $hide_dep_options;
    }
}

if (!function_exists('curly_mkdf_fullscreen_menu_options_map')) {
    function curly_mkdf_fullscreen_menu_options_map() {
        $hide_dep_options = curly_mkdf_get_hide_dep_for_full_screen_menu_options();

        $fullscreen_panel = curly_mkdf_add_admin_panel(
            array(
                'title' => esc_html__('Full Screen Menu', 'curly'),
                'name' => 'panel_fullscreen_menu',
                'page' => '_header_page',
                'dependency' => array(
                    'hide' => array(
                        'header_options' => $hide_dep_options
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $fullscreen_panel,
                'type' => 'select',
                'name' => 'fullscreen_menu_animation_style',
                'default_value' => 'fade-push-text-right',
                'label' => esc_html__('Full Screen Menu Overlay Animation', 'curly'),
                'description' => esc_html__('Choose animation type for full screen menu overlay', 'curly'),
                'options' => array(
                    'fade-push-text-right' => esc_html__('Fade Push Text Right', 'curly'),
                    'fade-push-text-top' => esc_html__('Fade Push Text Top', 'curly'),
                    'fade-text-scaledown' => esc_html__('Fade Text Scaledown', 'curly')
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $fullscreen_panel,
                'type' => 'yesno',
                'name' => 'fullscreen_in_grid',
                'default_value' => 'no',
                'label' => esc_html__('Full Screen Menu in Grid', 'curly'),
                'description' => esc_html__('Enabling this option will put full screen menu content in grid', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $fullscreen_panel,
                'type' => 'select',
                'name' => 'fullscreen_alignment',
                'default_value' => '',
                'label' => esc_html__('Full Screen Menu Alignment', 'curly'),
                'description' => esc_html__('Choose alignment for full screen menu content', 'curly'),
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'left' => esc_html__('Left', 'curly'),
                    'center' => esc_html__('Center', 'curly'),
                    'right' => esc_html__('Right', 'curly')
                )
            )
        );

        $background_group = curly_mkdf_add_admin_group(
            array(
                'parent' => $fullscreen_panel,
                'name' => 'background_group',
                'title' => esc_html__('Background', 'curly'),
                'description' => esc_html__('Select a background color and transparency for full screen menu (0 = fully transparent, 1 = opaque)', 'curly')
            )
        );

        $background_group_row = curly_mkdf_add_admin_row(
            array(
                'parent' => $background_group,
                'name' => 'background_group_row'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $background_group_row,
                'type' => 'colorsimple',
                'name' => 'fullscreen_menu_background_color',
                'label' => esc_html__('Background Color', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $background_group_row,
                'type' => 'textsimple',
                'name' => 'fullscreen_menu_background_transparency',
                'label' => esc_html__('Background Transparency', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $fullscreen_panel,
                'type' => 'image',
                'name' => 'fullscreen_menu_background_image',
                'label' => esc_html__('Background Image', 'curly'),
                'description' => esc_html__('Choose a background image for full screen menu background', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $fullscreen_panel,
                'type' => 'image',
                'name' => 'fullscreen_menu_pattern_image',
                'label' => esc_html__('Pattern Background Image', 'curly'),
                'description' => esc_html__('Choose a pattern image for full screen menu background', 'curly')
            )
        );

        //1st level style group
        $first_level_style_group = curly_mkdf_add_admin_group(
            array(
                'parent' => $fullscreen_panel,
                'name' => 'first_level_style_group',
                'title' => esc_html__('1st Level Style', 'curly'),
                'description' => esc_html__('Define styles for 1st level in full screen menu', 'curly')
            )
        );

        $first_level_style_row1 = curly_mkdf_add_admin_row(
            array(
                'parent' => $first_level_style_group,
                'name' => 'first_level_style_row1'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $first_level_style_row1,
                'type' => 'colorsimple',
                'name' => 'fullscreen_menu_color',
                'default_value' => '',
                'label' => esc_html__('Text Color', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $first_level_style_row1,
                'type' => 'colorsimple',
                'name' => 'fullscreen_menu_hover_color',
                'default_value' => '',
                'label' => esc_html__('Hover Text Color', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $first_level_style_row1,
                'type' => 'colorsimple',
                'name' => 'fullscreen_menu_active_color',
                'default_value' => '',
                'label' => esc_html__('Active Text Color', 'curly'),
            )
        );

        $first_level_style_row3 = curly_mkdf_add_admin_row(
            array(
                'parent' => $first_level_style_group,
                'name' => 'first_level_style_row3'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $first_level_style_row3,
                'type' => 'fontsimple',
                'name' => 'fullscreen_menu_google_fonts',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $first_level_style_row3,
                'type' => 'textsimple',
                'name' => 'fullscreen_menu_font_size',
                'default_value' => '',
                'label' => esc_html__('Font Size', 'curly'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $first_level_style_row3,
                'type' => 'textsimple',
                'name' => 'fullscreen_menu_line_height',
                'default_value' => '',
                'label' => esc_html__('Line Height', 'curly'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $first_level_style_row4 = curly_mkdf_add_admin_row(
            array(
                'parent' => $first_level_style_group,
                'name' => 'first_level_style_row4'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $first_level_style_row4,
                'type' => 'selectblanksimple',
                'name' => 'fullscreen_menu_font_style',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'curly'),
                'options' => curly_mkdf_get_font_style_array()
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $first_level_style_row4,
                'type' => 'selectblanksimple',
                'name' => 'fullscreen_menu_font_weight',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'curly'),
                'options' => curly_mkdf_get_font_weight_array()
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $first_level_style_row4,
                'type' => 'textsimple',
                'name' => 'fullscreen_menu_letter_spacing',
                'default_value' => '',
                'label' => esc_html__('Lettert Spacing', 'curly'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $first_level_style_row4,
                'type' => 'selectblanksimple',
                'name' => 'fullscreen_menu_text_transform',
                'default_value' => '',
                'label' => esc_html__('Text Transform', 'curly'),
                'options' => curly_mkdf_get_text_transform_array()
            )
        );

        //2nd level style group
        $second_level_style_group = curly_mkdf_add_admin_group(
            array(
                'parent' => $fullscreen_panel,
                'name' => 'second_level_style_group',
                'title' => esc_html__('2nd Level Style', 'curly'),
                'description' => esc_html__('Define styles for 2nd level in full screen menu', 'curly')
            )
        );

        $second_level_style_row1 = curly_mkdf_add_admin_row(
            array(
                'parent' => $second_level_style_group,
                'name' => 'second_level_style_row1'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $second_level_style_row1,
                'type' => 'colorsimple',
                'name' => 'fullscreen_menu_color_2nd',
                'default_value' => '',
                'label' => esc_html__('Text Color', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $second_level_style_row1,
                'type' => 'colorsimple',
                'name' => 'fullscreen_menu_hover_color_2nd',
                'default_value' => '',
                'label' => esc_html__('Hover/Active Text Color', 'curly'),
            )
        );

        $second_level_style_row2 = curly_mkdf_add_admin_row(
            array(
                'parent' => $second_level_style_group,
                'name' => 'second_level_style_row2'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $second_level_style_row2,
                'type' => 'fontsimple',
                'name' => 'fullscreen_menu_google_fonts_2nd',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $second_level_style_row2,
                'type' => 'textsimple',
                'name' => 'fullscreen_menu_font_size_2nd',
                'default_value' => '',
                'label' => esc_html__('Font Size', 'curly'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $second_level_style_row2,
                'type' => 'textsimple',
                'name' => 'fullscreen_menu_line_height_2nd',
                'default_value' => '',
                'label' => esc_html__('Line Height', 'curly'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $second_level_style_row3 = curly_mkdf_add_admin_row(
            array(
                'parent' => $second_level_style_group,
                'name' => 'second_level_style_row3'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $second_level_style_row3,
                'type' => 'selectblanksimple',
                'name' => 'fullscreen_menu_font_style_2nd',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'curly'),
                'options' => curly_mkdf_get_font_style_array()
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $second_level_style_row3,
                'type' => 'selectblanksimple',
                'name' => 'fullscreen_menu_font_weight_2nd',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'curly'),
                'options' => curly_mkdf_get_font_weight_array()
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $second_level_style_row3,
                'type' => 'textsimple',
                'name' => 'fullscreen_menu_letter_spacing_2nd',
                'default_value' => '',
                'label' => esc_html__('Lettert Spacing', 'curly'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $second_level_style_row3,
                'type' => 'selectblanksimple',
                'name' => 'fullscreen_menu_text_transform_2nd',
                'default_value' => '',
                'label' => esc_html__('Text Transform', 'curly'),
                'options' => curly_mkdf_get_text_transform_array()
            )
        );

        $third_level_style_group = curly_mkdf_add_admin_group(
            array(
                'parent' => $fullscreen_panel,
                'name' => 'third_level_style_group',
                'title' => esc_html__('3rd Level Style', 'curly'),
                'description' => esc_html__('Define styles for 3rd level in full screen menu', 'curly')
            )
        );

        $third_level_style_row1 = curly_mkdf_add_admin_row(
            array(
                'parent' => $third_level_style_group,
                'name' => 'third_level_style_row1'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $third_level_style_row1,
                'type' => 'colorsimple',
                'name' => 'fullscreen_menu_color_3rd',
                'default_value' => '',
                'label' => esc_html__('Text Color', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $third_level_style_row1,
                'type' => 'colorsimple',
                'name' => 'fullscreen_menu_hover_color_3rd',
                'default_value' => '',
                'label' => esc_html__('Hover/Active Text Color', 'curly'),
            )
        );

        $third_level_style_row2 = curly_mkdf_add_admin_row(
            array(
                'parent' => $third_level_style_group,
                'name' => 'second_level_style_row2'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $third_level_style_row2,
                'type' => 'fontsimple',
                'name' => 'fullscreen_menu_google_fonts_3rd',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $third_level_style_row2,
                'type' => 'textsimple',
                'name' => 'fullscreen_menu_font_size_3rd',
                'default_value' => '',
                'label' => esc_html__('Font Size', 'curly'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $third_level_style_row2,
                'type' => 'textsimple',
                'name' => 'fullscreen_menu_line_height_3rd',
                'default_value' => '',
                'label' => esc_html__('Line Height', 'curly'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $third_level_style_row3 = curly_mkdf_add_admin_row(
            array(
                'parent' => $third_level_style_group,
                'name' => 'second_level_style_row3'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $third_level_style_row3,
                'type' => 'selectblanksimple',
                'name' => 'fullscreen_menu_font_style_3rd',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'curly'),
                'options' => curly_mkdf_get_font_style_array()
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $third_level_style_row3,
                'type' => 'selectblanksimple',
                'name' => 'fullscreen_menu_font_weight_3rd',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'curly'),
                'options' => curly_mkdf_get_font_weight_array()
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $third_level_style_row3,
                'type' => 'textsimple',
                'name' => 'fullscreen_menu_letter_spacing_3rd',
                'default_value' => '',
                'label' => esc_html__('Lettert Spacing', 'curly'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $third_level_style_row3,
                'type' => 'selectblanksimple',
                'name' => 'fullscreen_menu_text_transform_3rd',
                'default_value' => '',
                'label' => esc_html__('Text Transform', 'curly'),
                'options' => curly_mkdf_get_text_transform_array()
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $fullscreen_panel,
                'type' => 'select',
                'name' => 'fullscreen_menu_icon_source',
                'default_value' => 'icon_pack',
                'label' => esc_html__('Select Full Screen Menu Icon Source', 'curly'),
                'description' => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'curly'),
                'options' => curly_mkdf_get_icon_sources_array()
            )
        );

        $fullscreen_menu_icon_pack_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $fullscreen_panel,
                'name' => 'fullscreen_menu_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'fullscreen_menu_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $fullscreen_menu_icon_pack_container,
                'type' => 'select',
                'name' => 'fullscreen_menu_icon_pack',
                'default_value' => 'font_awesome',
                'label' => esc_html__('Full Screen Menu Icon Pack', 'curly'),
                'description' => esc_html__('Choose icon pack for full screen menu icon', 'curly'),
                'options' => curly_mkdf_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $fullscreen_menu_icon_svg_path_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $fullscreen_panel,
                'name' => 'fullscreen_menu_icon_svg_path_container',
                'dependency' => array(
                    'show' => array(
                        'fullscreen_menu_icon_source' => 'svg_path'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $fullscreen_menu_icon_svg_path_container,
                'type' => 'textarea',
                'name' => 'fullscreen_menu_icon_svg_path',
                'label' => esc_html__('Full Screen Menu Icon SVG Path', 'curly'),
                'description' => esc_html__('Enter your full screen menu icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $fullscreen_menu_icon_svg_path_container,
                'type' => 'textarea',
                'name' => 'fullscreen_menu_close_icon_svg_path',
                'label' => esc_html__('Full Screen Menu Close Icon SVG Path', 'curly'),
                'description' => esc_html__('Enter your full screen menu close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'curly'),
            )
        );

        $icon_style_group = curly_mkdf_add_admin_group(
            array(
                'parent' => $fullscreen_panel,
                'name' => 'fullscreen_menu_icon_style_group',
                'title' => esc_html__('Full Screen Menu Icon Style', 'curly'),
                'description' => esc_html__('Define styles for full screen menu icon', 'curly')
            )
        );

        $icon_colors_row1 = curly_mkdf_add_admin_row(
            array(
                'parent' => $icon_style_group,
                'name' => 'icon_colors_row1'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $icon_colors_row1,
                'type' => 'colorsimple',
                'name' => 'fullscreen_menu_icon_color',
                'label' => esc_html__('Color', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $icon_colors_row1,
                'type' => 'colorsimple',
                'name' => 'fullscreen_menu_icon_hover_color',
                'label' => esc_html__('Hover Color', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $icon_colors_row1,
                'type' => 'colorsimple',
                'name' => 'fullscreen_menu_icon_mobile_color',
                'label' => esc_html__('Mobile Color', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $icon_colors_row1,
                'type' => 'colorsimple',
                'name' => 'fullscreen_menu_icon_mobile_hover_color',
                'label' => esc_html__('Mobile Hover Color', 'curly'),
            )
        );
    }

    add_action('curly_mkdf_additional_header_menu_area_options_map', 'curly_mkdf_fullscreen_menu_options_map');
}