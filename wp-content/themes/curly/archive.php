<?php
$mkdf_blog_type = curly_mkdf_get_archive_blog_list_layout();
curly_mkdf_include_blog_helper_functions('lists', $mkdf_blog_type);
$mkdf_holder_params = curly_mkdf_get_holder_params_blog();

get_header();
curly_mkdf_get_title();
do_action('curly_mkdf_before_main_content');
?>

    <div class="<?php echo esc_attr($mkdf_holder_params['holder']); ?>">
        <?php do_action('curly_mkdf_after_container_open'); ?>

        <div class="<?php echo esc_attr($mkdf_holder_params['inner']); ?>">
            <?php curly_mkdf_get_blog($mkdf_blog_type); ?>
        </div>

        <?php do_action('curly_mkdf_before_container_close'); ?>
    </div>

<?php do_action('curly_mkdf_blog_list_additional_tags'); ?>
<?php get_footer(); ?>