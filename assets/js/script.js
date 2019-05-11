$(function () {

    $('.himenu-open').click(function () {
        $('.top-hidden').slideToggle('slow');
        return false;
    });

    $('.checkbox-label input[type=checkbox]').change(function () {
        $(this).parent().toggleClass('checked');
    });

    $('.checkbox-label').each(function () {
        if ($(this).find('input[type=checkbox]').is(':checked')) {
            $(this).addClass('checked');
        }
    });

    $('[data-back]').each(function () {
        $(this).css('background-image', 'url(\'' + $(this).data('back') + '\')');
    });
    
    $('.video-impulse').each(function(){
        $(this).prepend('<span class="circlephone" style="transform-origin: center;"></span><span class="circle-fill" style="transform-origin: center;"></span><span class="img-circle" style="transform-origin: center;"><span class="img-circleblock" style="transform-origin: center;"></span></span>');
    });
    
    var top_show = 200;
    var delay = 500;
    $(window).scroll(function () {
        if ($(this).scrollTop() > top_show)
            $("#top").fadeIn();
        else
            $("#top").fadeOut();
    });

    $("#top").click(function () {
        $("body, html").animate({
            scrollTop: 0
        }, delay);
    });

});