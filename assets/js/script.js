jQuery(document).ready(function ($) {

   

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
        if (event.matches) {
            $('path').attr('stroke', '#d9eee1');
        } else {
            $('path').attr('stroke', '#292D32');
        }
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