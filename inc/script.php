<?php

add_action('wp_head', 'header_scripts');
function header_scripts()
{
    if (is_single() || is_page()) {
        $des = esc_attr(get_the_content());
        if (is_cart()) {
            $des = 'سبد خرید';
        }
        echo '<meta name="description" content="' .  $des . '" />' . "\n";
    } elseif (is_category() || is_product_category()) {
        echo '<meta name="description" content="' .  get_the_archive_title() . '" />' . "\n";
    } else {
        echo '<meta name="description" content="' . esc_attr(get_bloginfo('description')) . '" />' . "\n";
    }
?>
    <?php if (is_singular()) : ?>
        <link rel="canonical" href="<?= get_permalink() ?>" />
        <meta property="og:title" content="<?php the_title() ?>" />
        <meta property="og:description" content="<?= strip_tags(get_the_excerpt()) ?>" />
        <meta property="og:image" content="<?= get_the_post_thumbnail_url() ?>" />
    <?php endif; ?>
    <?php if (is_home()) : ?>
        <link rel="canonical" href="<?= home_url() ?>" />
    <?php endif; ?>
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


    <?php if (is_singular('post')) : ?>
        <?php
        $maktabyar_post_options = get_post_meta(get_the_ID(), 'PLSWB_POST_OPTION', true);
        the_post();

        ?>

        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BlogPosting",
                "headline": "<?= get_the_title() ?>",
                "author": "<?= get_the_author() ?>",
                "url": "<?= get_the_permalink() ?>",
                "editor": "<?= get_the_author() ?>",
                "description": "<?= get_the_excerpt() ?>",
                "articleBody": "<?= get_the_excerpt() ?>",
                "datePublished": "<?= get_the_date() ?>",
                "category": "<?php foreach ((get_the_category()) as $category) {
                                    $postcat = $category->cat_ID;
                                    $catname = $category->cat_name;
                                    echo $catname . ',';
                                } ?>",
                "image": "<?= get_the_post_thumbnail_url() ?>",
                "video": "https://www.youtube.com/embed/<?= $maktabyar_post_options['opt-youtube-video-code'] ?>"
            }
        </script>
    <?php endif; ?>

<?php
}


add_action('wp_footer', 'footer_scripts');
function footer_scripts()
{
?>

<?php
}


function admin_enqueue_scripts($hook)
{
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'PLSWB_MAKTABYAR_SETTINGS') {
            wp_register_style('style', PLSWB_THEME_ASSETS . 'css/codestar-style.css');
            wp_enqueue_style('style');
        }
    }
}

add_action('admin_enqueue_scripts', 'admin_enqueue_scripts');


add_action('wp_enqueue_scripts', 'theme_scripts');
function theme_scripts()
{

    wp_register_style('bootstrap', PLSWB_THEME_ASSETS . 'css/bootstrap.min.css');
    wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_register_style('font-awesome2', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css');
    wp_register_style('owl-carousel', PLSWB_THEME_ASSETS . 'css/owl.carousel.css');
    wp_register_style('owl-theme-default', PLSWB_THEME_ASSETS . 'css/owl.theme.default.css');
    wp_register_style('style', PLSWB_THEME_ASSETS . 'css/style.css');
    wp_register_style('responsive', PLSWB_THEME_ASSETS . 'css/responsive.css');

    wp_enqueue_style('bootstrap');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('font-awesome2');
    wp_enqueue_style('owl-carousel');
    wp_enqueue_style('owl-theme-default');


    wp_enqueue_style('style');
    wp_enqueue_style('responsive');

    wp_register_script('bootstrap-bundle', PLSWB_THEME_ASSETS . 'js/bootstrap.min.js', array("jquery"), "1.0.0", true);
    wp_register_script('owl-carousel', PLSWB_THEME_ASSETS . 'js/owl.carousel.min.js', array("jquery"), "1.0.0", true);
    wp_register_script('numtopersian', PLSWB_THEME_ASSETS . 'js/numtopersian.js', array("jquery"), "1.0.0", true);
    wp_register_script('plswb-script', PLSWB_THEME_ASSETS . 'js/script.js', [], "1.0.0", true);
    wp_register_script('plswb-ajax-comment-product', PLSWB_THEME_ASSETS . 'js/ajax-comment-product.js', [], "1.0.0", true);
    wp_register_script('plswb-ajax-comment-post', PLSWB_THEME_ASSETS . 'js/ajax-comment-post.js', [], "1.0.0", true);
    wp_register_script('plswb-copy', PLSWB_THEME_ASSETS . 'js/copy.js', [], "1.0.0", true);
    wp_register_script('plswb-single-product', PLSWB_THEME_ASSETS . 'js/single-product.js', [], "1.0.0", true);

    wp_enqueue_script('bootstrap-bundle');
    wp_enqueue_script('owl-carousel');
    wp_enqueue_script('numtopersian');
    wp_enqueue_script('plswb-script');

    if (is_singular('product')) {
        wp_enqueue_script('plswb-copy');
        wp_enqueue_script('plswb-single-product');
        wp_enqueue_script('plswb-ajax-comment-product');
    }

    if (is_singular('post')) {
        wp_enqueue_script('plswb-copy');
        wp_enqueue_script('plswb-ajax-comment-post');
    }

    // if (is_singular('product')) {
    //     wp_enqueue_style('pgwslideshow');
    //     wp_enqueue_script('pgwslideshow');
    // }

}
