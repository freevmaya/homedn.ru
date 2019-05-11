$(function () {
    $('.list ul li').each(function () {
        let content = $(this).html();
        $(this).html('<span>' + content + '</span>');
    });

    $('.price-caption-line ul').each(function () {
        $(this).find('li').first().addClass('active');
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

    $('.more-review').click(function () {
        $(this).parent().hide();
        $('.review-list.closed').fadeIn('slow').removeClass('closed');
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