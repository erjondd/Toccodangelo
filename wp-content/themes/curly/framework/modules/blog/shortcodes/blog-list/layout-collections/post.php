<li class="mkdf-bl-item mkdf-item-space clearfix">
    <div class="mkdf-bli-inner">
        <?php if ($post_info_image == 'yes') {
            curly_mkdf_get_module_template_part('templates/parts/media', 'blog', '', $params);
        } ?>
        <div class="mkdf-bli-content">
            <?php if ($post_info_section == 'yes') { ?>
                <div class="mkdf-bli-info">
                    <?php
                    if ($post_info_date == 'yes') {
                        curly_mkdf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
                    }
                    if ($post_info_author == 'yes') {
                        curly_mkdf_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params);
                    }
                    if ($post_info_category == 'yes') {
                        curly_mkdf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
                    }
                    ?>
                </div>
            <?php } ?>

            <?php curly_mkdf_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>

            <div class="mkdf-bli-excerpt">
                <?php curly_mkdf_get_module_template_part('templates/parts/excerpt', 'blog', '', $params); ?>
                <?php curly_mkdf_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params); ?>
            </div>
        </div>
    </div>
</li>