<?php if (!curly_mkdf_post_has_read_more() && !post_password_required()) { ?>
    <div class="mkdf-post-read-more-button">
        <?php
        $button_params = array(
            'type' => 'simple',
            'link' => get_the_permalink(),
            'text' => esc_html__('Read More', 'curly'),
            'custom_class' => 'mkdf-blog-list-button',
        );

        echo curly_mkdf_return_button_html($button_params);
        ?>
    </div>
<?php } ?>