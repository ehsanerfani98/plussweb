jQuery(document).ready(function ($) {

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
        if (event.matches) {
            $('path').attr('stroke', '#d9eee1');
        } else {
            $('path').attr('stroke', '#292D32');
        }
    });

    $('.carousel').carousel();

    $(".card-product-slider").owlCarousel({
        responsive: { 0: { items: 1, }, 600: { items: 2, }, 768: { items: 3, }, 1200: { items: 4, }, },
        loop: true,
        nav: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        margin: 20,
        autoplay: true,
        autoplaySpeed: 1500,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        rtl: true,
        center: false,
        dots: false,
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


