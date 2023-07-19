<?php

function get_similar_posts_by_tags()
{
    $post_tags = wp_get_post_tags(get_the_ID(), array('fields' => 'ids'));

    if (empty($post_tags)) {
        return array();
    }

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'post_tag',
                'field' => 'id',
                'terms' => $post_tags, 
                'operator' => 'IN',
            ),
        ),
    );

    $similar_posts = get_posts($args);

    return $similar_posts;
}
