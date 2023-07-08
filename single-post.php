<?php get_header();

wp_die(get_the_author_nickname());

?>
<?php $maktabyar_post_options = get_post_meta(get_the_ID(), 'PLSWB_POST_OPTION', true); ?>

<div class="row">
    <div class="header-product-single" style="background-image: url('<?= PLSWB_THEME_ASSETS . 'images/icon-back-OWL.png' ?>');">
        <div class="title">
            <h1><?php the_title() ?></h1>
        </div>
        <?php woocommerce_breadcrumb() ?>
    </div>
</div>

<div class="row p-lg-5 p-md-5">

    <div class="col-12 col-sm-12 col-md-12 col-lg-8">

        <?php if ($maktabyar_post_options['opt-show-youtube-video']) :  ?>
            <?php if (!empty($maktabyar_post_options['opt-youtube-video-code'])) :  ?>
                <div class="video-card mt-4 mt-lg-0">
                    <iframe title="<?php the_title() ?>" src="https://www.youtube.com/embed/<?= $maktabyar_post_options['opt-youtube-video-code']  ?>" width="100%" height="450" frameborder="0" allowfullscreen="allowfullscreen" data-mce-fragment="1"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start"></span><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start"></span><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start"></span></iframe>
                    <!-- <video width="100%" poster="https://plussweb.ir/wp-content/uploads/2023/03/thumbnail-youtube.png" controls>
                <source type="video/mp4" src="https://plussweb.ir/wp-content/uploads/2023/03/Rec-0004.mp4">
            </video> -->
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="video-card mt-4 mt-lg-0">
                <?php the_post_thumbnail() ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="content-card">
                <?php the_content() ?>
            </div>
        </div>


        <!-- comment -->
        <?php
        add_filter('comments_template', function () {
            return PLSWB_THEME_PATH . 'template-parts/comments-post/main.php';
        }, 20);
        comments_template();
        ?>
        <!-- comment -->


    </div>

    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
        <div class="sidebar">
            <div class="card-v2">
                <div class="content-card">

                </div>
            </div>
        </div>

    </div>
</div>
<?php get_footer() ?>