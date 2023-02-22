<?php

curly_mkdf_get_single_post_format_html($blog_single_type);

do_action('curly_mkdf_after_article_content');

curly_mkdf_get_module_template_part('templates/parts/single/single-navigation', 'blog');

curly_mkdf_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

curly_mkdf_get_module_template_part('templates/parts/single/author-info', 'blog');

curly_mkdf_get_module_template_part('templates/parts/single/comments', 'blog');