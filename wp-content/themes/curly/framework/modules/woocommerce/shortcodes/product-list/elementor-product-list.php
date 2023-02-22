<?php
class CurlyMikadoElementorProductList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mkdf_product_list'; 
	}

	public function get_title() {
		return esc_html__( 'Mikado Product List', 'curly' );
	}

	public function get_icon() {
		return 'curly-elementor-custom-icon curly-elementor-product-list';
	}

	public function get_categories() {
		return [ 'mikado' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'curly' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'number_of_posts',
			[
				'label'     => esc_html__( 'Number of Products', 'curly' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'number_of_columns',
			[
				'label'     => esc_html__( 'Number of Columns', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'1' => esc_html__( 'One', 'curly'), 
					'2' => esc_html__( 'Two', 'curly'), 
					'3' => esc_html__( 'Three', 'curly'), 
					'4' => esc_html__( 'Four', 'curly'), 
					'5' => esc_html__( 'Five', 'curly'), 
					'6' => esc_html__( 'Six', 'curly')
				),
				'default' => '4'
			]
		);

		$this->add_control(
			'space_between_items',
			[
				'label'     => esc_html__( 'Space Between Items', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'large' => esc_html__( 'Large', 'curly'), 
					'medium' => esc_html__( 'Medium', 'curly'), 
					'normal' => esc_html__( 'Normal', 'curly'), 
					'small' => esc_html__( 'Small', 'curly'), 
					'tiny' => esc_html__( 'Tiny', 'curly'), 
					'no' => esc_html__( 'No', 'curly')
				),
				'default' => 'normal'
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'date' => esc_html__( 'Date', 'curly'), 
					'ID' => esc_html__( 'ID', 'curly'), 
					'menu_order' => esc_html__( 'Menu Order', 'curly'), 
					'name' => esc_html__( 'Post Name', 'curly'), 
					'rand' => esc_html__( 'Random', 'curly'), 
					'title' => esc_html__( 'Title', 'curly'), 
					'on-sale' => esc_html__( 'On Sale', 'curly')
				),
				'default' => 'date'
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Order', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'ASC' => esc_html__( 'ASC', 'curly'), 
					'DESC' => esc_html__( 'DESC', 'curly')
				),
				'default' => 'ASC'
			]
		);

		$this->add_control(
			'taxonomy_to_display',
			[
				'label'     => esc_html__( 'Choose Sorting Taxonomy', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'curly' ),
				'options' => array(
					'category' => esc_html__( 'Category', 'curly'), 
					'tag' => esc_html__( 'Tag', 'curly'), 
					'id' => esc_html__( 'Id', 'curly')
				),
				'default' => 'category'
			]
		);

		$this->add_control(
			'taxonomy_values',
			[
				'label'     => esc_html__( 'Enter Taxonomy Values', 'curly' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Separate values (category slugs, tags, or post IDs) with a comma', 'curly' )
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Proportions', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'full' => esc_html__( 'Original', 'curly'), 
					'square' => esc_html__( 'Square', 'curly'), 
					'landscape' => esc_html__( 'Landscape', 'curly'), 
					'portrait' => esc_html__( 'Portrait', 'curly'), 
					'medium' => esc_html__( 'Medium', 'curly'), 
					'large' => esc_html__( 'Large', 'curly'), 
					'woocommerce_single' => esc_html__( 'Shop Single', 'curly'), 
					'woocommerce_thumbnail' => esc_html__( 'Shop Thumbnail', 'curly')
				),
				'default' => 'woocommerce_thumbnail'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'product_info',
			[
				'label' => esc_html__( 'Product Info', 'curly' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'display_title',
			[
				'label'     => esc_html__( 'Display Title', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'curly'), 
					'no' => esc_html__( 'No', 'curly')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'display_category',
			[
				'label'     => esc_html__( 'Display Category', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'curly'), 
					'no' => esc_html__( 'No', 'curly')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'display_excerpt',
			[
				'label'     => esc_html__( 'Display Excerpt', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'curly'), 
					'yes' => esc_html__( 'Yes', 'curly')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'display_rating',
			[
				'label'     => esc_html__( 'Display Rating', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'curly'), 
					'yes' => esc_html__( 'Yes', 'curly')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'display_button_price',
			[
				'label'     => esc_html__( 'Display Price and Button', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'curly'), 
					'no' => esc_html__( 'No', 'curly')
				),
				'default' => 'yes'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'product_info_style',
			[
				'label' => esc_html__( 'Product Info Style', 'curly' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'product_info_skin',
			[
				'label'     => esc_html__( 'Product Info Skin', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'light' => esc_html__( 'Light', 'curly'), 
					'dark' => esc_html__( 'Dark', 'curly')
				),
				'default' => 'dark'
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'curly'), 
					'h1' => esc_html__( 'h1', 'curly'), 
					'h2' => esc_html__( 'h2', 'curly'), 
					'h3' => esc_html__( 'h3', 'curly'), 
					'h4' => esc_html__( 'h4', 'curly'), 
					'h5' => esc_html__( 'h5', 'curly'), 
					'h6' => esc_html__( 'h6', 'curly'), 
					'var' => esc_html__( 'Theme Defined Heading', 'curly')
				),
				'default' => 'h4',
				'condition' => [
					'display_title' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'title_transform',
			[
				'label'     => esc_html__( 'Title Text Transform', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'curly'), 
					'none' => esc_html__( 'None', 'curly'), 
					'capitalize' => esc_html__( 'Capitalize', 'curly'), 
					'uppercase' => esc_html__( 'Uppercase', 'curly'), 
					'lowercase' => esc_html__( 'Lowercase', 'curly'), 
					'initial' => esc_html__( 'Initial', 'curly'), 
					'inherit' => esc_html__( 'Inherit', 'curly')
				),
				'default' => '',
				'condition' => [
					'display_title' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label'     => esc_html__( 'Excerpt Length', 'curly' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of characters', 'curly' ),
				'condition' => [
					'display_excerpt' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'info_bottom_margin',
			[
				'label'     => esc_html__( 'Product Info Bottom Margin (px)', 'curly' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'info_position' => array( 'info-below-image' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

        $params['class_name'] = 'pli';
        $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : 'h4';

        $additional_params = array();
        $additional_params['holder_classes'] = $this->getHolderClasses($params);

        $queryArray = $this->generateProductQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $additional_params['query_result'] = $query_result;

        $params['this_object'] = $this;

		echo curly_mkdf_get_woo_shortcode_module_template_part('templates/product-list', 'product-list', '', $params, $additional_params);

	}

    private function getHolderClasses($params) {
        $holderClasses = array();
        $holderClasses[] = !empty($params['space_between_items']) ? 'mkdf-' . $params['space_between_items'] . '-space' : '';
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
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new CurlyMikadoElementorProductList() );