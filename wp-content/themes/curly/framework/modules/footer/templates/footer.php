<?php do_action('curly_mkdf_before_footer_content'); ?>
</div> <!-- close div.content_inner -->
</div>  <!-- close div.content -->
<?php if ($display_footer && ($display_footer_top || $display_footer_bottom)) { ?>
    <footer class="mkdf-page-footer <?php echo esc_attr($holder_classes); ?>">
        <?php
        if ($display_footer_top) {
            curly_mkdf_get_footer_top();
        }
        if ($display_footer_bottom) {
            curly_mkdf_get_footer_bottom();
        }
        ?>
    </footer>
<?php } ?>
</div> <!-- close div.mkdf-wrapper-inner  -->
</div> <!-- close div.mkdf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>