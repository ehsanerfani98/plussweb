<?php

add_action('init', 'add_discuss_slug');
function add_discuss_slug()
{
    add_rewrite_rule(
        'product/([^/]+)/discussions/?$',
        'index.php?product=$matches[1]&pagename=discussions',
        'top'
    );
    flush_rewrite_rules();
}
