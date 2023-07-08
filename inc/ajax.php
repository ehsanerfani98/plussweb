<?php

add_action('wp_ajax_comment_woocommerce_ajax', 'comment_woocommerce_ajax');
add_action('wp_ajax_nopriv_comment_woocommerce_ajax', 'comment_woocommerce_ajax');
function comment_woocommerce_ajax()
{
    check_ajax_referer( 'special-check', 'security' );

    $productId = $_POST['product-id'];
    $message = $_POST['message-comment'];
    $rating = $_POST['rating'];
    $userId = '';
    if ($_POST['replyId']) $parent = $_POST['replyId'];
    else $parent = 0;
    
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    if (is_user_logged_in()) {
        $userId = get_current_user_id();
        $user = new WP_User($userId);
        $displayName = $user->display_name;
        $email = $user->user_email;
    } else {
        $firstName = $_POST['name-comment'];
        $email = $_POST['email-comment'];
        $displayName = $firstName;
    }
    
    $commentId = wp_insert_comment(array(
        'comment_post_ID'       =>  $productId,
        'comment_author'        =>  $displayName,
        'comment_author_email'  =>  $email,
        'comment_content'       =>  $message,
        'comment_type'          =>  'review',
        'comment_parent'        =>  $parent,
        'user_id'               =>  $userId,
        'comment_author_IP'     =>  $ip,
        'comment_approved'      =>  0,
    ));


    if (!$_POST['replyId']){
        if ($commentId) update_comment_meta($commentId, 'rating', $rating);
    }

    wp_send_json([
        'status' => 'ok'
    ]);
}


add_action('wp_ajax_comment_post_ajax', 'comment_post_ajax');
add_action('wp_ajax_nopriv_comment_post_ajax', 'comment_post_ajax');
function comment_post_ajax()
{
    check_ajax_referer( 'special-check', 'security' );

    $productId = $_POST['product-id'];
    $message = $_POST['message-comment'];
    $userId = '';
    if ($_POST['replyId']) $parent = $_POST['replyId'];
    else $parent = 0;
    
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    if (is_user_logged_in()) {
        $userId = get_current_user_id();
        $user = new WP_User($userId);
        $displayName = $user->display_name;
        $email = $user->user_email;
    } else {
        $firstName = $_POST['name-comment'];
        $email = $_POST['email-comment'];
        $displayName = $firstName;
    }
    
    $commentId = wp_insert_comment(array(
        'comment_post_ID'       =>  $productId,
        'comment_author'        =>  $displayName,
        'comment_author_email'  =>  $email,
        'comment_content'       =>  $message,
        'comment_type'          =>  'review',
        'comment_parent'        =>  $parent,
        'user_id'               =>  $userId,
        'comment_author_IP'     =>  $ip,
        'comment_approved'      =>  0,
    ));

    wp_send_json([
        'status' => 'ok'
    ]);
}
