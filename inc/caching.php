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
        set_transient($cache_key, $result, 24 * 60 * MINUTE_IN_SECONDS);
    }
    return $result;
}

function post_free_video_cache(){
    $cache_key = 'post_free_video_cache';
    $result = get_transient($cache_key);
    if(false === false){
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 6,
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => 16
                 )
              )
        ];
        $result = new WP_Query($args);
        set_transient($cache_key, $result, 24 * 60 * MINUTE_IN_SECONDS);
    }
    return $result;
}

function post_news_cache(){
    $cache_key = 'post_news_cache';
    $result = get_transient($cache_key);
    if($result === false){
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 6,
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => 108
                 )
              )
        ];
        $result = new WP_Query($args);
        set_transient($cache_key, $result, 24 * 60 * MINUTE_IN_SECONDS);
    }
    return $result;
}