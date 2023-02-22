<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-heading">
            <?php curly_mkdf_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="mkdf-post-text">
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-info-top">
                    <?php curly_mkdf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                    <?php curly_mkdf_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                    <?php curly_mkdf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    <?php curly_mkdf_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                </div>
                <div class="mkdf-post-text-main">
                    <?php curly_mkdf_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <div class="mkdf-post-info-bottom">
                        <?php curly_mkdf_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                        <?php curly_mkdf_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
                    </div>
                    <?php the_content(); ?>
                    <?php do_action('curly_mkdf_single_link_pages'); ?>
                </div>
            </div>
        </div>
    </div>
</article>