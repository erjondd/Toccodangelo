<?php
$blog_single_navigation = curly_mkdf_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_nav_same_category = curly_mkdf_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
$blog_share = (curly_mkdf_options()->getOptionValue('enable_social_share') === 'yes' && curly_mkdf_options()->getOptionValue('enable_social_share_on_post') === 'yes') ? true : false;
?>

<?php
if ($blog_single_navigation) {
    $post_navigation = array(
        'prev' => array(
            'arrow' => '<span class="mkdf-arrow"></span>',
            'label' => '<h5 class="mkdf-label">' . esc_html__('Previous', 'curly') . '</h5>',
        ),
        'next' => array(
            'arrow' => '<span class="mkdf-arrow"></span>',
            'label' => '<h5 class="mkdf-label">' . esc_html__('Next', 'curly') . '</h5>',
        )
    );

    if ($blog_nav_same_category) {
        if (get_previous_post(true) !== '') {
            $post_navigation['prev']['post'] = get_previous_post(true);
            $post_navigation['prev']['title'] = '<h4 class="mkdf-title">' . $post_navigation['prev']['post']->post_title . '</h4>';
        }
        if (get_next_post(true) !== '') {
            $post_navigation['next']['post'] = get_next_post(true);
            $post_navigation['next']['title'] = '<h4 class="mkdf-title">' . $post_navigation['next']['post']->post_title . '</h4>';
        }
    } else {
        if (get_previous_post() !== '') {
            $post_navigation['prev']['post'] = get_previous_post();
            $post_navigation['prev']['title'] = '<h4 class="mkdf-title">' . $post_navigation['prev']['post']->post_title . '</h4>';
        }
        if (get_next_post() !== '') {
            $post_navigation['next']['post'] = get_next_post();
            $post_navigation['next']['title'] = '<h4 class="mkdf-title">' . $post_navigation['next']['post']->post_title . '</h4>';
        }
    }
}
?>

<?php if ($blog_single_navigation || $blog_share): ?>

    <div class="mkdf-blog-single-navigation-share clearfix">

        <?php if ($blog_share): ?>
            <div class="mkdf-blog-single-share">
                <?php echo curly_mkdf_get_social_share_html(array('type' => 'list')); ?>
            </div>
        <?php endif; ?>

        <?php if ($blog_single_navigation): ?>
            <?php if (isset($post_navigation['prev']['post'])): ?>
                <div class="mkdf-blog-single-prev">

                    <a itemprop="url" class="mkdf-link" href="<?php echo get_permalink($post_navigation['prev']['post']->ID); ?>">
                        <?php echo wp_kses($post_navigation['prev']['arrow'], array('span' => array('class' => true))); ?>
                        <?php echo wp_kses($post_navigation['prev']['title'], array('h4' => array('class' => true))); ?>
                        <?php echo wp_kses($post_navigation['prev']['label'], array('h5' => array('class' => true))); ?>
                    </a>

                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($blog_single_navigation): ?>
            <?php if (isset($post_navigation['next']['post'])): ?>
                <div class="mkdf-blog-single-next">

                    <a itemprop="url" class="mkdf-link" href="<?php echo get_permalink($post_navigation['next']['post']->ID); ?>">
                        <?php echo wp_kses($post_navigation['next']['title'], array('h4' => array('class' => true))); ?>
                        <?php echo wp_kses($post_navigation['next']['label'], array('h5' => array('class' => true))); ?>
                        <?php echo wp_kses($post_navigation['next']['arrow'], array('span' => array('class' => true))); ?>
                    </a>

                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>

<?php endif; ?>