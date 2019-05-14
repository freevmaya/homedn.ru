$(function () {
    var top_show = 150;
    $(window).scroll(function () {
        if ($(this).scrollTop() > top_show)
            $(".element-nav").addClass('fixed');
        else
            $(".element-nav").removeClass('fixed');
    });
});