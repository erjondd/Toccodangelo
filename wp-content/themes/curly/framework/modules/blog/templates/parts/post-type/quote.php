<?php
$title_tag = isset($quote_tag) ? $quote_tag : 'h4';
$quote_text_meta = get_post_meta(get_the_ID(), "mkdf_post_quote_text_meta", true);

$post_title = !empty($quote_text_meta) ? $quote_text_meta : get_the_title();

$post_author = get_post_meta(get_the_ID(), "mkdf_post_quote_author_meta", true);
?>

<div class="mkdf-post-quote-holder">

    <?php if (curly_mkdf_blog_item_has_link()) : ?>
        <a itemprop="url" href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <?php endif; ?>

        <div class="mkdf-post-quote-holder-inner">
            <?php echo '<' . esc_attr($title_tag); ?> itemprop="name" class="mkdf-quote-title mkdf-post-title">
            <?php echo esc_html($post_title); ?>
            <?php echo '</' . esc_attr($title_tag); ?>>

            <?php if ($post_author != '') : ?>
                <h5 class="mkdf-quote-author">
                    <?php echo esc_html($post_author); ?>
                </h5>
            <?php endif; ?>
        </div>

    <?php if (curly_mkdf_blog_item_has_link()) : ?>
        </a>
    <?php endif; ?>

</div>