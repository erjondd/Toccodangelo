<?php if (curly_mkdf_core_plugin_installed()) : ?>
    <div class="mkdf-blog-like">
        <?php if (function_exists('curly_mkdf_get_like')) curly_mkdf_get_like(); ?>
    </div>
<?php endif; ?>