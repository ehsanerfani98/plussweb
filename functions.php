<?php

if (!defined('ABSPATH')) {
    exit;
}

include 'constant.php';
include PLSWB_THEME_PATH . 'lib/codestar/codestar-framework.php';
include PLSWB_THEME_PATH . 'lib/codestar/options.php';
include PLSWB_THEME_PATH . 'inc/match_elementor.php';
include PLSWB_THEME_PATH . 'inc/match_woocommerce.php';
include PLSWB_THEME_PATH . 'inc/woocommerce/woocommerce-customizer.php';
include PLSWB_THEME_PATH . 'inc/init.php';
include PLSWB_THEME_PATH . 'inc/comment_template.php';
include PLSWB_THEME_PATH . 'inc/ajax.php';
include PLSWB_THEME_PATH . 'inc/script.php';


// add_action( 'template_redirect' , function(){
//     global $wp_rewrite;
//     print_r($wp_rewrite);
//     exit;
// });
