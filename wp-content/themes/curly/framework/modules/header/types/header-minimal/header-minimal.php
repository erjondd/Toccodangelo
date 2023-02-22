<?php
namespace CurlyMikadof\Modules\Header\Types;

use CurlyMikadof\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Minimal layout and option
 *
 * Class HeaderMinimal
 */
class HeaderMinimal extends HeaderType
{
    protected $heightOfTransparency;
    protected $heightOfCompleteTransparency;
    protected $headerHeight;
    protected $mobileHeaderHeight;

    /**
     * Sets slug property which is the same as value of option in DB
     */
    public function __construct() {
        $this->slug = 'header-minimal';

        if (!is_admin()) {
            $this->menuAreaHeight = curly_mkdf_set_default_menu_height_for_header_types();
            $this->mobileHeaderHeight = curly_mkdf_set_default_mobile_menu_height_for_header_types();

            add_action('wp', array($this, 'setHeaderHeightProps'));

            add_filter('curly_mkdf_js_global_variables', array($this, 'getGlobalJSVariables'));
            add_filter('curly_mkdf_per_page_js_vars', array($this, 'getPerPageJSVariables'));
        }
    }

    /**
     * Loads template file for this header type
     *
     * @param array $parameters associative array of variables that needs to passed to template
     */
    public function loadTemplate($parameters = array()) {
        $id = curly_mkdf_get_page_id();

        $parameters['menu_area_in_grid'] = curly_mkdf_get_meta_field_intersect('menu_area_in_grid', $id) == 'yes' ? true : false;
        $parameters['fullscreen_menu_icon_class'] = curly_mkdf_get_fullscreen_menu_icon_class();

        $parameters = apply_filters('curly_mkdf_header_minimal_parameters', $parameters);

        curly_mkdf_get_module_template_part('templates/' . $this->slug, $this->moduleName . '/types/' . $this->slug, '', $parameters);
    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps() {
        $this->heightOfTransparency = $this->calculateHeightOfTransparency();
        $this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
        $this->headerHeight = $this->calculateHeaderHeight();
        $this->mobileHeaderHeight = $this->calculateMobileHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return int
     */
    public function calculateHeightOfTransparency() {
        $id = curly_mkdf_get_page_id();
        $transparencyHeight = 0;

        $menu_background_color = curly_mkdf_get_meta_field_intersect('menu_area_background_color', $id);
        $menu_background_transparency = curly_mkdf_get_meta_field_intersect('menu_area_background_transparency', $id);
        $menu_grid_background_color = curly_mkdf_options()->getOptionValue('menu_area_grid_background_color');
        $menu_grid_background_transparency = curly_mkdf_options()->getOptionValue('menu_area_grid_background_transparency');

        if (empty($menu_background_color)) {
            $menuAreaTransparent = !empty($menu_grid_background_color) && $menu_grid_background_transparency !== '1' && $menu_grid_background_transparency !== '';
        } else {
            $menuAreaTransparent = !empty($menu_background_color) && $menu_background_transparency !== '1' && $menu_background_transparency !== '';
        }

        $sliderExists = get_post_meta($id, 'mkdf_page_slider_meta', true) !== '';
        $contentBehindHeader = get_post_meta($id, 'mkdf_page_content_behind_header_meta', true) === 'yes';

        if ($sliderExists || $contentBehindHeader || is_404()) {
            $menuAreaTransparent = true;
        }

        if ($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;

            if (($sliderExists && curly_mkdf_is_top_bar_enabled())
                || curly_mkdf_is_top_bar_enabled() && curly_mkdf_is_top_bar_transparent()
            ) {
                $transparencyHeight += curly_mkdf_get_top_bar_height();
            }
        }

        return $transparencyHeight;
    }

    /**
     * Returns height of completely transparent header parts
     *
     * @return int
     */
    public function calculateHeightOfCompleteTransparency() {
        $id = curly_mkdf_get_page_id();
        $transparencyHeight = 0;

        $menu_background_color_meta = get_post_meta($id, 'mkdf_menu_area_background_color_meta', true);
        $menu_background_transparency_meta = get_post_meta($id, 'mkdf_menu_area_background_transparency_meta', true);
        $menu_background_color = curly_mkdf_options()->getOptionValue('menu_area_background_color');
        $menu_background_transparency = curly_mkdf_options()->getOptionValue('menu_area_background_transparency');
        $menu_grid_background_color = curly_mkdf_options()->getOptionValue('menu_area_grid_background_color');
        $menu_grid_background_transparency = curly_mkdf_options()->getOptionValue('menu_area_grid_background_transparency');

        if (!empty($menu_background_color_meta)) {
            $menuAreaTransparent = !empty($menu_background_color_meta) && $menu_background_transparency_meta === '0';
        } elseif (empty($menu_background_color)) {
            $menuAreaTransparent = !empty($menu_grid_background_color) && $menu_grid_background_transparency === '0';
        } else {
            $menuAreaTransparent = !empty($menu_background_color) && $menu_background_transparency === '0';
        }

        if ($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;
        }

        return $transparencyHeight;
    }

    /**
     * Returns total height of header
     *
     * @return int|string
     */
    public function calculateHeaderHeight() {
        $headerHeight = $this->menuAreaHeight;
        if (curly_mkdf_is_top_bar_enabled()) {
            $headerHeight += curly_mkdf_get_top_bar_height();
        }

        return $headerHeight;
    }

    /**
     * Returns total height of mobile header
     *
     * @return int|string
     */
    public function calculateMobileHeaderHeight() {
        $mobileHeaderHeight = $this->mobileHeaderHeight;

        return $mobileHeaderHeight;
    }

    /**
     * Returns global js variables of header
     *
     * @param $globalVariables
     *
     * @return int|string
     */
    public function getGlobalJSVariables($globalVariables) {
        $globalVariables['mkdfLogoAreaHeight'] = 0;
        $globalVariables['mkdfMenuAreaHeight'] = $this->headerHeight;
        $globalVariables['mkdfMobileHeaderHeight'] = $this->mobileHeaderHeight;

        return $globalVariables;
    }

    /**
     * Returns per page js variables of header
     *
     * @param $perPageVars
     *
     * @return int|string
     */
    public function getPerPageJSVariables($perPageVars) {
        //calculate transparency height only if header has no sticky behaviour
        $header_behavior = curly_mkdf_get_meta_field_intersect('header_behaviour');
        if (!in_array($header_behavior, array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up'))) {
            $perPageVars['mkdfHeaderTransparencyHeight'] = $this->headerHeight - (curly_mkdf_get_top_bar_height() + $this->heightOfCompleteTransparency);
        } else {
            $perPageVars['mkdfHeaderTransparencyHeight'] = 0;
        }
        $perPageVars['mkdfHeaderVerticalWidth'] = 0;

        return $perPageVars;
    }
}