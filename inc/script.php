<?php

add_action('wp_head', 'header_scripts');
function header_scripts()
{
?>

    <script>
        var ajax_setup_plswb = '<?= admin_url('admin-ajax.php'); ?>';
        var ajax_nonce = '<?= wp_create_nonce("special-check") ?>';
    </script>

    <?php if (is_singular('product')) : ?>
        <?php $maktabyar_theme_options = get_option('PLSWB_MAKTABYAR_SETTINGS', true); ?>
        <?php if (!$maktabyar_theme_options['opt-product-display-rating-comments']) : ?>
            <script>
                var is_rating_product = <?= $maktabyar_theme_options['opt-product-display-rating-comments']; ?>;
            </script>
        <?php else : ?>
            <script>
                var is_rating_product = 1;
            </script>
        <?php endif; ?>
    <?php endif; ?>

<?php
}


add_action('wp_footer', 'footer_scripts');
function footer_scripts()
{
?>

<?php
}


function admin_enqueue_scripts($hook) {

    if($_GET['page'] == 'PLSWB_MAKTABYAR_SETTINGS'){
        wp_register_style('style', PLSWB_THEME_ASSETS . 'css/codestar-style.css');
        wp_enqueue_style('style');    
    }
   
}

add_action('admin_enqueue_scripts', 'admin_enqueue_scripts');


add_action('wp_enqueue_scripts', 'theme_scripts');
function theme_scripts()
{

    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css');
    wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_register_style('font-awesome2', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css');
    wp_register_style('style', PLSWB_THEME_ASSETS . 'css/style.css');
    // wp_register_style('responsive', PLSWB_THEME_ASSETS . 'css/responsive.css');

    wp_enqueue_style('bootstrap');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('font-awesome2');

    wp_enqueue_style('style');
    // wp_enqueue_style('responsive');

    wp_register_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js', array("jquery"), "1.0.0", true);
    wp_register_script('lottie-player', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', array(), "", true);
    wp_register_script('plswb-script', PLSWB_THEME_ASSETS . 'js/script.js', [], "1.0.0", true);
    wp_register_script('plswb-ajax', PLSWB_THEME_ASSETS . 'js/ajax.js', [], "1.0.0", true);

    wp_enqueue_script('bootstrap-bundle');
    wp_enqueue_script('lottie-player');
    wp_enqueue_script('plswb-script');
    wp_enqueue_script('plswb-ajax');

    // if (is_singular('product')) {
    //     wp_enqueue_style('pgwslideshow');
    //     wp_enqueue_script('pgwslideshow');
    // }

}
