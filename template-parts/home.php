<div class="row my-5">
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
            <div class="col-lg-4">
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
            </div>
    <?php
        endwhile;
        wp_reset_postdata();
        wp_reset_query();
    endif;
    ?>
</div>