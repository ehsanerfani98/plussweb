jQuery(document).ready(function ($) {

    $('#stars .star').on('mouseover', function () {
        var onStar = parseInt($(this).data('value'), 10);
        $(this).parent().children('li.star').each(function (e) {
            if (e < onStar) {
                $(this).addClass('hover');
            } else {
                $(this).removeClass('hover');
            }
        });
    }).on('mouseout', function () {
        $(this).parent().children('li.star').each(function (e) {
            $(this).removeClass('hover');
        });
    });

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
        if (event.matches) {
            $('path').attr('stroke', '#d9eee1');
        } else {
            $('path').attr('stroke', '#292D32');
        }
    });


    let copyText = document.querySelector(".copy-text");
    copyText.querySelector("button").addEventListener("click", function () {
        let input = copyText.querySelector("input.text");
        input.select();
        document.execCommand("copy");
        copyText.classList.add("active");
        window.getSelection().removeAllRanges();
        setTimeout(function () {
            copyText.classList.remove("active");
        }, 2500);
    });


    $('.reply').click(function () {
        var comment_id = $(this).parent().find('.comment-id').val();
        $('input[name="replyId"]').val(comment_id);
    });

});


function plswbAlert(message, status, duration) {
    if (status == 'success') {
        status = 'plswb-alert-success';
    } else if (status == 'danger') {
        status = 'plswb-alert-danger';
    }

    jQuery('.plswb-alert').addClass(status + ' plswb-show-alert').text(message);
    setTimeout(() => {
        jQuery('.plswb-alert').removeClass(status + ' plswb-show-alert')
    }, duration);
}