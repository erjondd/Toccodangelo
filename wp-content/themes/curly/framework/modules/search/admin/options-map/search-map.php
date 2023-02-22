<?php

if (!function_exists('curly_mkdf_get_search_types_options')) {
    function curly_mkdf_get_search_types_options() {
        $search_type_options = apply_filters('curly_mkdf_search_type_global_option', $search_type_options = array());

        return $search_type_options;
    }
}

if (!function_exists('curly_mkdf_search_options_map')) {
    function curly_mkdf_search_options_map() {

        curly_mkdf_add_admin_page(
            array(
                'slug' => '_search_page',
                'title' => esc_html__('Search', 'curly'),
                'icon' => 'fa fa-search'
            )
        );

        $search_page_panel = curly_mkdf_add_admin_panel(
            array(
                'title' => esc_html__('Search Page', 'curly'),
                'name' => 'search_template',
                'page' => '_search_page'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'name' => 'search_page_layout',
                'type' => 'select',
                'label' => esc_html__('Layout', 'curly'),
                'default_value' => 'in-grid',
                'description' => esc_html__('Set layout. Default is in grid.', 'curly'),
                'parent' => $search_page_panel,
                'options' => array(
                    'in-grid' => esc_html__('In Grid', 'curly'),
                    'full-width' => esc_html__('Full Width', 'curly')
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'name' => 'search_page_sidebar_layout',
                'type' => 'select',
                'label' => esc_html__('Sidebar Layout', 'curly'),
                'description' => esc_html__("Choose a sidebar layout for search page", 'curly'),
                'default_value' => 'no-sidebar',
                'options' => curly_mkdf_get_custom_sidebars_options(),
                'parent' => $search_page_panel
            )
        );

        $curly_custom_sidebars = curly_mkdf_get_custom_sidebars();
        if (count($curly_custom_sidebars) > 0) {
            curly_mkdf_add_admin_field(
                array(
                    'name' => 'search_custom_sidebar_area',
                    'type' => 'selectblank',
                    'label' => esc_html__('Sidebar to Display', 'curly'),
                    'description' => esc_html__('Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'curly'),
                    'parent' => $search_page_panel,
                    'options' => $curly_custom_sidebars,
                    'args' => array(
                        'select2' => true
                    )
                )
            );
        }

        $search_panel = curly_mkdf_add_admin_panel(
            array(
                'title' => esc_html__('Search', 'curly'),
                'name' => 'search',
                'page' => '_search_page'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $search_panel,
                'type' => 'select',
                'name' => 'search_type',
                'default_value' => 'covers-header',
                'label' => esc_html__('Select Search Type', 'curly'),
                'description' => esc_html__("Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with Vertical Header)", 'curly'),
                'options' => curly_mkdf_get_search_types_options()
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $search_panel,
                'type' => 'select',
                'name' => 'search_icon_source',
                'default_value' => 'icon_pack',
                'label' => esc_html__('Select Search Icon Source', 'curly'),
                'description' => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'curly'),
                'options' => curly_mkdf_get_icon_sources_array()
            )
        );

        $search_icon_pack_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $search_panel,
                'name' => 'search_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'search_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $search_icon_pack_container,
                'type' => 'select',
                'name' => 'search_icon_pack',
                'default_value' => 'font_awesome',
                'label' => esc_html__('Search Icon Pack', 'curly'),
                'description' => esc_html__('Choose icon pack for search icon', 'curly'),
                'options' => curly_mkdf_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $search_svg_path_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $search_panel,
                'name' => 'search_icon_svg_path_container',
                'dependency' => array(
                    'show' => array(
                        'search_icon_source' => 'svg_path'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $search_svg_path_container,
                'type' => 'textarea',
                'name' => 'search_icon_svg_path',
                'label' => esc_html__('Search Icon SVG Path', 'curly'),
                'description' => esc_html__('Enter your search icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $search_svg_path_container,
                'type' => 'textarea',
                'name' => 'search_close_icon_svg_path',
                'label' => esc_html__('Search Close Icon SVG Path', 'curly'),
                'description' => esc_html__('Enter your search close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $search_panel,
                'type' => 'yesno',
                'name' => 'search_in_grid',
                'default_value' => 'yes',
                'label' => esc_html__('Enable Grid Layout', 'curly'),
                'description' => esc_html__('Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'curly'),
            )
        );

        curly_mkdf_add_admin_section_title(
            array(
                'parent' => $search_panel,
                'name' => 'initial_header_icon_title',
                'title' => esc_html__('Initial Search Icon in Header', 'curly')
            )
        );

        $search_icon_pack_icon_styles_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $search_panel,
                'name' => 'search_icon_pack_icon_styles_container',
                'dependency' => array(
                    'show' => array(
                        'search_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $search_icon_pack_icon_styles_container,
                'type' => 'text',
                'name' => 'header_search_icon_size',
                'default_value' => '',
                'label' => esc_html__('Icon Size', 'curly'),
                'description' => esc_html__('Set size for icon', 'curly'),
                'args' => array(
                    'col_width' => 3,
                    'suffix' => 'px'
                )
            )
        );

        $search_icon_color_group = curly_mkdf_add_admin_group(
            array(
                'parent' => $search_panel,
                'title' => esc_html__('Icon Colors', 'curly'),
                'description' => esc_html__('Define color style for icon', 'curly'),
                'name' => 'search_icon_color_group'
            )
        );

        $search_icon_color_row = curly_mkdf_add_admin_row(
            array(
                'parent' => $search_icon_color_group,
                'name' => 'search_icon_color_row'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $search_icon_color_row,
                'type' => 'colorsimple',
                'name' => 'header_search_icon_color',
                'label' => esc_html__('Color', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $search_icon_color_row,
                'type' => 'colorsimple',
                'name' => 'header_search_icon_hover_color',
                'label' => esc_html__('Hover Color', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $search_panel,
                'type' => 'yesno',
                'name' => 'enable_search_icon_text',
                'default_value' => 'no',
                'label' => esc_html__('Enable Search Icon Text', 'curly'),
                'description' => esc_html__("Enable this option to show 'Search' text next to search icon in header", 'curly')
            )
        );

        $enable_search_icon_text_container = curly_mkdf_add_admin_container(
            array(
                'parent' => $search_panel,
                'name' => 'enable_search_icon_text_container',
                'dependency' => array(
                    'show' => array(
                        'enable_search_icon_text' => 'yes'
                    )
                )
            )
        );

        $enable_search_icon_text_group = curly_mkdf_add_admin_group(
            array(
                'parent' => $enable_search_icon_text_container,
                'title' => esc_html__('Search Icon Text', 'curly'),
                'name' => 'enable_search_icon_text_group',
                'description' => esc_html__('Define style for search icon text', 'curly')
            )
        );

        $enable_search_icon_text_row = curly_mkdf_add_admin_row(
            array(
                'parent' => $enable_search_icon_text_group,
                'name' => 'enable_search_icon_text_row'
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $enable_search_icon_text_row,
                'type' => 'colorsimple',
                'name' => 'search_icon_text_color',
                'label' => esc_html__('Text Color', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $enable_search_icon_text_row,
                'type' => 'colorsimple',
                'name' => 'search_icon_text_color_hover',
                'label' => esc_html__('Text Hover Color', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $enable_search_icon_text_row,
                'type' => 'textsimple',
                'name' => 'search_icon_text_font_size',
                'label' => esc_html__('Font Size', 'curly'),
                'default_value' => '',
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $enable_search_icon_text_row,
                'type' => 'textsimple',
                'name' => 'search_icon_text_line_height',
                'label' => esc_html__('Line Height', 'curly'),
                'default_value' => '',
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $enable_search_icon_text_row2 = curly_mkdf_add_admin_row(
            array(
                'parent' => $enable_search_icon_text_group,
                'name' => 'enable_search_icon_text_row2',
                'next' => true
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $enable_search_icon_text_row2,
                'type' => 'selectblanksimple',
                'name' => 'search_icon_text_text_transform',
                'label' => esc_html__('Text Transform', 'curly'),
                'default_value' => '',
                'options' => curly_mkdf_get_text_transform_array()
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $enable_search_icon_text_row2,
                'type' => 'fontsimple',
                'name' => 'search_icon_text_google_fonts',
                'label' => esc_html__('Font Family', 'curly'),
                'default_value' => '-1',
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $enable_search_icon_text_row2,
                'type' => 'selectblanksimple',
                'name' => 'search_icon_text_font_style',
                'label' => esc_html__('Font Style', 'curly'),
                'default_value' => '',
                'options' => curly_mkdf_get_font_style_array(),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $enable_search_icon_text_row2,
                'type' => 'selectblanksimple',
                'name' => 'search_icon_text_font_weight',
                'label' => esc_html__('Font Weight', 'curly'),
                'default_value' => '',
                'options' => curly_mkdf_get_font_weight_array(),
            )
        );

        $enable_search_icon_text_row3 = curly_mkdf_add_admin_row(
            array(
                'parent' => $enable_search_icon_text_group,
                'name' => 'enable_search_icon_text_row3',
                'next' => true
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'parent' => $enable_search_icon_text_row3,
                'type' => 'textsimple',
                'name' => 'search_icon_text_letter_spacing',
                'label' => esc_html__('Letter Spacing', 'curly'),
                'default_value' => '',
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );
    }

    add_action('curly_mkdf_options_map', 'curly_mkdf_search_options_map', 16);
}