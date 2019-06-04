

$(function () {

    calcData = {
        basePrice: $('#input-data').data('price'),
        fullPrice: 0,
        baseImage: $('#input-data').data('image')
    };

    $('.room-select').click(function () {
        $('.room-select').removeClass('active');
        $('.tab-content').removeClass('active');
        $(this).addClass('active');
        $($(this).attr('href')).addClass('active');
//        let h = $('.tab-content.active').find('.baseimage').height();
//        console.log(h);
//        $('.tab-content.active').css('height', h + 'px');
        $(window).trigger('resize');
        $(document).trigger('calc-paint');
        return false;
    });

    $('.group-name-toggle').click(function () {
        $(this).find('i').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
        $(this).parents('.element-group').find('.element-list').slideToggle().css('display', 'flex');
        return false;
    });

    $(window).resize(function () {
        console.log('resize');
        if (($('.tab-content.active').find('.baseimage').length > 0) && ($(window).width() > 767)) {
            let w = $('.tab-content.active').find('.element-group-list').width();
            console.log(w);
            $('.tab-content.active').find('.baseimage').css('width', (+$('.tab-content.active').width() - w) + 'px');
            let h = $('.tab-content.active').find('.baseimage img').first().height();
            console.log(h);
            $('.tab-content.active').css('height', h + 'px');
        }
        if ($(window).width() < 768) {
            $('.tab-content.active').find('.baseimage').css('width', '100%');
        }
        /*$('.tab-container .tab-content').each(function () {
         if (($(this).find('.baseimage').length > 0) && ($(window).width() > 767)) {
         let w = $(this).find('.element-group-list').width();
         $(this).find('.baseimage').css('width', (+$(this).width() - w) + 'px');
         let h = $(this).find('.baseimage').height();
         console.log(h);
         $(this).css('height', h + 'px');
         }
         if ($(window).width() < 768) {
         $(this).find('.baseimage').css('width', '100%');
         }
         });*/
    });

    $('label .countable').on('change', 'input[type=text]', function () {
        $(this).parents('label').data('count', $(this).val()).data('diff', +$(this).val() * +$(this).parents('label').data('price')).trigger('calc-element-diff');
        calcSum();
        $(document).trigger('calc-diff');
    });

    $('li .countable').each(function () {
        let diff = (+$(this).val() * $(this).parents('li').data('price'));
        $(this).parents('li').data('count', $(this).val()).find('.price').html((diff > 0 ? '+' : '') + diff.toFixed(0).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$& ') + ' руб.');
    });

    $('li .countable').on('change', 'input[type=text]', function () {
        if (!$(this).parents('li').hasClass('checked'))
            $(this).parents('li').addClass('checked');
        let diff = (+$(this).val() * $(this).parents('li').data('price'));
        $(this).parents('li').data('count', $(this).val()).find('.price').html((diff > 0 ? '+' : '') + diff.toFixed(0).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$& ') + ' руб.');
        calcSum();
        saveCalcData();
    });

    $('.complect-content-list li[data-price]').click(function () {
        let hover = false;
        $(this).find('input, button').each(function () {
            if ($(this).is(':hover'))
                hover = true;
        });
        if (!hover) {
            $(this).toggleClass('checked');
        }
        calcSum();
        saveCalcData();
    });

    /**
     * расчет изменения стоимости для каждого элемента
     */
    $(document).on('calc-diff', function () {
        $('.element-group label').each(function () {
            if (($(this).data('price') !== undefined) && ($(this).data('countable') == 0)) {
                cur = $('label[data-checked=1][data-group="' + $(this).data('group') + '"]');
                $(this).data('diff', (+$(this).data('price') * $(this).data('count')) - (+$(cur).data('price') * $(cur).data('count'))).trigger('calc-element-diff');
            }
        });
    });

    $('label').on('calc-element-diff', function () {
        if ($(this).data('diff') === 0) {
            $(this).find('.price').html('');
        } else {
            $(this).find('.price').html((+$(this).data('diff') > 0 ? '+' : '') + $(this).data('diff') + ' руб.');
        }
    });

    /**
     * Полная стоимость
     */
    $(document).on('calc-full-price', function () {
        $('#sum-top, #sum-bottom, #sum-panel').html(calcData.fullPrice.toFixed(0).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$& '));
    });

    function saveCalcData() {
        let checkedElement = [];
        $('label[data-checked=1]').each(function () {
            checkedElement.push({
                id: $(this).data('id'),
                count: $(this).data('count')
            });
        });
        let complectElement = [];
        $('.complect-content-list li[data-price].checked').each(function () {
            complectElement.push({
                id: $(this).data('id'),
                count: $(this).data('count')
            });
        });
        $.post('', {data: checkedElement, complect_data: complectElement});
    }

    function calcSum() {
        let sum = 0;
        $('label[data-checked=1]').each(function () {
            sum += +$(this).data('price') > 0 ? +$(this).data('price') * $(this).data('count') : 0;
        });
        $('.complect-content-list li[data-price].checked').each(function () {
            sum += +$(this).data('price') > 0 ? +$(this).data('price') * $(this).data('count') : 0;
        });
        calcData.fullPrice = sum;
        $(document).trigger('calc-full-price');
        $(document).trigger('calc-paint');
    }

    $('.element-list').on('click', 'label', function () {
        $('label[data-group="' + $(this).data('group') + '"]').removeClass('checked').attr('data-checked', 0);
        $(this).addClass('checked').attr('data-checked', 1);
        calcSum();
        $(document).trigger('calc-diff');
        saveCalcData();
    });

    $(document).on('calc-paint', function () {
        let html = [];
        $('.tab-content').each(function (i) {
            if ($(this).hasClass('active')) {
                html[100] = '<img src="' + calcData.baseImage[i] + '">';
            }
        });
        $('.tab-content.active').find('label[data-checked=1]').each(function () {
            if (html[+$(this).data('sort')] === undefined) {
                html[+$(this).data('sort')] = '<img src="' + $(this).data('image') + '">';
            } else {
                html[+$(this).data('sort') - 1] = '<img src="' + $(this).data('image') + '">';
            }
        });
//        console.log(html);
        $('.tab-content.active .baseimage').html(html.join(''));
        setTimeout(function () {
            $(window).trigger('resize');
        }, 500);
    });

    $('#calc-collect li').each(function () {
        let sum = 0;
        $.each($(this).data('collect'), function () {
            sum += +$('label[data-id=' + this.id + ']').data('price') * this.count;
        });
        $(this).find('.price').html((sum.toFixed(0) > 0 ? '+' : '') + sum.toFixed(0).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$& ') + ' руб.');
    });

    $('#calc-collect').width($('#calc-collect li').length * (+$('#calc-collect li').first().width() + 15));

    $('#calc-collect').on('click', 'li', function () {
        $.each($(this).data('collect'), function () {
            $('label[data-id=' + this.id + ']').click();
            $('label[data-id=' + this.id + ']').data('count', this.count);
        });
        $(document).trigger('calc-diff');
        calcSum();
    });

    $(document).trigger('calc-diff');

    calcSum();

    $(window).scroll(function () {
        if (($('.inputdata-container').offset().top <= $(window).scrollTop()) && ($('.section-7').offset().top >= ($(window).scrollTop() + $(window).height())))
            $(".bottom-panel").fadeIn();
        else
            $(".bottom-panel").fadeOut();
    });

    setTimeout(function () {
        $(window).trigger('resize');
    }, 500);

});