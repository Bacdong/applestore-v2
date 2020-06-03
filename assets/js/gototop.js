var conditionShowGoToTop = 360;

$(window).scroll(function() {
    if ($(this).scrollTop() >= conditionShowGoToTop) {
        $('#btn-go-to-top').css('display', 'flex');
        $('#btn-go-to-top').fadeIn();
    } else {
        $('#btn-go-to-top').fadeOut();
    }
});

$('#btn-go-to-top').click(function() {
    $('html, body').animate({ scrollTop: 0}, 'slow');
});