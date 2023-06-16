<?php if (have_comments()) : ?>
    <div class="card">
        <div class="content-card">

            <ol class="commentlist">
                <?php
                wp_list_comments([
                    'callback' => 'better_comments',
                    'reverse_top_level' => true
                ]);
                ?>
            </ol>

            <?php
            if (get_comment_pages_count() > 1 && get_option('page_comments')) :
                echo '<nav class="woocommerce-pagination">';
                paginate_comments_links(
                    apply_filters(
                        'woocommerce_comment_pagination_args',
                        array(
                            'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
                            'next_text' => is_rtl() ? '&larr;' : '&rarr;',
                            'type'      => 'list',
                        )
                    )
                );
                echo '</nav>';
            endif;
            ?>
        </div>
    </div>
<?php endif; ?>