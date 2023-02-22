<?php do_action('curly_mkdf_before_sticky_header'); ?>

    <div class="mkdf-sticky-header">
        <?php do_action('curly_mkdf_after_sticky_menu_html_open'); ?>
        <div class="mkdf-sticky-holder <?php echo esc_attr($menu_area_class); ?>">
            <?php if ($sticky_header_in_grid) : ?>
            <div class="mkdf-grid">
                <?php endif; ?>
                <div class="mkdf-vertical-align-containers">
                    <div class="mkdf-position-left"><!--
                 -->
                        <div class="mkdf-position-left-inner">
                            <?php if (!$hide_logo) {
                                curly_mkdf_get_logo('sticky');
                            } ?>
                            <?php if ($menu_area_position === 'left') : ?>
                                <?php curly_mkdf_get_sticky_menu('mkdf-sticky-nav'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($menu_area_position === 'center') : ?>
                        <div class="mkdf-position-center"><!--
                     -->
                            <div class="mkdf-position-center-inner">
                                <?php curly_mkdf_get_sticky_menu('mkdf-sticky-nav'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="mkdf-position-right"><!--
                 -->
                        <div class="mkdf-position-right-inner">
                            <?php if ($menu_area_position === 'right') : ?>
                                <?php curly_mkdf_get_sticky_menu('mkdf-sticky-nav'); ?>
                            <?php endif; ?>
                            <?php curly_mkdf_get_sticky_header_widget_menu_area(); ?>
                        </div>
                    </div>
                </div>
                <?php if ($sticky_header_in_grid) : ?>
            </div>
        <?php endif; ?>
        </div>
        <?php do_action('curly_mkdf_before_sticky_menu_html_close'); ?>
    </div>

<?php do_action('curly_mkdf_after_sticky_header'); ?>