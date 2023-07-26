$(document).ready(function() {
    $('.ost-more').click(function() {
        $(this).parent().children('.more-list').slideToggle();
        $(this).hide();
        $('.collapse-btn').show();
    });
    $('.collapse-btn').click(function() {
        $(this).parent().children('.more-list').slideToggle();
        $(this).hide();
        $('.ost-more').show();
    });
});