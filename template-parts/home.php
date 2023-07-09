<div class="container">
    <div class="row">
        <?php
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 4,
            'post_status' => 'publish'
        ];

        $posts = new WP_Query($args);
        if ($posts->have_posts()) :
            while ($posts->have_posts()) :
                $posts->the_post();
        ?>
                <div class="col-lg-3">
                    <a href="<?php the_permalink() ?>" class="card">
                        <div class="content-card">
                            <div class="card-image-list">
                                <?php the_post_thumbnail() ?>
                            </div>
                            <div class="card-title-list">
                                <?php the_title() ?>
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
</div>