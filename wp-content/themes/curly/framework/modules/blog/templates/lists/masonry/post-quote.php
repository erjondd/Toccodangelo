<?php
$post_classes[] = 'mkdf-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-text">
            <?php curly_mkdf_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
        </div>
    </div>
</article>