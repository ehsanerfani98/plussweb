<?php if (have_comments()) : ?>

    <div class="card" id="comments">
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



    <!-- Modal-Reply -->
    <div class="modal fade" id="replyComment" tabindex="-1" role="dialog" aria-labelledby="newcommentTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" class="comment-form">
                    <div class="card">
                    <div class="card-loading"><span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span></div>
                        <div class="content-card">
                            <div class="row">
                                <?php if (!is_user_logged_in()) : ?>
                                    <div class="col-lg-6 mb-4">
                                        <input name="name-comment" type="text" class="form-control" placeholder="نام">
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <input name="email-comment" type="email" class="form-control" placeholder="ایمیل">
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-12">
                                    <textarea name="message-comment" class="form-control" rows="5" placeholder="متن پرسش"></textarea>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <input type="hidden" name="product-id" value="<?= get_the_ID() ?>">
                                    <input type="hidden" class="replyId" name="replyId" value="">
                                    <button type="submit" class="btn-primary">ارسال نظر</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php endif; ?>