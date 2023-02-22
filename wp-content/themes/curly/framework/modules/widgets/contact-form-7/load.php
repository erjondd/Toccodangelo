<?php

if (curly_mkdf_contact_form_7_installed()) {
    include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';

    add_filter('curly_core_filter_register_widgets', 'curly_core_register_cf7_widget');
}

if (!function_exists('curly_core_register_cf7_widget')) {
    /**
     * Function that register cf7 widget
     */
    function curly_core_register_cf7_widget($widgets) {
        $widgets[] = 'CurlyMikadofContactForm7Widget';

        return $widgets;
    }
}