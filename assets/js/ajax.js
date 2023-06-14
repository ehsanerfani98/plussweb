jQuery(document).ready(function ($) {

    var onStar = '';
    $('#stars .star').on('click', function () {
        onStar = parseInt($(this).data('value'), 10);
        var stars = $(this).parent().children('li.star');
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }
        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }
    });

    $('#btn-comment-woocommerce').click(function () {

        if (onStar == '') {
            alert('یک امتیاز برای این دوره انتخاب کنید');
            return;
        }

        var product_id = $('#product-id').val();
        var message = $('#message-comment').val();
        var email = $('#email-comment').val();
        var name = $('#name-comment').val();
        var rating = onStar;

        $.ajax({
            type: "post",
            url: ajax_setup_plswb,
            data: {
                security: ajax_nonce,
                action: 'comment_woocommerce_ajax',
                productId: product_id,
                email: email,
                name: name,
                message: message,
                rating: rating,
            },
            success: function (response) {
                if(response.status == 'ok'){
                    alert('دیدگاه شما با موفقیت ثبت شد');
                }
            }
        });
    });
});