<?php

function custom_list_comments_post($comment, $args, $depth)
{
    $user = get_userdata($comment->user_id);
    if (!empty($user) && $user) {
        if ($user->roles[0] == 'administrator' || $user->roles[0] == 'shop_manager') {
            $label = 'مدیر سایت';
            $bg_admin_comment = 'bg-admin-comment';
            $status_label = 'status-label-color-admin';
            $status = 'admin';
        } else if ($user->roles[0] == 'subscriber') {
            $label = 'کاربر پلاس وب';
            $bg_admin_comment = '';
            $status_label = 'status-label-color-customer';
        }
    } else {
        $label = 'مـهــمان';
        $bg_admin_comment = '';
        $status_label = 'status-label-color-user';
    }

    $comment_id = get_comment_ID();
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
