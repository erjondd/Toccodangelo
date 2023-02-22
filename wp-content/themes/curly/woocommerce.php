<?php
/*
Template Name: WooCommerce
*/
?>
<?php
$mkdf_sidebar_layout = curly_mkdf_sidebar_layout();

get_header();
curly_mkdf_get_title();
get_template_part('slider');
do_action('curly_mkdf_before_main_content');

//Woocommerce content
if (!is_singular('product')) { ?>
    <div class="mkdf-container">
        <div class="mkdf-container-inner clearfix">
            <div class="mkdf-grid-row">
                <div <?php echo curly_mkdf_get_content_sidebar_class(); ?>>
                    <?php curly_mkdf_woocommerce_content(); ?>
                </div>
                <?php if ($mkdf_sidebar_layout !== 'no-sidebar') { ?>
                    <div <?php echo curly_mkdf_get_sidebar_holder_class(); ?>>
                        <?php get_sidebar(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="mkdf-container">
        <div class="mkdf-container-inner clearfix">
            <?php curly_mkdf_woocommerce_content(); ?>
        </div>
    </div>
<?php } ?>
<?php get_footer(); ?>