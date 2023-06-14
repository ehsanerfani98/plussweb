<?php

// remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);
add_action('woocommerce_before_single_product', 'plswb_breadcrumb');

function plswb_breadcrumb()
{
?>
    <div class="row">
        <div class="header-product-single" style="background-image: url('<?= PLSWB_THEME_ASSETS . 'images/icon-back-OWL.png' ?>');">
            <div class="title">
                <h1><?php the_title() ?></h1>
            </div>
            <?php woocommerce_breadcrumb() ?>
        </div>
    </div>
    
<?php woocommerce_output_all_notices() ?>
<?php
};
