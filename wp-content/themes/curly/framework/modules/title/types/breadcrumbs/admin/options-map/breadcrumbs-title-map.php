<?php

if (!function_exists('curly_mkdf_breadcrumbs_title_type_options_map')) {
    function curly_mkdf_breadcrumbs_title_type_options_map($panel_typography) {

        curly_mkdf_add_admin_section_title(
            array(
                'name' => 'type_section_breadcrumbs',
                'title' => esc_html__('Breadcrumbs', 'curly'),
                'parent' => $panel_typography
            )
        );

        $group_page_breadcrumbs_styles = curly_mkdf_add_admin_group(
            array(
                'name' => 'group_page_breadcrumbs_styles',
                'title' => esc_html__('Breadcrumbs', 'curly'),
                'description' => esc_html__('Define styles for page breadcrumbs', 'curly'),
                'parent' => $panel_typography
            )
        );

        $row_page_breadcrumbs_styles_1 = curly_mkdf_add_admin_row(
            array(
                'name' => 'row_page_breadcrumbs_styles_1',
                'parent' => $group_page_breadcrumbs_styles
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'colorsimple',
                'name' => 'page_breadcrumb_color',
                'label' => esc_html__('Text Color', 'curly'),
                'parent' => $row_page_breadcrumbs_styles_1
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'textsimple',
                'name' => 'page_breadcrumb_font_size',
                'default_value' => '',
                'label' => esc_html__('Font Size', 'curly'),
                'parent' => $row_page_breadcrumbs_styles_1,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'textsimple',
                'name' => 'page_breadcrumb_line_height',
                'default_value' => '',
                'label' => esc_html__('Line Height', 'curly'),
                'parent' => $row_page_breadcrumbs_styles_1,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'selectblanksimple',
                'name' => 'page_breadcrumb_text_transform',
                'default_value' => '',
                'label' => esc_html__('Text Transform', 'curly'),
                'options' => curly_mkdf_get_text_transform_array(),
                'parent' => $row_page_breadcrumbs_styles_1
            )
        );

        $row_page_breadcrumbs_styles_2 = curly_mkdf_add_admin_row(
            array(
                'name' => 'row_page_breadcrumbs_styles_2',
                'parent' => $group_page_breadcrumbs_styles,
                'next' => true
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'fontsimple',
                'name' => 'page_breadcrumb_google_fonts',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'curly'),
                'parent' => $row_page_breadcrumbs_styles_2
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'selectblanksimple',
                'name' => 'page_breadcrumb_font_style',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'curly'),
                'options' => curly_mkdf_get_font_style_array(),
                'parent' => $row_page_breadcrumbs_styles_2
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'selectblanksimple',
                'name' => 'page_breadcrumb_font_weight',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'curly'),
                'options' => curly_mkdf_get_font_weight_array(),
                'parent' => $row_page_breadcrumbs_styles_2
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'textsimple',
                'name' => 'page_breadcrumb_letter_spacing',
                'default_value' => '',
                'label' => esc_html__('Letter Spacing', 'curly'),
                'parent' => $row_page_breadcrumbs_styles_2,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $row_page_breadcrumbs_styles_3 = curly_mkdf_add_admin_row(
            array(
                'name' => 'row_page_breadcrumbs_styles_3',
                'parent' => $group_page_breadcrumbs_styles,
                'next' => true
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'colorsimple',
                'name' => 'page_breadcrumb_hovercolor',
                'label' => esc_html__('Hover/Active Text Color', 'curly'),
                'parent' => $row_page_breadcrumbs_styles_3
            )
        );
    }

    add_action('curly_mkdf_additional_title_typography_options_map', 'curly_mkdf_breadcrumbs_title_type_options_map');
}