<?php

namespace CurlyCore\CPT\Shortcodes\ProductList;

use CurlyCore\Lib;

class ProductList implements Lib\ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'mkdf_product_list';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(
                array(
                    'name' => esc_html__('Mikado Product List', 'curly'),
                    'base' => $this->base,
                    'icon' => 'icon-wpb-product-list extended-custom-icon',
                    'category' => esc_html__('by CURLY', 'curly'),
                    'allowed_container_element' => 'vc_row',
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'param_name' => 'number_of_posts',
                            'heading' => esc_html__('Number of Products', 'curly')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'number_of_columns',
                            'heading' => esc_html__('Number of Columns', 'curly'),
                            'value' => array(
                                esc_html__('One', 'curly') => '1',
                                esc_html__('Two', 'curly') => '2',
                                esc_html__('Three', 'curly') => '3',
                                esc_html__('Four', 'curly') => '4',
                                esc_html__('Five', 'curly') => '5',
                                esc_html__('Six', 'curly') => '6'
                            ),
                            'std' => '3',
                            'save_always' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'space_between_items',
                            'heading' => esc_html__('Space Between Items', 'curly'),
                            'value' => array_flip(curly_mkdf_get_space_between_items_array()),
                            'save_always' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'orderby',
                            'heading' => esc_html__('Order By', 'curly'),
                            'value' => array_flip(curly_mkdf_get_query_order_by_array(false, array('on-sale' => esc_html__('On Sale', 'curly')))),
                            'save_always' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'order',
                            'heading' => esc_html__('Order', 'curly'),
                            'value' => array_flip(curly_mkdf_get_query_order_array()),
                            'save_always' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'taxonomy_to_display',
                            'heading' => esc_html__('Choose Sorting Taxonomy', 'curly'),
                            'value' => array(
                                esc_html__('Category', 'curly') => 'category',
                                esc_html__('Tag', 'curly') => 'tag',
                                esc_html__('Id', 'curly') => 'id'
                            ),
                            'save_always' => true,
                            'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'curly')
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'taxonomy_values',
                            'heading' => esc_html__('Enter Taxonomy Values', 'curly'),
                            'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'curly')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'image_size',
                            'heading' => esc_html__('Image Proportions', 'curly'),
                            'value' => array(
                                esc_html__('Original', 'curly') => 'full',
                                esc_html__('Square', 'curly') => 'square',
                                esc_html__('Landscape', 'curly') => 'landscape',
                                esc_html__('Portrait', 'curly') => 'portrait',
                                esc_html__('Medium', 'curly') => 'medium',
                                esc_html__('Large', 'curly') => 'large',
                                esc_html__('Shop Single', 'curly') => 'woocommerce_single',
                                esc_html__('Shop Thumbnail', 'curly') => 'woocommerce_thumbnail'
                            ),
                            'save_always' => true,
                            'std' => 'woocommerce_thumbnail',
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'display_title',
                            'heading' => esc_html__('Display Title', 'curly'),
                            'value' => array_flip(curly_mkdf_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'group' => esc_html__('Product Info', 'curly'),
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'product_info_skin',
                            'heading' => esc_html__('Product Info Skin', 'curly'),
                            'value' => array(
                                esc_html__('Light', 'curly') => 'light',
                                esc_html__('Dark', 'curly') => 'dark'
                            ),
                            'std' => 'dark',
                            'save_always' => true,
                            'group' => esc_html__('Product Info Style', 'curly'),
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'title_tag',
                            'heading' => esc_html__('Title Tag', 'curly'),
                            'value' => array_flip(curly_mkdf_get_title_tag(true)),
                            'save_always' => true,
                            'dependency' => array('element' => 'display_title', 'value' => array('yes')),
                            'group' => esc_html__('Product Info Style', 'curly'),
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'title_transform',
                            'heading' => esc_html__('Title Text Transform', 'curly'),
                            'value' => array_flip(curly_mkdf_get_text_transform_array(true)),
                            'save_always' => true,
                            'dependency' => array('element' => 'display_title', 'value' => array('yes')),
                            'group' => esc_html__('Product Info Style', 'curly'),
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'display_category',
                            'heading' => esc_html__('Display Category', 'curly'),
                            'value' => array_flip(curly_mkdf_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'group' => esc_html__('Product Info', 'curly'),
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'display_excerpt',
                            'heading' => esc_html__('Display Excerpt', 'curly'),
                            'value' => array_flip(curly_mkdf_get_yes_no_select_array(false)),
                            'save_always' => true,
                            'group' => esc_html__('Product Info', 'curly'),
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'excerpt_length',
                            'heading' => esc_html__('Excerpt Length', 'curly'),
                            'description' => esc_html__('Number of characters', 'curly'),
                            'dependency' => array('element' => 'display_excerpt', 'value' => array('yes')),
                            'group' => esc_html__('Product Info Style', 'curly')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'display_rating',
                            'heading' => esc_html__('Display Rating', 'curly'),
                            'value' => array_flip(curly_mkdf_get_yes_no_select_array(false)),
                            'save_always' => true,
                            'group' => esc_html__('Product Info', 'curly'),
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'display_button_price',
                            'heading' => esc_html__('Display Price and Button', 'curly'),
                            'value' => array_flip(curly_mkdf_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'group' => esc_html__('Product Info', 'curly'),
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'info_bottom_margin',
                            'heading' => esc_html__('Product Info Bottom Margin (px)', 'curly'),
                            'dependency' => array('element' => 'info_position', 'value' => array('info-below-image')),
                            'group' => esc_html__('Product Info Style', 'curly')
                        )
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'number_of_posts' => '8',
            'number_of_columns' => '4',
            'space_between_items' => 'normal',
            'orderby' => 'date',
            'order' => 'ASC',
            'taxonomy_to_display' => 'category',
            'taxonomy_values' => '',
            'image_size' => 'woocommerce_thumbnail',
            'display_title' => 'yes',
            'product_info_skin' => 'dark',
            'title_tag' => 'h4',
            'title_transform' => '',
            'display_category' => 'no',
            'display_excerpt' => 'no',
            'excerpt_length' => '20',
            'display_rating' => 'yes',
            'display_button_price' => 'yes',
            'info_bottom_margin' => ''
        );
        $params = shortcode_atts($default_atts, $atts);

        $params['class_name'] = 'pli';
        $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];

        $additional_params = array();
        $additional_params['holder_classes'] = $this->getHolderClasses($params, $default_atts);

        $queryArray = $this->generateProductQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $additional_params['query_result'] = $query_result;

        $params['this_object'] = $this;

        $html = curly_mkdf_get_woo_shortcode_module_template_part('templates/product-list', 'product-list', '', $params, $additional_params);

        return $html;
    }

    private function getHolderClasses($params, $default_atts) {
        $holderClasses = array();
        $holderClasses[] = !empty($params['space_between_items']) ? 'mkdf-' . $params['space_between_items'] . '-space' : 'mkdf-' . $default_atts['space_between_items'] . '-space';
        $holderClasses[] = $this->getColumnNumberClass($params);
        $holderClasses[] = !empty($params['product_info_skin']) ? 'mkdf-product-info-' . $params['product_info_skin'] : '';

        return implode(' ', $holderClasses);
    }

    private function getColumnNumberClass($params) {
        $columnsNumber = '';
        $columns = $params['number_of_columns'];

        switch ($columns) {
            case 1:
                $columnsNumber = 'mkdf-one-column';
                break;
            case 2:
                $columnsNumber = 'mkdf-two-columns';
                break;
            case 3:
                $columnsNumber = 'mkdf-three-columns';
                break;
            case 4:
                $columnsNumber = 'mkdf-four-columns';
                break;
            case 5:
                $columnsNumber = 'mkdf-five-columns';
                break;
            case 6:
                $columnsNumber = 'mkdf-six-columns';
                break;
            default:
                $columnsNumber = 'mkdf-four-columns';
                break;
        }

        return $columnsNumber;
    }

    private function generateProductQueryArray($params) {
        $queryArray = array(
            'post_status' => 'publish',
            'post_type' => 'product',
            'ignore_sticky_posts' => 1,
            'posts_per_page' => $params['number_of_posts'],
            'orderby' => $params['orderby'],
            'order' => $params['order']
        );

        if ($params['orderby'] === 'on-sale') {
            $queryArray['no_found_rows'] = 1;
            $queryArray['post__in'] = array_merge(array(0), wc_get_product_ids_on_sale());
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category') {
            $queryArray['product_cat'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag') {
            $queryArray['product_tag'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id') {
            $idArray = $params['taxonomy_values'];
            $ids = explode(',', $idArray);
            $queryArray['post__in'] = $ids;
        }

        return $queryArray;
    }

    public function getItemClasses($params) {
        $itemClasses = array();

        $image_size_meta = get_post_meta(get_the_ID(), 'mkdf_product_featured_image_size', true);

        if (!empty($image_size_meta)) {
            $itemClasses[] = 'mkdf-woo-fixed-masonry mkdf-masonry-size-' . $image_size_meta;
        }

        return implode(' ', $itemClasses);
    }

    public function getTitleStyles($params) {
        $styles = array();

        if (!empty($params['title_transform'])) {
            $styles[] = 'text-transform: ' . $params['title_transform'];
        }

        return implode(';', $styles);
    }

    public function getShaderStyles($params) {
        $styles = array();

        if (!empty($params['shader_background_color'])) {
            $styles[] = 'background-color: ' . $params['shader_background_color'];
        }

        return implode(';', $styles);
    }

    public function getTextWrapperStyles($params) {
        $styles = array();

        if (!empty($params['info_bottom_text_align'])) {
            $styles[] = 'text-align: ' . $params['info_bottom_text_align'];
        }

        if ($params['info_bottom_margin'] !== '') {
            $styles[] = 'margin-bottom: ' . curly_mkdf_filter_px($params['info_bottom_margin']) . 'px';
        }

        return implode(';', $styles);
    }
}