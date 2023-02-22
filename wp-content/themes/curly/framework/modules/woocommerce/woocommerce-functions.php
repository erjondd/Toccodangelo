<?php
/**
 * Woocommerce helper functions
 */

if (!function_exists('curly_mkdf_woocommerce_meta_box_functions')) {
    function curly_mkdf_woocommerce_meta_box_functions($post_types) {
        $post_types[] = 'product';

        return $post_types;
    }

    add_filter('curly_mkdf_meta_box_post_types_save', 'curly_mkdf_woocommerce_meta_box_functions');
}

if (!function_exists('curly_mkdf_woocommerce_add_social_share_option')) {
    function curly_mkdf_woocommerce_add_social_share_option($container) {
        if (curly_mkdf_is_woocommerce_installed()) {
            curly_mkdf_add_admin_field(
                array(
                    'type' => 'yesno',
                    'name' => 'enable_social_share_on_product',
                    'default_value' => 'no',
                    'label' => esc_html__('Product', 'curly'),
                    'description' => esc_html__('Show Social Share for Product Items', 'curly'),
                    'parent' => $container
                )
            );
        }
    }

    add_action('curly_mkdf_post_types_social_share', 'curly_mkdf_woocommerce_add_social_share_option', 10, 1);
}

if (!function_exists('curly_mkdf_woocommerce_style_dynamics_deps')) {
    function curly_mkdf_woocommerce_style_dynamics_deps($deps) {
        $style_dynamic_deps_array = array();
        if (curly_mkdf_is_woocommerce_installed() && curly_mkdf_load_woo_assets()) {
            $style_dynamic_deps_array[] = 'curly-mkdf-woo';
            if (curly_mkdf_is_responsive_on()) {
                $style_dynamic_deps_array[] = 'curly-mkdf-woo-responsive';
            }
        }

        return array_merge($deps, $style_dynamic_deps_array);
    }

    add_filter('curly_mkdf_style_dynamic_deps', 'curly_mkdf_woocommerce_style_dynamics_deps');
}

if (!function_exists('curly_mkdf_get_woo_shortcode_module_template_part')) {
    /**
     * Loads module template part.
     *
     * @param string $template name of the template to load
     * @param string $module name of the module folder
     * @param string $slug
     * @param array $params array of parameters to pass to template
     * @param array $additional_params array of additional parameters to pass to template
     *
     * @return html
     * @see curly_mkdf_get_template_part()
     */
    function curly_mkdf_get_woo_shortcode_module_template_part($template, $module, $slug = '', $params = array(), $additional_params = array()) {

        //HTML Content from template
        $html = '';
        $template_path = 'framework/modules/woocommerce/shortcodes/' . $module;

        $temp = $template_path . '/' . $template;

        if (is_array($params) && count($params)) {
            extract($params);
        }

        if (is_array($additional_params) && count($additional_params)) {
            extract($additional_params);
        }

        $templates = array();

        if ($temp !== '') {
            if ($slug !== '') {
                $templates[] = "{$temp}-{$slug}.php";
            }

            $templates[] = $temp . '.php';
        }
        $located = curly_mkdf_find_template_path($templates);
        if ($located) {
            ob_start();
            include($located);
            $html = ob_get_clean();
        }

        return $html;
    }
}

if (!function_exists('curly_mkdf_is_woocommerce_page')) {
    /**
     * Function that checks if current page is woocommerce shop, product or product taxonomy
     * @return bool
     *
     * @see is_woocommerce()
     */
    function curly_mkdf_is_woocommerce_page() {
        if (function_exists('is_woocommerce') && is_woocommerce()) {
            return is_woocommerce();
        } elseif (function_exists('is_cart') && is_cart()) {
            return is_cart();
        } elseif (function_exists('is_checkout') && is_checkout()) {
            return is_checkout();
        } elseif (function_exists('is_account_page') && is_account_page()) {
            return is_account_page();
        }
    }
}

if (!function_exists('curly_mkdf_is_woocommerce_shop')) {
    /**
     * Function that checks if current page is shop or product page
     * @return bool
     *
     * @see is_shop()
     */
    function curly_mkdf_is_woocommerce_shop() {
        return function_exists('is_shop') && (is_shop() || is_product());
    }
}

if (!function_exists('curly_mkdf_get_woo_shop_page_id')) {
    /**
     * Function that returns shop page id that is set in WooCommerce settings page
     * @return int id of shop page
     */
    function curly_mkdf_get_woo_shop_page_id() {
        if (curly_mkdf_is_woocommerce_installed()) {
            //get shop page id from options table
            $shop_id = get_option('woocommerce_shop_page_id');
            $page_id = !empty($shop_id) ? $shop_id : '-1';

            return $page_id;
        }
    }
}

if (!function_exists('curly_mkdf_is_product_category')) {
    function curly_mkdf_is_product_category() {
        return function_exists('is_product_category') && is_product_category();
    }
}

if (!function_exists('curly_mkdf_is_product_tag')) {
    function curly_mkdf_is_product_tag() {
        return function_exists('is_product_tag') && is_product_tag();
    }
}

if (!function_exists('curly_mkdf_load_woo_assets')) {
    /**
     * Function that checks whether WooCommerce assets needs to be loaded.
     *
     * @see curly_mkdf_is_woocommerce_page()
     * @see curly_mkdf_has_woocommerce_shortcode()
     * @see curly_mkdf_has_woocommerce_widgets()
     * @return bool
     */
    function curly_mkdf_load_woo_assets() {
        return curly_mkdf_is_woocommerce_installed() && (curly_mkdf_is_woocommerce_page() || curly_mkdf_has_woocommerce_shortcode() || curly_mkdf_has_woocommerce_widgets());
    }
}

if (!function_exists('curly_mkdf_return_woocommerce_global_variable')) {
    function curly_mkdf_return_woocommerce_global_variable() {
        if (curly_mkdf_is_woocommerce_installed()) {
            global $product;

            return $product;
        }
    }
}

if (!function_exists('curly_mkdf_has_woocommerce_shortcode')) {
    /**
     * Function that checks if current page has at least one of WooCommerce shortcodes added
     * @return bool
     */
    function curly_mkdf_has_woocommerce_shortcode() {
        $woocommerce_shortcodes = array(
            'add_to_cart',
            'add_to_cart_url',
            'product_page',
            'product',
            'products',
            'product_categories',
            'product_category',
            'recent_products',
            'featured_products',
            'sale_products',
            'best_selling_products',
            'top_rated_products',
            'product_attribute',
            'related_products',
            'woocommerce_messages',
            'woocommerce_cart',
            'woocommerce_checkout',
            'woocommerce_order_tracking',
            'woocommerce_my_account',
            'woocommerce_edit_address',
            'woocommerce_change_password',
            'woocommerce_view_order',
            'woocommerce_pay',
            'woocommerce_thankyou'
        );

        $woocommerce_shortcodes = apply_filters('curly_mkdf_woocommerce_shortcodes_list', $woocommerce_shortcodes);

        foreach ($woocommerce_shortcodes as $woocommerce_shortcode) {
            $has_shortcode = curly_mkdf_has_shortcode($woocommerce_shortcode);

            if ($has_shortcode) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('curly_mkdf_has_woocommerce_widgets')) {
    /**
     * Function that checks if current page has at least one of WooCommerce shortcodes added
     * @return bool
     */
    function curly_mkdf_has_woocommerce_widgets() {
        $widgets_array = array(
            'mkdf_woocommerce_dropdown_cart',
            'woocommerce_widget_cart',
            'woocommerce_layered_nav',
            'woocommerce_layered_nav_filters',
            'woocommerce_price_filter',
            'woocommerce_product_categories',
            'woocommerce_product_search',
            'woocommerce_product_tag_cloud',
            'woocommerce_products',
            'woocommerce_recent_reviews',
            'woocommerce_recently_viewed_products',
            'woocommerce_top_rated_products'
        );

        $widgets_array = apply_filters('curly_mkdf_woocommerce_widgets_list', $widgets_array);

        foreach ($widgets_array as $widget) {
            $active_widget = is_active_widget(false, false, $widget);

            if ($active_widget) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('curly_mkdf_add_product_to_search_types')) {
    function curly_mkdf_add_product_to_search_types($post_types) {
        $post_types['product'] = esc_html__('Product', 'curly');

        return $post_types;
    }

    add_filter('curly_mkdf_search_post_type_widget_params_post_type', 'curly_mkdf_add_product_to_search_types');
}