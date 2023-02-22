<?php

if (!function_exists('curly_mkdf_social_options_map')) {
    function curly_mkdf_social_options_map() {

        $page = '_social_page';

        curly_mkdf_add_admin_page(
            array(
                'slug' => '_social_page',
                'title' => esc_html__('Social Networks', 'curly'),
                'icon' => 'fa fa-share-alt'
            )
        );

        /**
         * Enable Social Share
         */
        $panel_social_share = curly_mkdf_add_admin_panel(
            array(
                'page' => '_social_page',
                'name' => 'panel_social_share',
                'title' => esc_html__('Enable Social Share', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'enable_social_share',
                'default_value' => 'no',
                'label' => esc_html__('Enable Social Share', 'curly'),
                'description' => esc_html__('Enabling this option will allow social share on networks of your choice', 'curly'),
                'parent' => $panel_social_share
            )
        );

        $panel_show_social_share_on = curly_mkdf_add_admin_panel(
            array(
                'page' => '_social_page',
                'name' => 'panel_show_social_share_on',
                'title' => esc_html__('Show Social Share On', 'curly'),
                'dependency' => array(
                    'show' => array(
                        'enable_social_share' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'enable_social_share_on_post',
                'default_value' => 'no',
                'label' => esc_html__('Posts', 'curly'),
                'description' => esc_html__('Show Social Share on Blog Posts', 'curly'),
                'parent' => $panel_show_social_share_on
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'enable_social_share_on_page',
                'default_value' => 'no',
                'label' => esc_html__('Pages', 'curly'),
                'description' => esc_html__('Show Social Share on Pages', 'curly'),
                'parent' => $panel_show_social_share_on
            )
        );

        /**
         * Action for embedding social share option for custom post types
         */
        do_action('curly_mkdf_post_types_social_share', $panel_show_social_share_on);

        /**
         * Social Share Networks
         */
        $panel_social_networks = curly_mkdf_add_admin_panel(
            array(
                'page' => '_social_page',
                'name' => 'panel_social_networks',
                'title' => esc_html__('Social Networks', 'curly'),
                'dependency' => array(
                    'hide' => array(
                        'enable_social_share' => 'no'
                    )
                )
            )
        );

        /**
         * Facebook
         */
        curly_mkdf_add_admin_section_title(
            array(
                'parent' => $panel_social_networks,
                'name' => 'facebook_title',
                'title' => esc_html__('Share on Facebook', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'enable_facebook_share',
                'default_value' => 'no',
                'label' => esc_html__('Enable Share', 'curly'),
                'description' => esc_html__('Enabling this option will allow sharing via Facebook', 'curly'),
                'parent' => $panel_social_networks
            )
        );

        $enable_facebook_share_container = curly_mkdf_add_admin_container(
            array(
                'name' => 'enable_facebook_share_container',
                'parent' => $panel_social_networks,
                'dependency' => array(
                    'show' => array(
                        'enable_facebook_share' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'image',
                'name' => 'facebook_icon',
                'default_value' => '',
                'label' => esc_html__('Upload Icon', 'curly'),
                'parent' => $enable_facebook_share_container
            )
        );

        /**
         * Twitter
         */
        curly_mkdf_add_admin_section_title(
            array(
                'parent' => $panel_social_networks,
                'name' => 'twitter_title',
                'title' => esc_html__('Share on Twitter', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'enable_twitter_share',
                'default_value' => 'no',
                'label' => esc_html__('Enable Share', 'curly'),
                'description' => esc_html__('Enabling this option will allow sharing via Twitter', 'curly'),
                'parent' => $panel_social_networks
            )
        );

        $enable_twitter_share_container = curly_mkdf_add_admin_container(
            array(
                'name' => 'enable_twitter_share_container',
                'parent' => $panel_social_networks,
                'dependency' => array(
                    'show' => array(
                        'enable_twitter_share' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'image',
                'name' => 'twitter_icon',
                'default_value' => '',
                'label' => esc_html__('Upload Icon', 'curly'),
                'parent' => $enable_twitter_share_container
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'twitter_via',
                'default_value' => '',
                'label' => esc_html__('Via', 'curly'),
                'parent' => $enable_twitter_share_container
            )
        );

        /**
         * Linked In
         */
        curly_mkdf_add_admin_section_title(
            array(
                'parent' => $panel_social_networks,
                'name' => 'linkedin_title',
                'title' => esc_html__('Share on LinkedIn', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'enable_linkedin_share',
                'default_value' => 'no',
                'label' => esc_html__('Enable Share', 'curly'),
                'description' => esc_html__('Enabling this option will allow sharing via LinkedIn', 'curly'),
                'parent' => $panel_social_networks
            )
        );

        $enable_linkedin_container = curly_mkdf_add_admin_container(
            array(
                'name' => 'enable_linkedin_container',
                'parent' => $panel_social_networks,
                'dependency' => array(
                    'show' => array(
                        'enable_linkedin_share' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'image',
                'name' => 'linkedin_icon',
                'default_value' => '',
                'label' => esc_html__('Upload Icon', 'curly'),
                'parent' => $enable_linkedin_container
            )
        );

        /**
         * Tumblr
         */
        curly_mkdf_add_admin_section_title(
            array(
                'parent' => $panel_social_networks,
                'name' => 'tumblr_title',
                'title' => esc_html__('Share on Tumblr', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'enable_tumblr_share',
                'default_value' => 'no',
                'label' => esc_html__('Enable Share', 'curly'),
                'description' => esc_html__('Enabling this option will allow sharing via Tumblr', 'curly'),
                'parent' => $panel_social_networks
            )
        );

        $enable_tumblr_container = curly_mkdf_add_admin_container(
            array(
                'name' => 'enable_tumblr_container',
                'parent' => $panel_social_networks,
                'dependency' => array(
                    'show' => array(
                        'enable_tumblr_share' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'image',
                'name' => 'tumblr_icon',
                'default_value' => '',
                'label' => esc_html__('Upload Icon', 'curly'),
                'parent' => $enable_tumblr_container
            )
        );

        /**
         * Pinterest
         */
        curly_mkdf_add_admin_section_title(
            array(
                'parent' => $panel_social_networks,
                'name' => 'pinterest_title',
                'title' => esc_html__('Share on Pinterest', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'enable_pinterest_share',
                'default_value' => 'no',
                'label' => esc_html__('Enable Share', 'curly'),
                'description' => esc_html__('Enabling this option will allow sharing via Pinterest', 'curly'),
                'parent' => $panel_social_networks
            )
        );

        $enable_pinterest_container = curly_mkdf_add_admin_container(
            array(
                'name' => 'enable_pinterest_container',
                'parent' => $panel_social_networks,
                'dependency' => array(
                    'show' => array(
                        'enable_pinterest_share' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'image',
                'name' => 'pinterest_icon',
                'default_value' => '',
                'label' => esc_html__('Upload Icon', 'curly'),
                'parent' => $enable_pinterest_container
            )
        );

        /**
         * VK
         */
        curly_mkdf_add_admin_section_title(
            array(
                'parent' => $panel_social_networks,
                'name' => 'vk_title',
                'title' => esc_html__('Share on VK', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'enable_vk_share',
                'default_value' => 'no',
                'label' => esc_html__('Enable Share', 'curly'),
                'description' => esc_html__('Enabling this option will allow sharing via VK', 'curly'),
                'parent' => $panel_social_networks
            )
        );

        $enable_vk_container = curly_mkdf_add_admin_container(
            array(
                'name' => 'enable_vk_container',
                'parent' => $panel_social_networks,
                'dependency' => array(
                    'show' => array(
                        'enable_vk_share' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'image',
                'name' => 'vk_icon',
                'default_value' => '',
                'label' => esc_html__('Upload Icon', 'curly'),
                'parent' => $enable_vk_container
            )
        );

        if (defined('CURLY_TWITTER_FEED_VERSION')) {
            $twitter_panel = curly_mkdf_add_admin_panel(
                array(
                    'title' => esc_html__('Twitter', 'curly'),
                    'name' => 'panel_twitter',
                    'page' => '_social_page'
                )
            );

            curly_mkdf_add_admin_twitter_button(
                array(
                    'name' => 'twitter_button',
                    'parent' => $twitter_panel
                )
            );
        }

        if (defined('CURLY_INSTAGRAM_FEED_VERSION')) {
            $instagram_panel = curly_mkdf_add_admin_panel(
                array(
                    'title' => esc_html__('Instagram', 'curly'),
                    'name' => 'panel_instagram',
                    'page' => '_social_page'
                )
            );

            curly_mkdf_add_admin_instagram_button(
                array(
                    'name' => 'instagram_button',
                    'parent' => $instagram_panel
                )
            );
        }

        /**
         * Open Graph
         */
        $panel_open_graph = curly_mkdf_add_admin_panel(
            array(
                'page' => '_social_page',
                'name' => 'panel_open_graph',
                'title' => esc_html__('Open Graph', 'curly'),
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'enable_open_graph',
                'default_value' => 'no',
                'label' => esc_html__('Enable Open Graph', 'curly'),
                'description' => esc_html__('Enabling this option will allow usage of Open Graph protocol on your site', 'curly'),
                'parent' => $panel_open_graph
            )
        );

        $enable_open_graph_container = curly_mkdf_add_admin_container(
            array(
                'name' => 'enable_open_graph_container',
                'parent' => $panel_open_graph,
                'dependency' => array(
                    'show' => array(
                        'enable_open_graph' => 'yes'
                    )
                )
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'image',
                'name' => 'open_graph_image',
                'default_value' => MIKADO_ASSETS_ROOT . '/img/open_graph.jpg',
                'label' => esc_html__('Default Share Image', 'curly'),
                'parent' => $enable_open_graph_container,
                'description' => esc_html__('Used when featured image is not set. Make sure that image is at least 1200 x 630 pixels, up to 8MB in size', 'curly'),
            )
        );

        /**
         * Action for embedding social share option for custom post types
         */
        do_action('curly_mkdf_social_options', $page);
    }

    add_action('curly_mkdf_options_map', 'curly_mkdf_social_options_map', 18);
}