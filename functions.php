<?php

if (!defined('ABSPATH')) {
    exit;
}

include 'constant.php';
include PLSWB_THEME_PATH.'inc/match_elementor.php';
include PLSWB_THEME_PATH.'inc/match_woocommerce.php';
include PLSWB_THEME_PATH.'inc/woocommerce-customizer.php';



// ajax php send new comment
// $type = $_POST['type'];
// $postId = $_POST['postId'];
// $content = $_POST['content'];
// $userId = $_POST['userId'];
// if ($_POST['replyId']) $parent = $_POST['replyId'];
// else $parent = 0;

// if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//     $ip = $_SERVER['HTTP_CLIENT_IP'];
// } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
// } else {
//     $ip = $_SERVER['REMOTE_ADDR'];
// }

// if ($type == 'user') {
//     $user = new WP_User($userId);
//     $displayName = $user->display_name;
//     $email = $user->user_email;
// } elseif ($type == 'guest') {
//     $firstName = $_POST['firstName'];
//     $lastName = $_POST['lastName'];
//     $email = $_POST['email'];
//     $displayName = $firstName . ' ' . $lastName;
// }

// $commentId = wp_insert_comment(array(
//     'comment_post_ID'       =>  $postId,
//     'comment_author'        =>  $displayName,
//     'comment_author_email'  =>  $email,
//     'comment_content'       =>  $content,
//     'comment_parent'        =>  $parent,
//     'user_id'               =>  $userId,
//     'comment_author_IP'     =>  $ip,
//     'comment_approved'      =>  0,
// ));


//ajax javascript
// var KTProductCommentSubmit = (function () {
//     var t, e, i;
//     return {
//         init: function () {
//             (i = document.querySelector("#kt_product_submit_comment_form")),
//                 (t = document.getElementById("kt_product_comment_submit")),
//                 (e = FormValidation.formValidation(i, {
//                     fields: {
//                         rating: { validators: { callback: { callback: checkRating } } },
//                         comment: { validators: { notEmpty: { message: "متن دیدگاه خود را وارد نمایید" } } },
//                         first_name: { validators: { notEmpty: { message: "نام مورد نیاز است" } } },
//                         email: { validators: { notEmpty: { message: "آدرس ایمیل مورد نیاز است" }, emailAddress: { message: "ایمیل وارد شده معتبر نیست" } } },
//                     },
//                     plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
//                 })),
//                 t.addEventListener("click", function (i) {
//                     i.preventDefault(),
//                         e &&
//                         e.validate().then(function (e) {
//                             "Valid" == e
//                                 ? (t.setAttribute("data-kt-indicator", "on"),
//                                     (t.disabled = !0),
//                                     userId = t.getAttribute('data-comment-author-id'),
//                                     productId = t.getAttribute('data-product-id'),
//                                     content = document.getElementsByName("comment")[0].value,
//                                     rating = document.querySelector('input[name="rating"]:checked').value,
//                                     replyId = document.querySelector('.reply-alert').getAttribute('data-reply-to'),
//                                     userId == 0
//                                         ? (
//                                             firstName = document.getElementsByName("first_name")[0].value,
//                                             lastName = document.getElementsByName("last_name")[0].value,
//                                             email = document.getElementsByName("email")[0].value,
//                                             $.ajax({
//                                                 url: templateDirectory + '/ajax/post-product-comment.php',
//                                                 type: 'POST',
//                                                 data: { type: 'guest', productId: productId, userId: userId, firstName: firstName, lastName: lastName, email: email, content: content, rating: rating, replyId: replyId },
//                                                 success: function () {
//                                                     t.removeAttribute("data-kt-indicator");
//                                                     t.disabled = !1;
//                                                     t.isConfirmed;
//                                                     Swal.fire({
//                                                         text: "دیدگاه شما با موفقیت ثبت شد و پس از تایید توسط مدیریت وب سایت نمایش داده خواهد شد.",
//                                                         icon: "success",
//                                                         buttonsStyling: !1,
//                                                         confirmButtonText: "متوجه شدم!",
//                                                         customClass: { confirmButton: "btn btn-primary" },
//                                                     });
//                                                     $("#kt_product_submit_comment_form").trigger('reset');
//                                                 }
//                                             })
//                                         )
//                                         : (
//                                             $.ajax({
//                                                 url: templateDirectory + '/ajax/post-product-comment.php',
//                                                 type: 'POST',
//                                                 data: { type: 'user', productId: productId, userId: userId, content: content, rating: rating, replyId: replyId },
//                                                 success: function () {
//                                                     t.removeAttribute("data-kt-indicator");
//                                                     t.disabled = !1;
//                                                     t.isConfirmed;
//                                                     Swal.fire({
//                                                         text: "دیدگاه شما با موفقیت ثبت شد و پس از تایید توسط مدیریت وب سایت نمایش داده خواهد شد.",
//                                                         icon: "success",
//                                                         buttonsStyling: !1,
//                                                         confirmButtonText: "متوجه شدم!",
//                                                         customClass: { confirmButton: "btn btn-primary" },
//                                                     });
//                                                     $("#kt_product_submit_comment_form").trigger('reset');
//                                                 }
//                                             })
//                                         )
//                                 )
//                                 : Swal.fire({
//                                     text: "با عرض پوزش، برخی اطلاعات وارد شده صحیح نمی باشند، لطفا دوباره تلاش کنید.",
//                                     icon: "error",
//                                     buttonsStyling: !1,
//                                     confirmButtonText: "متوجه شدم!",
//                                     customClass: { confirmButton: "btn btn-primary" },
//                                 })
//                         });
//                 });
//         },
//     };
// })()