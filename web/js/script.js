
'use strict'

$(function() {

    areaBlockHover();
    downHelpHide();
    mapInitialization();
    slidersInitialization();
    bindRange();
    contactPhoneWrapp();

    setTimeout(plusDescriptionWidth, 100);
    showDescription();

    bindNavigationSwitch();


    $(window).scroll(function() {
        $('.plus-container').each(function() {
            if (isScrolledIntoView($(this), -150)) {
                $(this).css('transform', 'scale(1)')
            }
        })
        $('.about-agency-container').each(function() {
            if (isScrolledIntoView($(this), -150)) {
                $(this).css('transform', 'scale(1)')
            }
        })

        showSidesBlock($('.cost-addiction-slide'));
        showSidesBlock($('.mortgage-information-slide'));

    })

    showInputsBlocks();
    navigationMenuShow();
});
function contactPhoneWrapp(){

    var phones = $('.contacts-data-single-block').eq(2).find('p');

    phones.each(function(){
        var phone_number = $(this).text();
        var separate_phone = phone_number.split(' ');
        $(this).html(separate_phone[0]+' '+separate_phone[1]+' '+"<span>" +separate_phone[2]+"</span");
    })

}
function bindNavigationSwitch() {
    var OFFSET_PERCENT = 20,
        $navigationCircle = $('.navigation-link'),
        activeClass = 'active-circle';

    function updateState() {
        var viewportTop = $(window).scrollTop(),
            viewportBottom = viewportTop + $(window).height(),
            halfOfviewport = $(window).height() / 2;;


        viewportBottom = viewportBottom - halfOfviewport;
        viewportTop = viewportTop + halfOfviewport;

        $('.navigation-target').each(function() {
            var sectionTop = $(this).offset().top,
                sectionBottom = sectionTop + $(this).outerHeight(),
                offset = $(this).outerHeight() / OFFSET_PERCENT;

            if ((viewportBottom >= sectionTop + offset) && (viewportTop + offset <= sectionBottom)) {
                $navigationCircle.removeClass(activeClass);
                $('.navigation-link[href=\'#' + $(this).attr('id') + '\']').addClass(activeClass);
            }
        });
    };

    updateState();

    $(window).scroll(function() {
        updateState();
    });
};

function isScrolledIntoView(elem, bias) {
    var $elem = $(elem);
    var $window = $(window);

    var docViewTop = $window.scrollTop();
    docViewTop = docViewTop + bias;
    var docViewBottom = docViewTop + $window.height();

    var elemTop = $elem.offset().top;
    var elemBottom = elemTop + $elem.height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

function areaBlockHover() {
    $('.single-area-block').hover(function() {
        $(this).find('.colored-header').css('opacity', '0');
        $(this).find('.additional-area-block').css('opacity', '1');
    }, function() {
        $(this).find('.colored-header').css('opacity', '1');
        $(this).find('.additional-area-block').css('opacity', '0');
    })
}

function downHelpHide() {
    if ($(window).scrollTop() > 0) {
        $('.down-help').css('display', 'none');
    } else {
        $(window).scroll(function() {
            setTimeout(function() {
                $('.down-help').css('display', 'none');
            }, 300);
            $('.down-help').css('opacity', '0');
        });
    }
}

/*
function mapInitialization() {
    ymaps.ready(function() {
        var myMap = new ymaps.Map('map', {
            center: [55.785574, 39.573856],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        })
        ymaps.geocode('Россия, Ростовская обл., г. Ростов-на-Дону, пр. Пушкина, 89', {
            /!**
             * Опции запроса
             * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/geocode.xml
             *!/
            // Сортировка результатов от центра окна карты.
            // boundedBy: myMap.getBounds(),
            // strictBounds: true,
            // Вместе с опцией boundedBy будет искать строго внутри области, указанной в boundedBy.
            // Если нужен только один результат, экономим трафик пользователей.
            results: 1
        }).then(function (res) {
            // Выбираем первый результат геокодирования.
            var firstGeoObject = res.geoObjects.get(0),
            // Координаты геообъекта.
                coords = firstGeoObject.geometry.getCoordinates(),
            // Область видимости геообъекта.
                bounds = firstGeoObject.properties.get('boundedBy');

            // Добавляем первый найденный геообъект на карту.
            myMap.geoObjects.add(firstGeoObject);
            // Масштабируем карту на область видимости геообъекта.
            myMap.setBounds(bounds, {
                // Проверяем наличие тайлов на данном масштабе.
                checkZoomRange: true
            });

            /!**
             * Все данные в виде javascript-объекта.
             *!/
            console.log('Все данные геообъекта: ', firstGeoObject.properties.getAll());
            /!**
             * Метаданные запроса и ответа геокодера.
             * @see https://api.yandex.ru/maps/doc/geocoder/desc/reference/GeocoderResponseMetaData.xml
             *!/
            console.log('Метаданные ответа геокодера: ', res.metaData);
            /!**
             * Метаданные геокодера, возвращаемые для найденного объекта.
             * @see https://api.yandex.ru/maps/doc/geocoder/desc/reference/GeocoderMetaData.xml
             *!/
            console.log('Метаданные геокодера: ', firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData'));
            /!**
             * Точность ответа (precision) возвращается только для домов.
             * @see https://api.yandex.ru/maps/doc/geocoder/desc/reference/precision.xml
             *!/
            console.log('precision', firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData.precision'));
            /!**
             * Тип найденного объекта (kind).
             * @see https://api.yandex.ru/maps/doc/geocoder/desc/reference/kind.xml
             *!/
            console.log('Тип геообъекта: %s', firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData.kind'));
            console.log('Название объекта: %s', firstGeoObject.properties.get('name'));
            console.log('Описание объекта: %s', firstGeoObject.properties.get('description'));
            console.log('Полное описание объекта: %s', firstGeoObject.properties.get('text'));

            /!**
             * Если нужно добавить по найденным геокодером координатам метку со своими стилями и контентом балуна, создаем новую метку по координатам найденной и добавляем ее на карту вместо найденной.
             *!/
            /!**
             var myPlacemark = new ymaps.Placemark(coords, {
             iconContent: 'моя метка',
             balloonContent: 'Содержимое балуна <strong>моей метки</strong>'
             }, {
             preset: 'islands#violetStretchyIcon'
             });

             myMap.geoObjects.add(myPlacemark);
             *!/
        });
    });
}
*/

function slidersInitialization() {
    $('.mortgage-information-slider').slick({
        nextArrow: $('.slider-frame .next-arrow'),
        prevArrow: $('.slider-frame .prev-arrow')
    })

    $('.special-deal-line .special-deal-slider').each(function() {
        var $nextArrow = $(this).prev().find('.next-arrow');
        var $prevArrow = $(this).prev().find('.prev-arrow');

        $(this).slick({
            nextArrow: $($nextArrow),
            prevArrow: $($prevArrow)
        })
    })

    $('.cost-addiction-slider').slick({
        nextArrow: $('.cost-addiction-blocks .next-arrow'),
        prevArrow: $('.cost-addiction-blocks .prev-arrow')
    })
}

function plusDescriptionWidth() {


}


function bindRange() {
    var $slider = $('.rangepicker__slider');

    $slider.each(function() {
        var range = {
                min: $(this).data('min'),
                max: $(this).data('max')
            },
            step = $(this).data('step'),
            current = $(this).data('current');

        noUiSlider.create(this, {
            start: current,
            connect: 'lower',
            step: step,
            range: range
        });

        var name = $(this).attr('data-name');
        var value = $(this).attr('data-current');
        var minValue = $(this).attr('data-min');
        var maxValue = $(this).attr('data-max');





        $(this).find('.noUi-handle').append('<div class="current-value"><span>' + name + '</span></div>')
        var summa = name;
        $(this).find('.noUi-base').append('<div class="min-value">' + minValue + '</div>')
        $(this).find('.noUi-base').append('<div class="max-value">' + maxValue + '</div>')

        this.noUiSlider.on('update', function(arr, handle, value) {
            $(this.target).attr('data-current', value[0]);
            $(this.target).find('.noUi-handle-lower').attr('data-value', value[0]);


            if (name.length == 1) {
                $(this.target).find('.current-value span').html(name + ' ' + Math.round(value[0]));
            } else {
                var value = Math.round(value[0]);
                if (value == 1 || value == 21) {
                    name = 'год';
                } else if (value == 2 || value == 3 || value == 4 || value == 22 || value == 23 || value == 24) {
                    name = 'года';
                } else {
                    name = 'лет';
                }
                $(this.target).find('.current-value span').html(Math.round(value) + ' ' + name);

            }
            var summary = $('.summary').find('span').text();
            summary = summary.substr(2);
            var period =  parseInt($('.period').find('span').text());
            var procent = parseFloat($(".number").text());
            procent= procent/(100*12);

            var calculateProcent = ((summary*procent)/(1-Math.pow(1+procent, (1-(period*12))))).toFixed(0);
            $('.month-payment .number').text(calculateProcent);

        });


    });
};

function showDescription() {
    $('.plus-description').click(function() {
        if ($(this).parent('.plus-container').hasClass('opened-description')) {
            $(this).parent('.plus-container').removeClass('opened-description');
            $(this).parent('.plus-container').find('.description-text').slideUp(300);
        }
    })
    $('.single-plus').click(function() {
        $('.plus-container').removeClass('opened-description');
        $('.plus-container').find('.description-text').slideUp(300);
        $(this).next().find('.description-text').slideDown(300);
        $(this).parent('.plus-container').addClass('opened-description');
    })
}




function showSidesBlock(slideBlock) {
    if (isScrolledIntoView((slideBlock), 50)) {
        $(slideBlock).find('h1').css('transform', 'translateX(0)');
        $(slideBlock).find('.text-block').css('transform', 'translateX(0)')
    }
}

function showInputsBlocks() {
    $('.show-inputs-button').click(function() {
        $('.contacts-inputs').addClass('opened-inputs');
    })

    $('.close-inputs-button').click(function() {
        $('.contacts-inputs').removeClass('opened-inputs');
    })
}

function navigationMenuShow() {
    $('.navigation-menu').hover(function() {
        $('.navigation-link span').show();
        $('.navigation-background').css('transform', 'translateX(0)');
        console.log(1);
    }, function() {
        $('.navigation-link span').hide();
        $('.navigation-background').css('transform', 'translateX(-100%)');
    })
}