$(function () {

    $('.color-line li .color').each(function () {
        $(this).css('background', $(this).data('color'));
    });

    $('.color-line').each(function () {
        $(this).find('li').first().addClass('checked');
        var img = $(this).find('li').first().find('span').data('img');
        $(this).parents('.style-element').find('.image img').attr('src', img);
    });

    $('.color-line li').click(function () {
        $(this).siblings('li').removeClass('checked');
        $(this).addClass('checked');
        $(this).parents('.style-element').find('.image img').attr('src', $(this).find('span').data('img'));
    });

    $('.style-element .cta a').click(function () {
        $('#styleprojectform-style').val($(this).parents('.style-element').data('id'));
        $('#styleprojectform-color').val($(this).parents('.style-element').find('li.checked .color').data('color'));
    });

});