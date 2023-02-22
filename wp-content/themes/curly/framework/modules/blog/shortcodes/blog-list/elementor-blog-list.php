<?php
class CurlyMikadoElementorBlogList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mkdf_blog_list'; 
	}

	public function get_title() {
		return esc_html__( 'Mikado Blog List', 'curly' );
	}

	public function get_icon() {
		return 'curly-elementor-custom-icon curly-elementor-blog-list';
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
				'label'     => esc_html__( 'Number of Posts', 'curly' ),
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
					'5' => esc_html__( 'Five', 'curly')
				),
				'default' => '1'
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
					'title' => esc_html__( 'Title', 'curly')
				),
				'default' => 'title'
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
			'category',
			[
				'label'     => esc_html__( 'Category', 'curly' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'curly' )
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Size', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'full' => esc_html__( 'Original', 'curly'), 
					'curly_mkdf_square' => esc_html__( 'Square', 'curly'), 
					'curly_mkdf_landscape' => esc_html__( 'Landscape', 'curly'), 
					'curly_mkdf_portrait' => esc_html__( 'Portrait', 'curly'), 
					'thumbnail' => esc_html__( 'Thumbnail', 'curly'), 
					'medium' => esc_html__( 'Medium', 'curly'), 
					'large' => esc_html__( 'Large', 'curly')
				),
				'default' => 'full'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'post_info',
			[
				'label' => esc_html__( 'Post Info', 'curly' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
				'default' => 'h4'
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
				'default' => ''
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label'     => esc_html__( 'Text Length', 'curly' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of characters', 'curly' )
			]
		);

		$this->add_control(
			'post_info_image',
			[
				'label'     => esc_html__( 'Enable Post Info Image', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'curly'), 
					'no' => esc_html__( 'No', 'curly')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'post_info_section',
			[
				'label'     => esc_html__( 'Enable Post Info Section', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'curly'), 
					'no' => esc_html__( 'No', 'curly')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'post_info_author',
			[
				'label'     => esc_html__( 'Enable Post Info Author', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'curly'), 
					'no' => esc_html__( 'No', 'curly')
				),
				'default' => 'yes',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_date',
			[
				'label'     => esc_html__( 'Enable Post Info Date', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'curly'), 
					'no' => esc_html__( 'No', 'curly')
				),
				'default' => 'yes',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_category',
			[
				'label'     => esc_html__( 'Enable Post Info Category', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'curly'), 
					'no' => esc_html__( 'No', 'curly')
				),
				'default' => 'yes',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'additional_features',
			[
				'label' => esc_html__( 'Additional Features', 'curly' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'pagination_type',
			[
				'label'     => esc_html__( 'Pagination Type', 'curly' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no-pagination' => esc_html__( 'None', 'curly'), 
					'standard-shortcodes' => esc_html__( 'Standard', 'curly'), 
					'load-more' => esc_html__( 'Load More', 'curly'), 
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'curly')
				),
				'default' => 'no-pagination'
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		$params['type'] = 'standard';

        $queryArray = $this->generateQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $params['query_result'] = $query_result;

        $params['holder_data'] = $this->getHolderData($params);
        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['module'] = 'list';

        $params['max_num_pages'] = $query_result->max_num_pages;
        $params['paged'] = isset($query_result->query['paged']) ? $query_result->query['paged'] : 1;

        $params['this_object'] = $this;

        ob_start();

        curly_mkdf_get_module_template_part('shortcodes/blog-list/holder', 'blog', $params['type'], $params);

        $html = ob_get_contents();

        ob_end_clean();

        echo curly_mkdf_display_content_output($html);
	}

    public function getHolderClasses($params) {
        $holderClasses = array();

        $holderClasses[] = !empty($params['type']) ? 'mkdf-bl-' . $params['type'] : '';
        $holderClasses[] = $this->getColumnNumberClass($params['number_of_columns']);
        $holderClasses[] = !empty($params['space_between_items']) ? 'mkdf-' . $params['space_between_items'] . '-space' : '';
        $holderClasses[] = !empty($params['pagination_type']) ? 'mkdf-bl-pag-' . $params['pagination_type'] : '';

        return implode(' ', $holderClasses);
    }

    public function getColumnNumberClass($params) {
        switch ($params) {
            case 1:
                $classes = 'mkdf-bl-one-column';
                break;
            case 2:
                $classes = 'mkdf-bl-two-columns';
                break;
            case 3:
                $classes = 'mkdf-bl-three-columns';
                break;
            case 4:
                $classes = 'mkdf-bl-four-columns';
                break;
            case 5:
                $classes = 'mkdf-bl-five-columns';
                break;
            default:
                $classes = 'mkdf-bl-three-columns';
                break;
        }

        return $classes;
    }

    public function getHolderData($params) {
        $dataString = '';

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        $query_result = $params['query_result'];

        $params['max_num_pages'] = $query_result->max_num_pages;

        if (!empty($paged)) {
            $params['next-page'] = $paged + 1;
        }

        foreach ($params as $key => $value) {

            if ($key !== 'query_result' && !is_array($value) && isset($value) && $value !== '') {

                $new_key = str_replace('_', '-', $key);

                $dataString .= ' data-' . $new_key . '=' . esc_attr(str_replace(' ', '', $value));
            }
        }

        return $dataString;
    }

    public function generateQueryArray($params) {
        $queryArray = array(
            'post_status' => 'publish',
            'post_type' => 'post',
            'orderby' => $params['orderby'],
            'order' => $params['order'],
            'posts_per_page' => $params['number_of_posts'],
            'post__not_in' => get_option('sticky_posts')
        );

        if (!empty($params['category'])) {
            $queryArray['category_name'] = $params['category'];
        }

        if (!empty($params['next_page'])) {
            $queryArray['paged'] = $params['next_page'];
        } else {
            $query_array['paged'] = 1;
        }

        return $queryArray;
    }

    public function getTitleStyles($params) {
        $styles = array();

        if (!empty($params['title_transform'])) {
            $styles[] = 'text-transform: ' . $params['title_transform'];
        }

        return implode(';', $styles);
    }

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new CurlyMikadoElementorBlogList() );