calcData = {
    basePrice: 0,
    fullPrice: 0
};

$(function () {

    $('.room-select').click(function () {
        $('.room-select').removeClass('active');
        $('.tab-content').removeClass('active');
        $(this).addClass('active');
        $($(this).attr('href')).addClass('active');
        return false;
    });

    $('.group-name-toggle').click(function () {
        $(this).find('i').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
        $(this).parents('.element-group').find('.element-list').slideToggle();
        return false;
    });

    $('.tab-container .tab-content').each(function () {
        if ($(this).find('.baseimage').length > 0) {
            let h = $(this).find('.baseimage').height();
            $(this).css('height', h + 'px');
        }
    });

    $('label .countable').on('change', 'input[type=text]', function () {
        $(this).parents('label').attr('data-count', $(this).val()).attr('data-diff', +$(this).val() * +$(this).parents('label').data('price')).trigger('calc-element-diff');
        calcSum();
    });

    /**
     * расчет изменения стоимости для каждого элемента
     */
    $(document).on('calc-diff', function () {
        $('.element-group label').each(function () {
            if ($(this).data('price') !== undefined && $(this).data('countable') == 0) {
                cur = $('label[data-checked=1][data-group="' + $(this).data('group') + '"]');
                $(this).attr('data-diff', +$(this).data('price') - $(cur).data('price'));
                $(this).trigger('calc-element-diff');
            }
        });
    });

    $('label').on('calc-element-diff', function () {
        console.log($(this).attr('id')+': '+$(this).data('diff'));
        if ($(this).data('diff') == 0) {
            $(this).find('.price').html('');
        } else {
            $(this).find('.price').html($(this).data('diff') + ' руб.');
        }
    });

    /**
     * Полная стоимость
     */
    $(document).on('calc-full-price', function () {
        $('#sum-top').html(calcData.fullPrice.toFixed(0).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$& '));
    });

    function calcSum() {
        var sum = 0;
        $('label[data-checked=1]').each(function () {
            sum += +$(this).data('price') > 0 ? +$(this).data('price') * +$(this).data('count') : 0;
        });
        calcData.fullPrice = sum;
        $(document).trigger('calc-full-price');
    }

    $('.element-list').on('click', 'label', function () {
        $('label[data-group="' + $(this).data('group') + '"]').removeClass('checked').attr('data-checked', 0);
        $(this).addClass('checked').attr('data-checked', 1);
        calcSum();
        $(document).trigger('calc-diff');
    });

    $(document).trigger('calc-diff');

    calcSum();

});