<?php

function custom_list_comments($comment, $args, $depth)
{
    $user = get_userdata($comment->user_id);
    $status = '';
    if (!empty($user) && $user) {
        if ($user->roles[0] == 'administrator' || $user->roles[0] == 'shop_manager') {
            $label = 'مدیر سایت';
            $bg_admin_comment = 'bg-admin-comment';
            $status_label = 'status-label-color-admin';
            $status = 'admin';
        } else if ($user->roles[0] == 'customer') {
            $label = 'خـــریـدار';
            $bg_admin_comment = '';
            $status_label = 'status-label-color-customer';
        }
    } else {
        $label = 'مـهــمان';
        $bg_admin_comment = '';
        $status_label = 'status-label-color-user';
    }

    $comment_id = get_comment_ID();
    $rating = get_comment_meta($comment_id, 'rating', true);
?>
    <div class="plswb-comment <?= $bg_admin_comment ?> mb-4" style="margin-right: <?= $depth == 1 ? 0 : $depth * 20 ?>px;">
        <div class="label-role <?= $status_label ?>">
            <?= $label  ?>
        </div>
        <div class="title">
            <div class="header-comment">
                <div class="profile">
                    <?php echo get_avatar($comment, $size = '50'); ?>
                </div>
                <div class="name">
                    <?php comment_author() ?>
                </div>
            </div>
            <?php if ($status != 'admin' && $depth == 1) : ?>
                <div class="rate">
                    <div class="rating-section justify-content-start">
                        <div class="rating-stars">
                            <ul id="stars">
                                <li class="star-rated <?= $rating >= 1 ? 'selected' : '' ?>">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                                <li class="star-rated <?= $rating >= 2 ? 'selected' : '' ?>">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                                <li class="star-rated <?= $rating >= 3 ? 'selected' : '' ?>">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                                <li class="star-rated <?= $rating >= 4 ? 'selected' : '' ?>">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                                <li class="star-rated <?= $rating >= 5 ? 'selected' : '' ?>">
                                    <i class="fa fa-star fa-fw"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="content mt-2">
            <?php comment_text() ?>
        </div>
        <div class="comment-option">
            <input type="hidden" class="comment-id" value="<?= $comment_id ?>">
            <button type="button" class="btn-light reply" data-bs-toggle="modal" data-bs-target="#replyComment">پاسخ</button>
            <?php comment_date() ?>
        </div>
    </div>
<?php
}
