<?php

if (!function_exists('curly_mkdf_sidearea_options_map')) {
    function curly_mkdf_sidearea_options_map() {

        curly_mkdf_add_admin_page(
            array(
                'slug' => '_side_area_page',
                'title' => esc_html__('Side Area', 'curly'),
                'icon' => 'fa fa-indent'
            )
        );

        $side_area_panel = curly_mkdf_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'curly'),
                'name' => 'side_area',
                'page' => '_side_area_page'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_panel,
                'type' => 'select',
                'name' => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label' => esc_html__('Side Area Type', 'curly'),
                'description' => esc_html__('Choose a type of Side Area', 'curly'),
                'options' => array(
                    'side-menu-slide-from-right' => esc_html__('Slide from Right Over Content', 'curly'),
                    'side-menu-slide-with-content' => esc_html__('Slide from Right With Content', 'curly'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'curly'),
                ),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_panel,
                'type' => 'text',
                'name' => 'side_area_width',
                'default_value' => '',
                'label' => esc_html__('Side Area Width', 'curly'),
                'description' => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'curly'),
                'args' => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $side_area_panel,
                'name' => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_width_container,
                'type' => 'color',
                'name' => 'side_area_content_overlay_color',
                'default_value' => '',
                'label' => esc_html__('Content Overlay Background Color', 'curly'),
                'description' => esc_html__('Choose a background color for a content overlay', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_width_container,
                'type' => 'text',
                'name' => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label' => esc_html__('Content Overlay Background Transparency', 'curly'),
                'description' => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'curly'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_panel,
                'type' => 'select',
                'name' => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label' => esc_html__('Select Side Area Icon Source', 'curly'),
                'description' => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'curly'),
                'options' => curly_mkdf_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $side_area_panel,
                'name' => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_icon_pack_container,
                'type' => 'select',
                'name' => 'side_area_icon_pack',
                'default_value' => 'font_awesome',
                'label' => esc_html__('Side Area Icon Pack', 'curly'),
                'description' => esc_html__('Choose icon pack for Side Area icon', 'curly'),
                'options' => curly_mkdf_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $side_area_panel,
                'name' => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_svg_icons_container,
                'type' => 'textarea',
                'name' => 'side_area_icon_svg_path',
                'label' => esc_html__('Side Area Icon SVG Path', 'curly'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_svg_icons_container,
                'type' => 'textarea',
                'name' => 'side_area_close_icon_svg_path',
                'label' => esc_html__('Side Area Close Icon SVG Path', 'curly'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'curly'),
            )
        );

        $side_area_icon_style_group = curly_mkdf_add_admin_group(
            array(
                'parent' => $side_area_panel,
                'name' => 'side_area_icon_style_group',
                'title' => esc_html__('Side Area Icon Style', 'curly'),
                'description' => esc_html__('Define styles for Side Area icon', 'curly')
            )
        );

        $side_area_icon_style_row1 = curly_mkdf_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name' => 'side_area_icon_style_row1'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type' => 'colorsimple',
                'name' => 'side_area_icon_color',
                'label' => esc_html__('Color', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type' => 'colorsimple',
                'name' => 'side_area_icon_hover_color',
                'label' => esc_html__('Hover Color', 'curly')
            )
        );

        $side_area_icon_style_row2 = curly_mkdf_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name' => 'side_area_icon_style_row2',
                'next' => true
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type' => 'colorsimple',
                'name' => 'side_area_close_icon_color',
                'label' => esc_html__('Close Icon Color', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type' => 'colorsimple',
                'name' => 'side_area_close_icon_hover_color',
                'label' => esc_html__('Close Icon Hover Color', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_panel,
                'type' => 'color',
                'name' => 'side_area_background_color',
                'label' => esc_html__('Background Color', 'curly'),
                'description' => esc_html__('Choose a background color for Side Area', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_panel,
                'type' => 'text',
                'name' => 'side_area_padding',
                'label' => esc_html__('Padding', 'curly'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'curly'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $side_area_panel,
                'type' => 'select',
                'name' => 'side_area_aligment',
                'default_value' => '',
                'label' => esc_html__('Text Alignment', 'curly'),
                'description' => esc_html__('Choose text alignment for side area', 'curly'),
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'left' => esc_html__('Left', 'curly'),
                    'center' => esc_html__('Center', 'curly'),
                    'right' => esc_html__('Right', 'curly')
                )
            )
        );
    }

    add_action('curly_mkdf_options_map', 'curly_mkdf_sidearea_options_map', 15);
}