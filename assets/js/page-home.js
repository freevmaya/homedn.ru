$(function () {
    $('.list ul li').each(function () {
        let content = $(this).html();
        $(this).html('<span>' + content + '</span>');
    });

    $('.more-review').click(function () {
        $(this).parent().hide();
        $('.review-list.closed').fadeIn('slow').removeClass('closed');
        return false;
    });

});