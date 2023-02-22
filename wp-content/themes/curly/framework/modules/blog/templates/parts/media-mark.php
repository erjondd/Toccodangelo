<?php
$post_format = isset($post_format) ? $post_format : '';

switch ($post_format) {
    case 'standard':
        echo curly_mkdf_icon_collections()->renderIcon('fa-image', 'font_elegant', array('icon_attributes' => array('class' => 'mkdf-post-image-icon')));
        break;
    case 'gallery':
        echo curly_mkdf_icon_collections()->renderIcon('fa-images', 'font_elegant', array('icon_attributes' => array('class' => 'mkdf-post-image-icon')));
        break;
    case 'video':
        echo curly_mkdf_icon_collections()->renderIcon('fa-play', 'font_elegant', array('icon_attributes' => array('class' => 'mkdf-post-image-icon')));
        break;
    case 'audio':
        echo curly_mkdf_icon_collections()->renderIcon('fa-music', 'font_elegant', array('icon_attributes' => array('class' => 'mkdf-post-image-icon')));
        break;
    case 'link':
        echo curly_mkdf_icon_collections()->renderIcon('fa-link', 'font_awesome', array('icon_attributes' => array('class' => 'mkdf-post-image-icon')));
        break;
    case 'quote':
        echo curly_mkdf_icon_collections()->renderIcon('fa-quote-right', 'font_awesome', array('icon_attributes' => array('class' => 'mkdf-post-image-icon')));
        break;
}