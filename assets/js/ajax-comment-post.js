jQuery(document).ready(function ($) {


    $('.comment-form').submit(function (e) {
        e.preventDefault();

        $('.card-loading').addClass('d-flex');

        var dataForm = $(this).serializeArray();
        var postData = new FormData();
        $.each(dataForm, function (i, val) {
            postData.append(val.name, val.value);
        });
        postData.append('action', 'comment_post_ajax');
        postData.append('security', ajax_nonce);

        $.ajax({
            type: "post",
            url: ajax_setup_plswb,
            data: postData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                if (response.status == 'ok') {
                    $('.card-loading').removeClass('d-flex');
                    $('#newcomment').modal('hide');
                    $('#replyComment').modal('hide');
                    $(".comment-form").trigger('reset');
                    onStar = '';
                    $('.star').removeClass('selected');
                    if (!$('.comment-form').find('.replyId').hasClass('replyId')) {
                        plswbAlert('پرسش شما با موفقیت ثبت شد', 'success' , 3000);
                    }else{
                        plswbAlert('دیدگاه شما با موفقیت ثبت شد', 'success' , 3000);
                    }
                }
            }
        });
    });

    $('.reply').click(function () {
        var comment_id = $(this).parent().find('.comment-id').val();
        $('input[name="replyId"]').val(comment_id);
    });

});