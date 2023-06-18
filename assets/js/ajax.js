jQuery(document).ready(function ($) {

    var onStar = '';
    $('.stars .star').on('click', function () {
        onStar = parseInt($(this).data('value'), 10);
        var stars = $(this).parent().children('li.star');
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }
        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }
    });

    $('#newcomment').on('hidden.bs.modal', function (e) {
        onStar = '';
        $('.star').removeClass('selected');
    })

    $('.comment-form').submit(function (e) {
        e.preventDefault();


        if (!$(this).find('.replyId').hasClass('replyId')) {
            if (onStar == '') {
                alert('یک امتیاز برای این دوره انتخاب کنید');
                return;
            }
        }

        $('.card-loading').addClass('d-flex');

        var dataForm = $(this).serializeArray();
        var postData = new FormData();
        $.each(dataForm, function (i, val) {
            postData.append(val.name, val.value);
        });
        postData.append('action', 'comment_woocommerce_ajax');
        postData.append('security', ajax_nonce);
        postData.append('rating', onStar);

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
                    if (!$(this).find('.replyId').hasClass('replyId')) {
                        plswbAlert('پرسش شما با موفقیت ثبت شد', 'success' , 3000);
                    }else{
                        plswbAlert('دیدگاه شما با موفقیت ثبت شد', 'success' , 3000);
                    }
                }
            }
        });
    });

});