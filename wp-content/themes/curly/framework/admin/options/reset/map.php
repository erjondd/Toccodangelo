<?php

if (!function_exists('curly_mkdf_reset_options_map')) {
    /**
     * Reset options panel
     */
    function curly_mkdf_reset_options_map() {

        curly_mkdf_add_admin_page(
            array(
                'slug' => '_reset_page',
                'title' => esc_html__('Reset', 'curly'),
                'icon' => 'fa fa-retweet'
            )
        );

        $panel_reset = curly_mkdf_add_admin_panel(
            array(
                'page' => '_reset_page',
                'name' => 'panel_reset',
                'title' => esc_html__('Reset', 'curly')
            )
        );

        curly_mkdf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'reset_to_defaults',
                'default_value' => 'no',
                'label' => esc_html__('Reset to Defaults', 'curly'),
                'description' => esc_html__('This option will reset all Select Options values to defaults', 'curly'),
                'parent' => $panel_reset
            )
        );
    }

    add_action('curly_mkdf_options_map', 'curly_mkdf_reset_options_map', 100);
}