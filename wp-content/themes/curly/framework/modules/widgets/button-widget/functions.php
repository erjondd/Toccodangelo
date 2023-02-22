<?php

if ( ! function_exists( 'curly_mkdf_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function curly_mkdf_register_button_widget( $widgets ) {
		$widgets[] = 'CurlyMikadoButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'curly_core_filter_register_widgets', 'curly_mkdf_register_button_widget' );
}