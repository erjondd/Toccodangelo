<?php

if (!function_exists('curly_mkdf_woocommerce_options_map')) {

    /**
     * Add Woocommerce options page
     */
    function curly_mkdf_woocommerce_options_map() {

        curly_mkdf_add_admin_page(
            array(
                'slug' => '_woocommerce_page',
                'title' => esc_html__('Woocommerce', 'curly'),
                'icon' => 'fa fa-shopping-cart'
            )
        );

        /**
         * Product List Settings
         */
        $panel_product_list = curly_mkdf_add_admin_panel(
            array(
                'page' => '_woocommerce_page',
                'name' => 'panel_product_list',
                'title' => esc_html__('Product List', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'mkdf_woo_product_list_columns',
                'label' => esc_html__('Product List Columns', 'curly'),
                'default_value' => 'mkdf-woocommerce-columns-4',
                'description' => esc_html__('Choose number of columns for main shop page', 'curly'),
                'options' => array(
                    'mkdf-woocommerce-columns-3' => esc_html__('3 Columns', 'curly'),
                    'mkdf-woocommerce-columns-4' => esc_html__('4 Columns', 'curly')
                ),
                'parent' => $panel_product_list,
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'mkdf_woo_product_list_columns_space',
                'label' => esc_html__('Space Between Items', 'curly'),
                'description' => esc_html__('Select space between items for product listing and related products on single product', 'curly'),
                'default_value' => 'normal',
                'options' => curly_mkdf_get_space_between_items_array(),
                'parent' => $panel_product_list,
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'mkdf_woo_products_per_page',
                'label' => esc_html__('Number of products per page', 'curly'),
                'description' => esc_html__('Set number of products on shop page', 'curly'),
                'parent' => $panel_product_list,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'mkdf_products_list_title_tag',
                'label' => esc_html__('Products Title Tag', 'curly'),
                'default_value' => 'h4',
                'options' => curly_mkdf_get_title_tag(),
                'parent' => $panel_product_list,
            )
        );

        /**
         * Single Product Settings
         */
        $panel_single_product = curly_mkdf_add_admin_panel(
            array(
                'page' => '_woocommerce_page',
                'name' => 'panel_single_product',
                'title' => esc_html__('Single Product', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'show_title_area_woo',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'curly'),
                'description' => esc_html__('Enabling this option will show title area on single post pages', 'curly'),
                'parent' => $panel_single_product,
                'options' => curly_mkdf_get_yes_no_select_array(),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'mkdf_single_product_title_tag',
                'default_value' => 'h3',
                'label' => esc_html__('Single Product Title Tag', 'curly'),
                'options' => curly_mkdf_get_title_tag(),
                'parent' => $panel_single_product,
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'woo_enable_single_product_zoom_image',
                'default_value' => 'no',
                'label' => esc_html__('Enable Zoom Maginfier', 'curly'),
                'description' => esc_html__('Enabling this option will show magnifier image on featured image hover', 'curly'),
                'parent' => $panel_single_product,
                'options' => curly_mkdf_get_yes_no_select_array(false),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'woo_set_single_images_behavior',
                'default_value' => 'pretty-photo',
                'label' => esc_html__('Set Images Behavior', 'curly'),
                'options' => array(
                    'pretty-photo' => esc_html__('Pretty Photo Lightbox', 'curly'),
                    'photo-swipe' => esc_html__('Photo Swipe Lightbox', 'curly')
                ),
                'parent' => $panel_single_product
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'mkdf_woo_related_products_columns',
                'label' => esc_html__('Related Products Columns', 'curly'),
                'default_value' => 'mkdf-woocommerce-columns-4',
                'description' => esc_html__('Choose number of columns for related products on single product page', 'curly'),
                'options' => array(
                    'mkdf-woocommerce-columns-3' => esc_html__('3 Columns', 'curly'),
                    'mkdf-woocommerce-columns-4' => esc_html__('4 Columns', 'curly')
                ),
                'parent' => $panel_single_product,
            )
        );

        do_action('curly_mkdf_woocommerce_additional_options_map');
    }

    add_action('curly_mkdf_options_map', 'curly_mkdf_woocommerce_options_map', 21);
}