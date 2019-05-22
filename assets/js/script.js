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

    $('[data-hover]').hover(function () {
        $(this).data('out', $(this).attr('src'));
        $(this).attr('src', $(this).data('hover'));
    }, function () {
        $(this).attr('src', $(this).data('out'));
    });

    $('.video-impulse').each(function () {
        $(this).prepend('<span class="circlephone" style="transform-origin: center;"></span><span class="circle-fill" style="transform-origin: center;"></span><span class="img-circle" style="transform-origin: center;"><span class="img-circleblock" style="transform-origin: center;"></span></span>');
    });

    var top_show = 200;
    var delay = 500;
    var headerHeight = 114;
    $(window).scroll(function () {
        if ($(this).scrollTop() > top_show)
            $("#top").fadeIn();
        else
            $("#top").fadeOut();
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > headerHeight / 2) {
            $("header .top-fixed").css('height', (headerHeight / 3 * 2) + 'px');
            $('.top-phone').css('top', '8px');
        } else {
            $("header .top-fixed").css('height', headerHeight + 'px');
            $('.top-phone').css('top', '45px');
        }
    });

    $("#top").click(function () {
        $("body, html").animate({
            scrollTop: 0
        }, delay);
    });

    $('body').on('click', '.scroll-link', function () {
        $("body, html").animate({
            scrollTop: $($(this).attr('href')).position().top - headerHeight
        }, delay);
        return false;
    });

    $('.price-caption-line ul').each(function () {
        $(this).find('li').each(function () {
            if ($(this).find('a').hasClass('active'))
                $(this).addClass('active')
        });
        let active = $(this).find('li.active').first();
        let slider = $(this).find('li').last();
        $(slider).width($(active).width());
        $(slider).css('left', $(active).position().left + 'px');
//        $(slider).position().left = $(active).position().left/* - +$(this).position().left*/;
//        $(slider).css({
//            left: (+$(active).position.left - $(this).position.left) + 'px'
//        });
    });

    $('.price-caption-line ul li a').click(function () {
        if (!$(this).parent().is(':last-child')) {
            $(this).parents('ul').find('li').removeClass('active');
            $(this).parent().addClass('active');
            let slider = $(this).parents('ul').find('li').last();
            $(slider).width($(this).parent().width());
            $(slider).css('left', $(this).parent().position().left + 'px');
            $('.caption-content').fadeOut('slow').removeClass('active');
            $($(this).attr('href')).fadeIn('fast').addClass('active');
        }
        return false;
    });

    $('.field-calcinputdataform-second label input[type=checkbox], .field-calcinputdataform-wall label input[type=checkbox]').change(function () {
        if ($(this).is(':checked')) {
            $(this).parent().addClass('checked');
        } else {
            $(this).parent().removeClass('checked');
        }
    });

    $('.calc form').on('click', 'input[type=submit]', function (event) {
        if ($('#calcinputdataform-address').val() === '' && $('#calcinputdataform-address_kladr').data('kladr-id') === '') {
//            event.preventDefault();
            $('#calcinputdataform-address').val($('#calcinputdataform-address_kladr').val());
        }
    });

});