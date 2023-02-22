<?php do_action('curly_mkdf_before_mobile_header'); ?>

    <header class="mkdf-mobile-header">
        <?php do_action('curly_mkdf_after_mobile_header_html_open'); ?>

        <div class="mkdf-mobile-header-inner">
            <div class="mkdf-mobile-header-holder">
                <div class="mkdf-grid">
                    <div class="mkdf-vertical-align-containers">
                        <div class="mkdf-vertical-align-containers">
                            <?php if ($show_navigation_opener) : ?>
                                <div <?php curly_mkdf_class_attribute($mobile_icon_class); ?>>
                                    <a href="javascript:void(0)">
									<span class="mkdf-mobile-menu-icon">
										<?php echo curly_mkdf_get_mobile_navigation_icon_html(); ?>
									</span>
                                        <?php if (!empty($mobile_menu_title)) { ?>
                                            <h5 class="mkdf-mobile-menu-text"><?php echo esc_attr($mobile_menu_title); ?></h5>
                                        <?php } ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="mkdf-position-center"><!--
						 -->
                                <div class="mkdf-position-center-inner">
                                    <?php curly_mkdf_get_mobile_logo(); ?>
                                </div>
                            </div>
                            <div class="mkdf-position-right"><!--
						 -->
                                <div class="mkdf-position-right-inner">
                                    <?php if (is_active_sidebar('mkdf-right-from-mobile-logo')) {
                                        dynamic_sidebar('mkdf-right-from-mobile-logo');
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php curly_mkdf_get_mobile_nav(); ?>
        </div>

        <?php do_action('curly_mkdf_before_mobile_header_html_close'); ?>
    </header>

<?php do_action('curly_mkdf_after_mobile_header'); ?>