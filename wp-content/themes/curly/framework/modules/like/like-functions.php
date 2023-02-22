<?php

if (!function_exists('curly_mkdf_like')) {
    /**
     * Returns ThemeNamePhpClassLike instance
     *
     * @return ThemeNamePhpClassLike
     */
    function curly_mkdf_like() {
        return CurlyMikadofLike::get_instance();
    }
}

function curly_mkdf_get_like() {
    echo wp_kses(curly_mkdf_like()->add_like(), array(
        'span' => array(
            'class' => true,
            'aria-hidden' => true,
            'style' => true,
            'id' => true
        ),
        'i' => array(
            'class' => true,
            'style' => true,
            'id' => true
        ),
        'a' => array(
            'href' => true,
            'class' => true,
            'id' => true,
            'title' => true,
            'style' => true
        )
    ));
}