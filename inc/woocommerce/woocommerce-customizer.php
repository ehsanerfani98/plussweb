<?php

// remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


add_action('woocommerce_after_single_product_summary', 'add_custom_review');
function add_custom_review(){
    add_filter( 'comments_template', function() { return PLSWB_THEME_PATH . 'inc/woocommerce/comments/main.php'; }, 30 );
    comments_template();
}





