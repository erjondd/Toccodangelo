<section class="mkdf-side-menu">
    <a <?php curly_mkdf_class_attribute($side_area_close_icon_class); ?> href="#">
        <?php echo curly_mkdf_get_side_area_close_icon_html(); ?>
    </a>
    <?php if (is_active_sidebar('sidearea')) {
        dynamic_sidebar('sidearea');
    } ?>
</section>