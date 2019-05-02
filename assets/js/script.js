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

});