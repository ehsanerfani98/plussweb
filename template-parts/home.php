<div class="row">
    <div class="col-12 px-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://plussweb.ir/wp-content/uploads/2023/07/ley4.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://plussweb.ir/wp-content/uploads/2023/07/youtube-alert-1.png" alt="Second slide">
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">بلی</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">بعدی</span>
        </a>
    </div>
</div>

<div class="row my-5">

    <div class="owl-carousel card-product-slider owl-theme">
        <?php
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 6,
            'post_status' => 'publish'
        ];
        $posts = new WP_Query($args);
        if ($posts->have_posts()) :
            while ($posts->have_posts()) :
                $posts->the_post();
        ?>
                <a href="<?php the_permalink() ?>" class="card">
                    <div class="content-card p-2">
                        <div class="card-image-list">
                            <?php the_post_thumbnail() ?>
                        </div>
                        <div class="card-title-list">
                            <h2><?php the_title() ?></h2>
                        </div>
                    </div>
                </a>
        <?php
            endwhile;
            wp_reset_postdata();
            wp_reset_query();
        endif;
        ?>
    </div>

</div>