<div class="row">
    <div class="col-12 px-0">
       <div class="header-home">
            <div class="title">
            از فوق‌ مبتدی تا فوق‌ حرفه‌ای

            </div>
            <div class="content">
            شما هم اکنون به بیش از ۷ هزار ویدئوی آموزشی به زبان فارسی دسترسی دارید…

            </div>
            <div class="search-bar">
                <input type="text" placeholder="جستجو در آموزش‌های برنامه‌نویسی - هک و امنیت - گرافیک - پایگاه داده - بازی سازی - سئو ">
                <button><i class="fa fa-search"></i></button>
            </div>
       </div>
    </div>
</div>

<div class="container-fluid my-5">
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