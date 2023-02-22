<?php

if (!function_exists('curly_mkdf_map_woocommerce_meta')) {
    function curly_mkdf_map_woocommerce_meta() {

        $woocommerce_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'curly'),
                'name' => 'woo_product_meta'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_product_featured_image_size',
                'type' => 'select',
                'label' => esc_html__('Dimensions for Product List Shortcode', 'curly'),
                'description' => esc_html__('Choose image layout when it appears in Mikado Product List - Masonry layout shortcode', 'curly'),
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'small' => esc_html__('Small', 'curly'),
                    'large-width' => esc_html__('Large Width', 'curly'),
                    'large-height' => esc_html__('Large Height', 'curly'),
                    'large-width-height' => esc_html__('Large Width Height', 'curly')
                ),
                'parent' => $woocommerce_meta_box
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_show_title_area_woo_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'curly'),
                'description' => esc_html__('Disabling this option will turn off page title area', 'curly'),
                'options' => curly_mkdf_get_yes_no_select_array(),
                'parent' => $woocommerce_meta_box
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_show_new_sign_woo_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Show New Sign', 'curly'),
                'description' => esc_html__('Enabling this option will show new sign mark on product', 'curly'),
                'parent' => $woocommerce_meta_box
            )
        );
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_woocommerce_meta', 99);
}