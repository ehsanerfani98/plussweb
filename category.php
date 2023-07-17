<?php get_header() ?>
<div class="row">
    <div class="header-product-single" style="background-image: url('<?= PLSWB_THEME_ASSETS . 'images/icon-back-OWL.png' ?>');">
        <div class="title">
            <h1><?php the_title() ?></h1>
        </div>
        <?php woocommerce_breadcrumb() ?>
    </div>
</div>
<div class="container-fluid my-5">
    <div class="row">
        <div class="col-12">
            <div class="list-title">
                <div class="list-icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>
                <h4>دانش وردپرسی خودت رو منفجر کن!</h4>
            </div>
        </div>
    </div>
    <?php
    $args = [
        'post_type' => 'post',
        'posts_per_page' => 12,
        'post_status' => 'publish'
    ];
    $posts = new WP_Query($args);
    if ($posts->have_posts()) : ?>
        <div class="row">
            <?php
            while ($posts->have_posts()) :
                $posts->the_post();
            ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">

                    <a href="<?php the_permalink() ?>" class="card mt-4 mb-5 mx-2">
                        <div class="content-card p-2">
                            <div class="card-image-list">
                                <?php the_post_thumbnail('normal', ['loading' => 'lazy']) ?>
                            </div>
                            <div class="card-title-list">
                                <h2><?= mb_strlen(get_the_title())  > 65 ? mb_substr(get_the_title(), 0, 65) . '...' : get_the_title() ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            wp_reset_query();
            ?>

            <div class="col-12 my-3">
                <div class="pagination">
                    <?php the_posts_pagination(); ?>
                </div>
            </div>
        </div>
    <?php
    endif;
    ?>
</div>
<?php get_footer() ?>