<?php
$item_classes = $this_object->getItemClasses($params);
$shader_styles = $this_object->getShaderStyles($params);
$text_wrapper_styles = $this_object->getTextWrapperStyles($params);
$params['title_styles'] = $this_object->getTitleStyles($params);

?>

<div class="mkdf-pli mkdf-item-space <?php echo esc_html($item_classes); ?>">
    <div class="mkdf-pli-inner">
        <div class="mkdf-pli-image">
            <?php curly_mkdf_get_module_template_part('templates/parts/image', 'woocommerce', '', $params); ?>
        </div>
        <a class="mkdf-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
    </div>
    <div class="mkdf-pli-text-wrapper" <?php echo curly_mkdf_get_inline_style($text_wrapper_styles); ?>>
        <?php curly_mkdf_get_module_template_part('templates/parts/category', 'woocommerce', '', $params); ?>

        <?php curly_mkdf_get_module_template_part('templates/parts/title', 'woocommerce', '', $params); ?>

        <?php curly_mkdf_get_module_template_part('templates/parts/excerpt', 'woocommerce', '', $params); ?>

        <?php curly_mkdf_get_module_template_part('templates/parts/rating', 'woocommerce', '', $params); ?>

        <?php curly_mkdf_get_module_template_part('templates/parts/button-price', 'woocommerce', '', $params); ?>
    </div>
</div>