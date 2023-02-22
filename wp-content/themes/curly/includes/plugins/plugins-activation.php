<?php

if ( ! function_exists( 'curly_mkdf_register_required_plugins' ) ) {
	/**
	 * Registers theme required and optional plugins. Hooks to tgmpa_register hook
	 */
	function curly_mkdf_register_required_plugins() {
		$plugins = array(
			array(
				'name'               => esc_html__( 'WPBakery Visual Composer', 'curly' ),
				'slug'               => 'js_composer',
				'source'             => get_template_directory() . '/includes/plugins/js_composer.zip',
				'version'            => '6.7.0',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'     => esc_html__( 'Elementor', 'curly' ),
				'slug'     => 'elementor',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'Qi Addons for Elementor', 'curly' ),
				'slug'     => 'qi-addons-for-elementor',
				'required' => false,
			),
			array(
				'name'               => esc_html__( 'Revolution Slider', 'curly' ),
				'slug'               => 'revslider',
				'source'             => get_template_directory() . '/includes/plugins/revslider.zip',
				'version'            => '6.5.7',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'     => esc_html__( 'Booked', 'curly' ),
				'slug'     => 'booked',
				'source'   => get_template_directory() . '/includes/plugins/booked.zip',
				'version'  => '2.3.5',
				'required' => false
			),
			array(
				'name'               => esc_html__( 'Curly Core', 'curly' ),
				'slug'               => 'curly-core',
				'source'             => get_template_directory() . '/includes/plugins/curly-core.zip',
				'version'            => '2.1.2',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Curly Business', 'curly' ),
				'slug'               => 'curly-business',
				'source'             => get_template_directory() . '/includes/plugins/curly-business.zip',
				'version'            => '2.0.3',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Curly Instagram Feed', 'curly' ),
				'slug'               => 'curly-instagram-feed',
				'source'             => get_template_directory() . '/includes/plugins/curly-instagram-feed.zip',
				'version'            => '2.1.2',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Curly Twitter Feed', 'curly' ),
				'slug'               => 'curly-twitter-feed',
				'source'             => get_template_directory() . '/includes/plugins/curly-twitter-feed.zip',
				'version'            => '2.0.2',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'     => esc_html__( 'WooCommerce plugin', 'curly' ),
				'slug'     => 'woocommerce',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'Contact Form 7', 'curly' ),
				'slug'     => 'contact-form-7',
				'required' => false
			),
			array(
				'name'               => esc_html__( 'Envato Market', 'curly' ),
				'slug'               => 'envato-market',
				'source'             => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'version'            => '2.0.0',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			)
		);

		$config = array(
			'domain'       => 'curly',
			'default_path' => '',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'menu'         => 'install-required-plugins',
			'has_notices'  => true,
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'curly' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'curly' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'curly' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'curly' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'curly' ),
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'curly' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'curly' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'curly' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'curly' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'curly' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'curly' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'curly' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'curly' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'curly' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'curly' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'curly' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'curly' ),
				'nag_type'                        => 'updated'
			)
		);

		tgmpa( $plugins, $config );
	}

	add_action( 'tgmpa_register', 'curly_mkdf_register_required_plugins' );
}
