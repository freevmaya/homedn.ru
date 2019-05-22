$(function () {

    $('.color-line li .color').each(function () {
        $(this).css('background', $(this).data('color'));
    });

    $('.color-line').each(function () {
        $(this).find('li').first().addClass('checked');
    });

    $('.color-line li').click(function () {
        $(this).siblings('li').removeClass('checked');
        $(this).addClass('checked');
    });

    $('.style-element .cta a').click(function () {
        $('#styleprojectform-style').val($(this).parents('.style-element').data('id'));
        $('#styleprojectform-color').val($(this).parents('.style-element').find('li.checked .color').data('color'));
    });

});