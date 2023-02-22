<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-text">
            <div class="mkdf-post-mark">
                <span class="fa fa-link mkdf-link-mark"></span>
            </div>
            <?php curly_mkdf_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
        </div>
    </div>
    <div class="mkdf-post-additional-content">
        <?php the_content(); ?>
    </div>
</article>