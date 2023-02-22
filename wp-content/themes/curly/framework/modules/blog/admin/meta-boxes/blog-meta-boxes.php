<?php

foreach (glob(MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php') as $meta_box_load) {
    include_once $meta_box_load;
}

if (!function_exists('curly_mkdf_map_blog_meta')) {
    function curly_mkdf_map_blog_meta() {
        $mkdf_blog_categories = array();
        $categories = get_categories();
        foreach ($categories as $category) {
            $mkdf_blog_categories[$category->slug] = $category->name;
        }

        $blog_meta_box = curly_mkdf_create_meta_box(
            array(
                'scope' => array('page'),
                'title' => esc_html__('Blog', 'curly'),
                'name' => 'blog_meta'
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_blog_category_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Blog Category', 'curly'),
                'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'curly'),
                'parent' => $blog_meta_box,
                'options' => $mkdf_blog_categories
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_show_posts_per_page_meta',
                'type' => 'text',
                'label' => esc_html__('Number of Posts', 'curly'),
                'description' => esc_html__('Enter the number of posts to display', 'curly'),
                'parent' => $blog_meta_box,
                'options' => $mkdf_blog_categories,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_blog_masonry_layout_meta',
                'type' => 'select',
                'label' => esc_html__('Masonry - Layout', 'curly'),
                'description' => esc_html__('Set masonry layout. Default is in grid.', 'curly'),
                'parent' => $blog_meta_box,
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'in-grid' => esc_html__('In Grid', 'curly'),
                    'full-width' => esc_html__('Full Width', 'curly')
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_blog_masonry_number_of_columns_meta',
                'type' => 'select',
                'label' => esc_html__('Masonry - Number of Columns', 'curly'),
                'description' => esc_html__('Set number of columns for your masonry blog lists', 'curly'),
                'parent' => $blog_meta_box,
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'two' => esc_html__('2 Columns', 'curly'),
                    'three' => esc_html__('3 Columns', 'curly'),
                    'four' => esc_html__('4 Columns', 'curly'),
                    'five' => esc_html__('5 Columns', 'curly')
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_blog_masonry_space_between_items_meta',
                'type' => 'select',
                'label' => esc_html__('Masonry - Space Between Items', 'curly'),
                'description' => esc_html__('Set space size between posts for your masonry blog lists', 'curly'),
                'options' => curly_mkdf_get_space_between_items_array(true),
                'parent' => $blog_meta_box
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_blog_list_featured_image_proportion_meta',
                'type' => 'select',
                'label' => esc_html__('Masonry - Featured Image Proportion', 'curly'),
                'description' => esc_html__('Choose type of proportions you want to use for featured images on masonry blog lists', 'curly'),
                'parent' => $blog_meta_box,
                'default_value' => '',
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'fixed' => esc_html__('Fixed', 'curly'),
                    'original' => esc_html__('Original', 'curly')
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'name' => 'mkdf_blog_pagination_type_meta',
                'type' => 'select',
                'label' => esc_html__('Pagination Type', 'curly'),
                'description' => esc_html__('Choose a pagination layout for Blog Lists', 'curly'),
                'parent' => $blog_meta_box,
                'default_value' => '',
                'options' => array(
                    '' => esc_html__('Default', 'curly'),
                    'standard' => esc_html__('Standard', 'curly'),
                    'load-more' => esc_html__('Load More', 'curly'),
                    'infinite-scroll' => esc_html__('Infinite Scroll', 'curly'),
                    'no-pagination' => esc_html__('No Pagination', 'curly')
                )
            )
        );

        curly_mkdf_create_meta_box_field(
            array(
                'type' => 'text',
                'name' => 'mkdf_number_of_chars_meta',
                'default_value' => '',
                'label' => esc_html__('Number of Words in Excerpt', 'curly'),
                'description' => esc_html__('Enter a number of words in excerpt (article summary). Default value is 40', 'curly'),
                'parent' => $blog_meta_box,
                'args' => array(
                    'col_width' => 3
                )
            )
        );
    }

    add_action('curly_mkdf_meta_boxes_map', 'curly_mkdf_map_blog_meta', 30);
}