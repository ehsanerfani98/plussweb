<div class="row">
    <div class="col-12 px-0">
        <div class="header-home">
            <div class="title">
                از فوق‌ مبتدی تا فوق‌ حرفه‌ای
            </div>
            <div class="content">
                دوره های جامع افزونه نویسی و طراحی قالب وردپرس
            </div>
            <div class="search-bar">
                <input type="text" placeholder="طراحی قالب وردپرس ، افزونه نویسی وردپرس ، افزونه های رایگان ، دوره های رایگان">
                <button><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
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
    <div class="owl-carousel card-product-slider owl-theme">
        <?php
        $posts = post_free_video_cache();
        if ($posts->have_posts()) :
            while ($posts->have_posts()) :
                $posts->the_post();
        ?>
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
        <?php
            endwhile;
            wp_reset_postdata();
            wp_reset_query();
        endif;
        ?>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
            <div class="list-title">
                <div class="list-icon">
                    <i class="fab fa-wordpress"></i>
                </div>
                <h4>دوره های حرفه ای وردپرس!</h4>
            </div>
        </div>
    </div>
    <div class="owl-carousel card-product-slider owl-theme">
        <?php
        $posts = all_product_cache();
        if ($posts->have_posts()) :
            while ($posts->have_posts()) :
                $posts->the_post();
        ?>
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
        <?php
            endwhile;
            wp_reset_postdata();
            wp_reset_query();
        endif;
        ?>
    </div>
</div>

<div class="container-fluid my-5">
    <div class="row">
        <div class="col-12">
            <div class="list-title">
                <div class="list-icon">
                    <i class="fa fa-newspaper"></i>
                </div>
                <h4>اخبار تکنولوژی های وب و طراحی سایت</h4>
            </div>
        </div>
    </div>
    <div class="owl-carousel card-product-slider owl-theme">
        <?php
        $posts = post_news_cache();
        if ($posts->have_posts()) :
            while ($posts->have_posts()) :
                $posts->the_post();
        ?>
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
        <?php
            endwhile;
            wp_reset_postdata();
            wp_reset_query();
        endif;
        ?>
    </div>
</div>