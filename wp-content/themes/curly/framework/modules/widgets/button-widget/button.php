<?php
if ( class_exists( 'CurlyCoreClassWidget' ) ) {
	
	class CurlyMikadoButtonWidget extends CurlyCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_button_widget',
				esc_html__( 'Curly Button Widget', 'curly' ),
				array( 'description' => esc_html__( 'Add button element to widget areas', 'curly' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'    => 'dropdown',
					'name'    => 'type',
					'title'   => esc_html__( 'Type', 'curly' ),
					'options' => array(
						'solid'   => esc_html__( 'Solid', 'curly' ),
						'outline' => esc_html__( 'Outline', 'curly' ),
						'simple'  => esc_html__( 'Simple', 'curly' )
					)
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'size',
					'title'       => esc_html__( 'Size', 'curly' ),
					'options'     => array(
						'small'  => esc_html__( 'Small', 'curly' ),
						'medium' => esc_html__( 'Medium', 'curly' ),
						'large'  => esc_html__( 'Large', 'curly' ),
						'huge'   => esc_html__( 'Huge', 'curly' )
					),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'curly' )
				),
				array(
					'type'    => 'textfield',
					'name'    => 'text',
					'title'   => esc_html__( 'Text', 'curly' ),
					'default' => esc_html__( 'Button Text', 'curly' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'link',
					'title' => esc_html__( 'Link', 'curly' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'target',
					'title'   => esc_html__( 'Link Target', 'curly' ),
					'options' => curly_mkdf_get_link_target_array()
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__( 'Color', 'curly' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'hover_color',
					'title' => esc_html__( 'Hover Color', 'curly' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'background_color',
					'title'       => esc_html__( 'Background Color', 'curly' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'curly' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_background_color',
					'title'       => esc_html__( 'Hover Background Color', 'curly' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'curly' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'border_color',
					'title'       => esc_html__( 'Border Color', 'curly' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'curly' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_border_color',
					'title'       => esc_html__( 'Hover Border Color', 'curly' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'curly' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'margin',
					'title'       => esc_html__( 'Margin', 'curly' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'curly' )
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$params = '';
			
			if ( ! is_array( $instance ) ) {
				$instance = array();
			}
			
			// Filter out all empty params
			$instance = array_filter( $instance, function ( $array_value ) {
				return trim( $array_value ) != '';
			} );
			
			// Default values
			if ( ! isset( $instance['text'] ) ) {
				$instance['text'] = 'Button Text';
			}
			
			// Generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
			
			echo '<div class="widget mkdf-button-widget">';
			echo do_shortcode( "[mkdf_button $params]" ); // XSS OK
			echo '</div>';
		}
	}
}