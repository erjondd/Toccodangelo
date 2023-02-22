<form action="<?php echo esc_url(home_url('/')); ?>" class="mkdf-search-cover" method="get">
    <?php if ($search_in_grid) { ?>
    <div class="mkdf-container">
        <div class="mkdf-container-inner clearfix">
            <?php } ?>
            <div class="mkdf-form-holder-outer">
                <div class="mkdf-form-holder">
                    <div class="mkdf-form-holder-inner">
                        <input type="text" placeholder="<?php esc_attr_e('Search', 'curly'); ?>" name="s" class="mkdf_search_field" autocomplete="off"/>
                        <a <?php curly_mkdf_class_attribute($search_close_icon_class); ?> href="#">
                            <?php echo curly_mkdf_get_search_close_icon_html(); ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php if ($search_in_grid) { ?>
        </div>
    </div>
<?php } ?>
</form>