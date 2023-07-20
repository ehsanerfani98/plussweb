<?php

function all_product_cache(){
    $cache_key = 'all_product_cache';
    $result = get_transient($cache_key);
    if($result === false){
        $args = [
            'post_type' => 'product',
            'posts_per_page' => 6,
            'post_status' => 'publish'
        ];
        $result = new WP_Query($args);
        set_transient($cache_key, $result, 5 * MINUTE_IN_SECONDS);
    }
    return $result;
}