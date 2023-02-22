<?php
if ( class_exists( 'CurlyCoreClassWidget' ) ) {
	
	class CurlyMikadofSearchOpener extends CurlyCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_search_opener',
				esc_html__( 'Curly Search Opener', 'curly' ),
				array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'curly' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			
			$search_icon_params = array(
				array(
					'type'        => 'colorpicker',
					'name'        => 'search_icon_color',
					'title'       => esc_html__( 'Icon Color', 'curly' ),
					'description' => esc_html__( 'Define color for search icon', 'curly' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'search_icon_hover_color',
					'title'       => esc_html__( 'Icon Hover Color', 'curly' ),
					'description' => esc_html__( 'Define hover color for search icon', 'curly' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'search_icon_margin',
					'title'       => esc_html__( 'Icon Margin', 'curly' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'curly' )
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'show_label',
					'title'       => esc_html__( 'Enable Search Icon Text', 'curly' ),
					'description' => esc_html__( 'Enable this option to show search text next to search icon in header', 'curly' ),
					'options'     => curly_mkdf_get_yes_no_select_array()
				)
			);
			
			$search_icon_pack_params = array(
				array(
					'type'        => 'textfield',
					'name'        => 'search_icon_size',
					'title'       => esc_html__( 'Icon Size (px)', 'curly' ),
					'description' => esc_html__( 'Define size for search icon', 'curly' )
				)
			);
			
			if ( curly_mkdf_options()->getOptionValue( 'search_icon_pack' ) == 'icon_pack' ) {
				$this->params = array_merge( $search_icon_pack_params, $search_icon_params );
			} else {
				$this->params = $search_icon_params;
			}
			
		}
		
		public function widget( $args, $instance ) {
			global $curly_mkdf_IconCollections;
			
			$search_icon_source      = curly_mkdf_options()->getOptionValue( 'search_icon_source' );
			$search_icon_pack        = curly_mkdf_options()->getOptionValue( 'search_icon_pack' );
			$search_icon_svg_path    = curly_mkdf_options()->getOptionValue( 'search_icon_svg_path' );
			$enable_search_icon_text = curly_mkdf_options()->getOptionValue( 'enable_search_icon_text' );
			
			$search_icon_class_array = array(
				'mkdf-search-opener',
				'mkdf-icon-has-hover'
			);
			
			$search_icon_class_array[] = $search_icon_source == 'icon_pack' ? 'mkdf-search-opener-icon-pack' : 'mkdf-search-opener-svg-path';
			
			$styles           = array();
			$show_search_text = $instance['show_label'] == 'yes' || $enable_search_icon_text == 'yes' ? true : false;
			
			if ( ! empty( $instance['search_icon_size'] ) ) {
				$styles[] = 'font-size: ' . intval( $instance['search_icon_size'] ) . 'px';
			}
			
			if ( ! empty( $instance['search_icon_color'] ) ) {
				$styles[] = 'color: ' . $instance['search_icon_color'] . ';';
			}
			
			if ( ! empty( $instance['search_icon_margin'] ) ) {
				$styles[] = 'margin: ' . $instance['search_icon_margin'] . ';';
			}
			?>
			
			<a <?php curly_mkdf_inline_attr( $instance['search_icon_hover_color'], 'data-hover-color' ); ?> <?php curly_mkdf_inline_style( $styles ); ?> <?php curly_mkdf_class_attribute( $search_icon_class_array ); ?>
					href="javascript:void(0)">
            <span class="mkdf-search-opener-wrapper">
                <?php if ( ( $search_icon_source == 'icon_pack' ) && isset( $search_icon_pack ) ) {
	                $curly_mkdf_IconCollections->getSearchIcon( $search_icon_pack, false );
                } else if ( ( $search_icon_source == 'svg_path' ) && isset( $search_icon_svg_path ) ) {
	                print curly_mkdf_display_content_output($search_icon_svg_path);
                } ?>
	            <?php if ( $show_search_text ) { ?>
		            <span class="mkdf-search-icon-text"><?php esc_html_e( 'Search', 'curly' ); ?></span>
	            <?php } ?>
            </span>
			</a>
		<?php }
	}
}