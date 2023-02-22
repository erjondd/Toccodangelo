<?php
if ( class_exists( 'CurlyCoreClassWidget' ) ) {
	
	class CurlyMikadofSideAreaOpener extends CurlyCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_side_area_opener',
				esc_html__( 'Curly Side Area Opener', 'curly' ),
				array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'curly' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_color',
					'title'       => esc_html__( 'Side Area Opener Color', 'curly' ),
					'description' => esc_html__( 'Define color for side area opener', 'curly' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_hover_color',
					'title'       => esc_html__( 'Side Area Opener Hover Color', 'curly' ),
					'description' => esc_html__( 'Define hover color for side area opener', 'curly' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'widget_margin',
					'title'       => esc_html__( 'Side Area Opener Margin', 'curly' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'curly' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'widget_title',
					'title' => esc_html__( 'Side Area Opener Title', 'curly' )
				)
			);
		}
		
		public function widget( $args, $instance ) {
			
			$side_area_icon_source   = curly_mkdf_options()->getOptionValue( 'side_area_icon_source' );
			$side_area_icon_pack     = curly_mkdf_options()->getOptionValue( 'side_area_icon_pack' );
			$side_area_icon_svg_path = curly_mkdf_options()->getOptionValue( 'side_area_icon_svg_path' );
			
			$side_area_icon_class_array = array(
				'mkdf-side-menu-button-opener',
				'mkdf-icon-has-hover'
			);
			
			$side_area_icon_class_array[] = $side_area_icon_source == 'icon_pack' ? 'mkdf-side-menu-button-opener-icon-pack' : 'mkdf-side-menu-button-opener-svg-path';
			
			$holder_styles = array();
			
			if ( ! empty( $instance['icon_color'] ) ) {
				$holder_styles[] = 'color: ' . $instance['icon_color'] . ';';
			}
			if ( ! empty( $instance['widget_margin'] ) ) {
				$holder_styles[] = 'margin: ' . $instance['widget_margin'];
			}
			
			?>
			
			<a <?php curly_mkdf_class_attribute( $side_area_icon_class_array ); ?> <?php echo curly_mkdf_get_inline_attr( $instance['icon_hover_color'], 'data-hover-color' ); ?>
					href="javascript:void(0)" <?php curly_mkdf_inline_style( $holder_styles ); ?>>
				<?php if ( ! empty( $instance['widget_title'] ) ) { ?>
					<h5 class="mkdf-side-menu-title"><?php echo esc_html( $instance['widget_title'] ); ?></h5>
				<?php } ?>
				<span class="mkdf-side-menu-icon">
				<?php if ( ( $side_area_icon_source == 'icon_pack' ) && isset( $side_area_icon_pack ) ) {
					echo curly_mkdf_icon_collections()->getMenuIcon( $side_area_icon_pack );
				} else if ( isset( $side_area_icon_svg_path ) ) {
					print curly_mkdf_display_content_output($side_area_icon_svg_path);
				} ?>
            </span>
			</a>
		<?php }
	}
}