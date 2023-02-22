<?php
$mkdf_sidebar_layout = curly_mkdf_sidebar_layout();

get_header();
curly_mkdf_get_title();
get_template_part('slider');
do_action('curly_mkdf_before_main_content');
?>

    <div class="mkdf-container mkdf-default-page-template">
        <?php do_action('curly_mkdf_after_container_open'); ?>

        <div class="mkdf-container-inner clearfix">
            <?php do_action('curly_mkdf_after_container_inner_open'); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="mkdf-grid-row">
                    <div <?php echo curly_mkdf_get_content_sidebar_class(); ?>>
                        <?php
                        the_content();
                        do_action('curly_mkdf_page_after_content');
                        ?>
                    </div>
                    <?php if ($mkdf_sidebar_layout !== 'no-sidebar') { ?>
                        <div <?php echo curly_mkdf_get_sidebar_holder_class(); ?>>
                            <?php get_sidebar(); ?>
                        </div>
                    <?php } ?>
                </div>
            <?php endwhile; endif; ?>
            <?php do_action('curly_mkdf_before_container_inner_close'); ?>
        </div>

        <?php do_action('curly_mkdf_before_container_close'); ?>
    </div>

<?php get_footer(); ?>