<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if (curly_mkdf_core_plugin_installed() && curly_mkdf_options()->getOptionValue('enable_social_share') === 'yes' && curly_mkdf_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="mkdf-blog-share">
        <?php echo curly_mkdf_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>