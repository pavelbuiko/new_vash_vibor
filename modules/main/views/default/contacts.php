

<div class="content">
    <div class="contacts-inputs-container">
        <div id="map" class="contacts-map">
            <div class="show-inputs-button"></div>
        </div>
        <div class="contacts-inputs">
            <div class="close-inputs-button">
                <img src="img/inputs-close-icon.png">
            </div>
            <h1>Написать нам</h1>
            <div class="inputs-line">
                <div class="input-block">
                    <input type="text" placeholder="Ваше имя">
                    <input type="text" placeholder="Эл. почта">
                    <div class="phone-input">
                        <input type="text" placeholder="+7">
                        <input type="text" placeholder="Код">
                        <input type="text" placeholder="Номер телефона">
                    </div>
                </div>
                <div class="textarea-block">
                    <textarea placeholder="Ваше сообщение"></textarea>
                </div>
            </div>
            <div class="button">
                <span>отправить</span>
            </div>
        </div>
    </div>
    <div class="contacts-data">
        <div class="contacts-data-single-block">
            <div style="background-image: url('/img/address-icon.png')" class="contacts-icon"></div>
            <h1>Адрес</h1>
            <p><?=$modelcontact->string2;?></p>
        </div>
        <div class="contacts-data-single-block">
            <div style="background-image: url('/img/gps-icon.png')" class="contacts-icon"></div>
            <h1>Координаты GPS</h1>
            <p></p>
            <p></p>
        </div>
        <div class="contacts-data-single-block">
            <div style="background-image: url('/img/phone-icon.png')" class="contacts-icon"></div>
            <h1>Телефоны</h1>
            <p><?=$modelcontact->string4;?></p>
            <p><?=$modelcontact->string5;?></p>
            <p><?=$modelcontact->string6;?></p>
        </div>
        <div class="contacts-data-single-block">
            <div style="background-image: url('/img/mail-icon.png')" class="contacts-icon"></div>
            <h1>Email</h1>
            <p>
                <a href="mailto:<?=$modelcontact->string1;?>" ><?=$modelcontact->string1;?></a>
            </p>
            <div class="icons-block">
                <a href="<?= $modelcontact->string8;  ?>"  target="_blank"> <div style="background-image: url('img/contacts-icon-1.png')" class="single-icon"></div></a>
                <a href="<?= $modelcontact->string9;  ?>"  target="_blank"> <div style="background-image: url('img/contacts-icon-2.png')" class="single-icon"></div></a>
                <a href="<?= $modelcontact->string10;  ?>" target="_blank"> <div style="background-image: url('img/contacts-icon-3.png')" class="single-icon"></div></a>
                <a href="<?= $modelcontact->string11;  ?>" target="_blank"> <div style="background-image: url('img/contacts-icon-4.png')" class="single-icon"></div></a>
                <a href="<?= $modelcontact->string12;  ?>" target="_blank"> <div style="background-image: url('img/contacts-icon-5.png')" class="single-icon" ></div></a>
            </div>
        </div>
    </div>
</div>


<script>
    function mapInitialization() {
        ymaps.ready(function() {
            var myMap = new ymaps.Map('map', {
                center: [52.785574, 33.573856],
                zoom: 9
            }, {
                searchControlProvider: 'yandex#search'
            })
            ymaps.geocode("<?=$texts->string8;?>", {
                /**
                 * Опции запроса
                 * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/geocode.xml
                 */
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

                $('.contacts-data-single-block').eq(1).find('p').eq(0).text('Широта: '+coords[0]);
                $('.contacts-data-single-block').eq(1).find('p').eq(1).text('Долгота: '+coords[1]);

                // Добавляем первый найденный геообъект на карту.
                myMap.geoObjects.add(firstGeoObject);
                // Масштабируем карту на область видимости геообъекта.


                /**
                 * Все данные в виде javascript-объекта.
                 */
                console.log('Все данные геообъекта: ', firstGeoObject.properties.getAll());
                /**
                 * Метаданные запроса и ответа геокодера.
                 * @see https://api.yandex.ru/maps/doc/geocoder/desc/reference/GeocoderResponseMetaData.xml
                 */
                console.log('Метаданные ответа геокодера: ', res.metaData);
                /**
                 * Метаданные геокодера, возвращаемые для найденного объекта.
                 * @see https://api.yandex.ru/maps/doc/geocoder/desc/reference/GeocoderMetaData.xml
                 */
                console.log('Метаданные геокодера: ', firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData'));
                /**
                 * Точность ответа (precision) возвращается только для домов.
                 * @see https://api.yandex.ru/maps/doc/geocoder/desc/reference/precision.xml
                 */
                console.log('precision', firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData.precision'));
                /**
                 * Тип найденного объекта (kind).
                 * @see https://api.yandex.ru/maps/doc/geocoder/desc/reference/kind.xml
                 */
                console.log('Тип геообъекта: %s', firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData.kind'));
                console.log('Название объекта: %s', firstGeoObject.properties.get('name'));
                console.log('Описание объекта: %s', firstGeoObject.properties.get('description'));
                console.log('Полное описание объекта: %s', firstGeoObject.properties.get('text'));

                /**
                 * Если нужно добавить по найденным геокодером координатам метку со своими стилями и контентом балуна, создаем новую метку по координатам найденной и добавляем ее на карту вместо найденной.
                 */
                /**
                 var myPlacemark = new ymaps.Placemark(coords, {
             iconContent: 'моя метка',
             balloonContent: 'Содержимое балуна <strong>моей метки</strong>'
             }, {
             preset: 'islands#violetStretchyIcon'
             });

                 myMap.geoObjects.add(myPlacemark);
                 */
            });
            map.setBounds([[60,-40], [20,60]], {
                checkZoomRange: true,
            }).then(function () {
                // Действие было успешно завершено.
            }, function (err) {
                // Не удалось показать заданный регион
                // ...
            }, this);
        });
    }
</script>
