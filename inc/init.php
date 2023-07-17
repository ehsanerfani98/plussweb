<?php

function theme_setup()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');


    add_rewrite_rule(
        'product/([^/]+)/discussions/?$',
        'index.php?product=$matches[1]&pagename=discussions',
        'top'
    );
    add_rewrite_rule(
        'product/([^/]+)/discussions/comment-page-([0-9]{1,})/?$',
        'index.php?product=$matches[1]&pagename=discussions&cpage=$matches[2]',
        'top'
    );
    flush_rewrite_rules();

    $locations = array(
        'main-menu'   => 'منوی اصلی',
        'footer-menu'   => 'منوی فوتر',
        'mobile-menu'   => 'منوی موبایل',
    );
    register_nav_menus($locations);

}
add_action('init', 'theme_setup');



add_filter('woocommerce_comment_pagination_args', function ($data) {
    $data = array_merge($data, ['base' => get_the_permalink() . 'discussions/comment-page-%#%']);
    return $data;
});
