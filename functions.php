<?php

if (!defined('ABSPATH')) {
    exit;
}

include 'constant.php';
include PLSWB_THEME_PATH . 'inc/init.php';
include PLSWB_THEME_PATH . 'lib/codestar/codestar-framework.php';
include PLSWB_THEME_PATH . 'lib/codestar/options.php';
include PLSWB_THEME_PATH . 'inc/helper.php';
include PLSWB_THEME_PATH . 'inc/caching.php';
include PLSWB_THEME_PATH . 'inc/match_elementor.php';
include PLSWB_THEME_PATH . 'inc/match_woocommerce.php';
include PLSWB_THEME_PATH . 'inc/woocommerce/woocommerce-customizer.php';
include PLSWB_THEME_PATH . 'inc/woocommerce/comments/custom_list_comments.php';
include PLSWB_THEME_PATH . 'template-parts/comments-post/custom_list_comments.php';
include PLSWB_THEME_PATH . 'inc/ajax.php';
include PLSWB_THEME_PATH . 'inc/script.php';


// add_action( 'template_redirect' , function(){
//     global $wp_rewrite;
//     print_r($wp_rewrite);
//     exit;
// });


// add_action('rest_api_init', 'create_routes');
// function create_routes()
// {
//     register_rest_route('post', 'get_new_posts', [
//         'methods' => 'GET',
//         'callback' => 'get_post_new'
//     ]);
// }

// function get_post_new(WP_REST_Request $request){
//     $post = get_post(1);
// 	$array = [
// 		'title' => $post->post_title,
// 		'link' => get_the_permalink(1),
// 		'content' => $post->post_content
// 	];

// 	return new WP_REST_Response($array, 200);
// }
function display_custom_download_link() {
    global $product;

    $download_link = get_post_meta( $product->get_id(), 'pa_download_link', true );

    if ( ! empty( $download_link ) ) {
        echo '<p><strong>لینک دانلود:</strong> <a href="' . esc_url( $download_link ) . '">دانلود</a></p>';
    }
}
add_action( 'woocommerce_single_product_summary', 'display_custom_download_link', 25 );
