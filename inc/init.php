<?php

add_action('init', 'add_discuss_slug');
function add_discuss_slug()
{
    add_rewrite_rule(
        'product/([^/]+)/discuss/?$',
        'index.php?product=$matches[1]&pagename=discuss',
        'top'
    );
    flush_rewrite_rules();
}
