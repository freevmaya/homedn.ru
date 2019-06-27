$(function () {
    $('.section-element-list .more a').click(function () {
        $(this).parents('.section-element-list').find('ul li').fadeIn('fast').css('display', 'inline-block');
        $(this).parent().hide();
        return false;
    });
});