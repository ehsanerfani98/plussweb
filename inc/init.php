<?php

add_action('init', 'add_discuss_slug');
function add_discuss_slug()
{
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
}

add_filter('woocommerce_comment_pagination_args', function ($data) {
    $data = array_merge($data, ['base' => get_the_permalink() . 'discussions/comment-page-%#%']);
    return $data;
});
