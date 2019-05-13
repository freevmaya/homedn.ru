$(function () {
    $('.section-element-list .more a').click(function () {
        $(this).parents('.section-element-list').find('ul li').fadeIn('fast');
        $(this).parent().hide();
        return false;
    });
});