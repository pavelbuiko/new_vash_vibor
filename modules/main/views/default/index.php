
<style>
    <?
    $i=1;
        foreach($active_objects as $object){
    ?>

    .single-area-block:nth-child(<?=$i?>) .colored-header,
    .single-area-block:nth-child(<?=$i?>) .single-area-block-icon {
        background-color: <?=$object->color;?> !important;
    }

    .single-area-block:nth-child(<?=$i?>) .additional-area-block {
        border: 7px solid <?=$object->color;?> !important;
    }

    .single-area-block:nth-child(<?=$i?>) h1:after {
        background-color: <?=$object->color;?> !important;
    }

    .single-area-block:nth-child(<?=$i?>) span {
        color: <?=$object->color;?> !important;
    }








    <?$i++;}?>


    <?
    $i =1;
    $j=1;
    $len=1;
    foreach($active_objects as $key=>$object ){
        $stocks = $object->getObjectsStocks($object->id);

    foreach($stocks as $keystock =>$stock ) {



    ?>
    .special-deals .special-deal-line:nth-child(<?=$i?>) h1:after,
    .special-deals .special-deal-line:nth-child(<?=$i?>) .special-deals-label span,
    .special-deals .special-deal-line:nth-child(<?=$i?>) .special-deal-name,
    .special-deals .special-deal-line:nth-child(<?=$i?>) .request-button,
    .special-deals .special-deal-line:nth-child(<?=$i?>) .show-layout-button {
        background-color: <?=$object->color;?> !important;
    }

    .special-deals .special-deal-line:nth-child(<?=$i?>) .request-button {
        border: 3px solid<?=$object->color;?> !important;
    }

    .special-deals .special-deal-line:nth-child(<?=$i?>) .request-button:hover {
        background-color: #fff !important;
        color:<?=$object->color;?> !important;
    }

    .special-deals .special-deal-line:nth-child(<?=$i?>) .slider-arrows> div:hover {
        background-color: <?=$object->color;?> !important;
        border: 3px solid <?=$object->color;?> !important;
    }

    <? if ($i%2== 0){

    ?>
    .special-deals .special-deal-line:nth-child(<?=$i?>) .special-deals-label {
        left: initial ;
        right: 0 ;
    }

    .special-deals .special-deal-line:nth-child(<?=$i?>) .show-layout-button {
        left: 0;
        right: initial;
    }
    .special-deals .special-deal-line:nth-child(<?=$i?>) {
        flex-direction: row-reverse;
        -webkit-flex-direction: row-reverse;
        -ms-flex-direction: row-reverse;
    }

    <? $len++;}?>


    <? $i++;
    }
    //$i++;
    }?>

</style>



<div class="content">
    <div style="background-image: url('img/main-parallax-background.jpg')" id="main-parallax" class="main-parallax navigation-target">
        <div class="main-text-container">
            <span class="top-left-angle"></span>
            <span class="top-right-angle"></span>
            <span class="bottom-left-angle"></span>
            <span class="bottom-right-angle"></span>
            <div class="clouds-block"></div>
            <div class="main-text-block">
                <h1>Продажа квартир</h1>
                <h2>от застройщика</h2>
            </div>
            <div class="left-text-block">
                <p>С заключением о правовой экспертизе документов на объект</p>
                <img src="img/left-text-block-icon.png">
            </div>
            <div class="right-text-block">
                <img src="img/right-text-block-icon.png">
                <p>С заключением о правовой экспертизе документов на объект</p>
            </div>
        </div>
        <div class="button">
            <span>получить консультацию</span>
        </div>
        <div class="down-help"></div>
    </div>
    <div style="background-image: url('img/apartments-area-background.jpg')" id="apartments-area" class="apartments-area navigation-target">
        <div class="padding-content">
            <div class="apartments-area-blocks">
                <div class="single-apartments-area">
                    <div>
                        <p>1-комнатные квартиры:</p>
                    </div>
                    <div>
                        <span>от</span>
                            <span><?= $minprice1;?> /м
                                <sup>2</sup>
                            </span>
                    </div>
                </div>
                <div class="single-apartments-area">
                    <div>
                        <p>2-комнатные квартиры:</p>
                    </div>
                    <div>
                        <span>от</span>
                            <span><?= $minprice2;?> /м
                                <sup>2</sup>
                            </span>
                    </div>
                </div>
                <div class="single-apartments-area">
                    <div>
                        <p>3-комнатные квартиры:</p>
                    </div>
                    <div>
                        <span>от</span>
                            <span><?= $minprice3;?> /м
                                <sup>2</sup>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="text-with-icon" class="builders-offer navigation-target">
        <div class="text-with-icon">
            <div class="padding-content">
                <img src="img/text-with-icon_icon.png">
                <h1>Предложения застройщиков
                    <span>Ростова-на-Дону</span>
                </h1>
                <p>Предлагаем Вам квартиры в строящихся домах Ростова-на-Дону от 900 000 до 12 млн. рублей. По каждой покупаемой квартире в строящемся доме выдается документ, подтверждающий проверку застройщика и соответствие разрешительной документации
                    по строительству требованиям действующего законодательства.</p>
            </div>
        </div>
        <div class="separate-apartments-area">
            <?
                foreach($active_objects as $object){
            ?>
                    <div style="background-image: url('<?= '../uploads/' .$object->photo?>')" class="single-area-block">
                        <h1 class="colored-header"><?=$object->title;?></h1>
                        <div class="single-area-block-icon"></div>
                        <div class="additional-area-block">
                            <h1><?=$object->title;?></h1>
                            <p><?=$object->description;?></p>

                            <div>
                                <span>от</span>
                            <span><?= min($object->price_1, $object->price_2, $object->price_3)?> /м
                                <sup>2</sup>
                            </span>
                            </div>
                        </div>
                    </div>
            <?}?>




            <!--<div style="background-image: url('img/separate-area-background-1.jpg')" class="single-area-block">
                <h1 class="colored-header">Жилой комплекс “Николаевский”</h1>
                <div class="single-area-block-icon"></div>
                <div class="additional-area-block">
                    <h1>Жилой комплекс “Николаевский”</h1>
                    <p>Комлекс находится на берегу Дона. Панорманое остекления, подземный паркинг, гостевая парковка, закрытая территория. Комлекс находится на берегу Дона. Панорманое остекления, подземный паркинг, гостевая парковка, закрытая территория</p>
                    <p>Панорманое остекления, подземный паркинг, гостевая парковка, закрытая территория</p>
                    <div>
                        <span>от</span>
                            <span>789 /м
                                <sup>2</sup>
                            </span>
                    </div>
                </div>
            </div>
            <div style="background-image: url('img/separate-area-background-2.jpg')" class="single-area-block">
                <h1 class="colored-header">Жилой комплекс “Екатерининский”</h1>
                <div class="single-area-block-icon"></div>
                <div class="additional-area-block">
                    <h1>Жилой комплекс “Екатерининская”</h1>
                    <p>Комлекс находится на берегу Дона. Панорманое остекления, подземный паркинг, гостевая парковка, закрытая территория. Комлекс находится на берегу Дона. Панорманое остекления, подземный паркинг, гостевая парковка, закрытая территория</p>
                    <p>Панорманое остекления, подземный паркинг, гостевая парковка, закрытая территория</p>
                    <div>
                        <span>от</span>
                            <span>789 /м
                                <sup>2</sup>
                            </span>
                    </div>
                </div>
            </div>
            <div style="background-image: url('img/separate-area-background-3.jpg')" class="single-area-block">
                <h1 class="colored-header">Новостройка по адресу Заводская 11</h1>
                <div class="single-area-block-icon"></div>
                <div class="additional-area-block">
                    <h1>Новостройка по адресу Заводская 11</h1>
                    <p>Комлекс находится на берегу Дона. Панорманое остекления, подземный паркинг, гостевая парковка, закрытая территория. Комлекс находится на берегу Дона. Панорманое остекления, подземный паркинг, гостевая парковка, закрытая территория</p>
                    <p>Панорманое остекления, подземный паркинг, гостевая парковка, закрытая территория</p>
                    <div>
                        <span>от</span>
                            <span>789 /м
                                <sup>2</sup>
                            </span>
                    </div>
                </div>
            </div>
            <div style="background-image: url('img/separate-area-background-4.jpg')" class="single-area-block">
                <h1 class="colored-header">Новостройка по адресу Заводская 25</h1>
                <div class="single-area-block-icon"></div>
                <div class="additional-area-block">
                    <h1>Новостройка по адресу Заводская 25</h1>
                    <p>Комлекс находится на берегу Дона. Панорманое остекления, подземный паркинг, гостевая парковка, закрытая территория. Комлекс находится на берегу Дона. Панорманое остекления, подземный паркинг, гостевая парковка, закрытая территория</p>
                    <p>Панорманое остекления, подземный паркинг, гостевая парковка, закрытая территория</p>
                    <div>
                        <span>от</span>
                            <span>789 /м
                                <sup>2</sup>
                            </span>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
    <div style="background-image: url('img/mortgage-information-background.jpg')" class="mortgage-information">
        <div class="padding-content">
            <div id="mortgage-information" class="mortgage-information-slider-container navigation-target">
                <div class="slider-frame">
                    <span></span>
                    <span></span>
                    <div class="slider-arrows">
                        <div class="prev-arrow">
                            <span></span>
                        </div>
                        <div class="next-arrow">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="mortgage-information-slider">

                    <?
                        foreach($block5_slider as $slider )   {
                    ?>
                            <div class="slide-container">
                                <div class="mortgage-information-slide">
                                    <h1><?=$slider->string4;?></h1>
                                    <div class="additional-mortgage-information text-block">
                                        <p><?=$slider->text1;?></p>
                                        <div class="button">
                                            <span>получить консультацию</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <? }?>
                </div>
            </div>
        </div>
        <div id="mortgage-calculator" class="mortgage-calculator navigation-target">
            <h1>калькулятор ипотеки</h1>
            <div class="rangepicker">
                <div data-name="₽" data-min="200000" data-max="10000000" data-current="1400000" data-step="1000" class="rangepicker__slider summary"></div>
                <input type="hidden" name="range" class="rangepicker__input">
            </div>
            <div class="rangepicker">
                <div data-name="лет" data-min="1" data-max="30" data-current="3" data-step="1" class="rangepicker__slider period"></div>
                <input type="hidden" name="range" class="rangepicker__input">
            </div>
            <div class="total-value">
                <div class="percent">
                    <p class="text">Процентная
                        <br>ставка</p>
                    <p class="number"><?=$modelcontact->string13;?>%</p>
                </div>
                <div class="month-payment">
                    <p class="text">ежемесячный
                        <br>платёж</p>
                    <p class="number">126 985</p>
                </div>
            </div>
            <div class="button">
                <span>получить точный расчет</span>
            </div>
        </div>
    </div>
    <div style="background-image: url('img/new-building-pluses-background.jpg')" id="new-building-pluses" class="new-building-pluses navigation-target">

        <?
            $i =1;
            foreach($otziv as $slider){
        ?>
                <div class="plus-container plus-container-<?=$i?>">
                    <div style="background-image: url('img/plus-icon.png')" class="single-plus"></div>
                    <div class="plus-description">
                        <div class="description-header">
                            <h1><?=$slider->string4;?></h1>
                        </div>
                        <div class="description-text">
                            <span><?=$slider->text1;?></span>
                        </div>
                    </div>
                </div>


        <?
            $i++;}
        ?>

    </div>
    <div id="special-deals" class="special-deals navigation-target">


        <?
            $i =1;
            foreach($active_objects as $object ){
                $stocks = $object->getObjectsStocks($object->id);
                foreach($stocks as $stock ) {

                    ?>
                    <div class="special-deal-line">
                        <div class="left-block">
                            <div class="special-deals-label">
                                <span>Горящее предложение</span>
                            </div>
                            <div class="slider-arrows">
                                <div class="prev-arrow">
                                    <span></span>
                                </div>
                                <div class="next-arrow">
                                    <span></span>
                                </div>
                            </div>
                            <div class="special-deal-slider">
                                <?
                                   $stock_photos = $stock->getPhotos($stock->id);
                                    foreach($stock_photos as $stock_photo){
                                ?>
                                        <div style="background-image: url('<?= '../uploads/' .$stock_photo->path?>')" class="special-deal-slide"></div>
                                <?}?>
                            </div>
                            <div style="background-image: url('img/layout-icon.png')" class="show-layout-button"></div>
                        </div>
                        <div class="right-block">
                            <div class="special-deals-description">
                                <span class="special-deal-name"><?=$object->title;?></span>

                                <h1><?=$stock->title;?></h1>
                                <p><?=$stock->description;?></p>
                                <div class="special-deals-area-block">
                                    <div class="special-deals-area">
                                        <div>
                                    <span>Общая площадь, м
                                        <sup>2</sup>
                                    </span>
                                            <span></span>
                                            <span><?=$stock->square1 ;?></span>
                                        </div>
                                        <div>
                                            <span>Этаж</span>
                                            <span></span>
                                            <span><?=$stock->float1 ;?></span>
                                        </div>
                                        <div>
                                            <span>Количество комнат</span>
                                            <span></span>
                                            <span><?=$stock->room1 ;?></span>
                                        </div>
                                        <div>
                                            <span>Состояние</span>
                                            <span></span>
                                            <span><?=$stock->status1 ;?></span>
                                        </div>
                                        <div>
                                    <span>Стоимость м
                                        <sup>2</sup>
                                    </span>
                                            <span></span>
                                            <span><?=$stock->price1 ;?> у.е.</span>
                                        </div>
                                    </div>
                                    <div class="special-deals-area">
                                        <div>
                                    <span>Общая площадь, м
                                        <sup>2</sup>
                                    </span>
                                            <span></span>
                                            <span><?=$stock->square2 ;?></span>
                                        </div>
                                        <div>
                                            <span>Этаж</span>
                                            <span></span>
                                            <span><?=$stock->float2 ;?></span>
                                        </div>
                                        <div>
                                            <span>Количество комнат</span>
                                            <span></span>
                                            <span><?=$stock->room2 ;?></span>
                                        </div>
                                        <div>
                                            <span>Состояние</span>
                                            <span></span>
                                            <span><?=$stock->status2 ;?></span>
                                        </div>
                                        <div>
                                    <span>Стоимость м
                                        <sup>2</sup>
                                    </span>
                                            <span></span>
                                            <span><?=$stock->price2 ;?> у.е.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-block">
                                    <span>₽</span>
                                    <span><?=$stock->totalprice ;?></span>
                                </div>
                                <a class="request-button">заявка на осмотр</a>
                            </div>
                        </div>
                    </div>

                    <?
                } $i++;}
        ?>














      <!--  <div class="special-deal-line">
            <div class="left-block">
                <div class="special-deals-label">
                    <span>Горящее предложение</span>
                </div>
                <div class="slider-arrows">
                    <div class="prev-arrow">
                        <span></span>
                    </div>
                    <div class="next-arrow">
                        <span></span>
                    </div>
                </div>
                <div class="special-deal-slider">
                    <div style="background-image: url('img/special-deal-img.jpg')" class="special-deal-slide"></div>
                    <div style="background-image: url('img/special-deal-img-2.jpg')" class="special-deal-slide"></div>
                </div>
                <div style="background-image: url('img/layout-icon.png')" class="show-layout-button"></div>
            </div>
            <div class="right-block">
                <div class="special-deals-description">
                    <span class="special-deal-name">жк “екатерининский”</span>
                    <h1>2-х комнатная квартира</h1>
                    <p>Шикарная 2-х комнатная квартира с мебелью и бытовой техникой. Профессиональная отделка в стиле Loft и вид на парковую зону не оставит Вас равнодушными</p>
                    <div class="special-deals-area-block">
                        <div class="special-deals-area">
                            <div>
                                    <span>Общая площадь, м
                                        <sup>2</sup>
                                    </span>
                                <span></span>
                                <span>144</span>
                            </div>
                            <div>
                                <span>Этаж</span>
                                <span></span>
                                <span>21</span>
                            </div>
                            <div>
                                <span>Количество комнат</span>
                                <span></span>
                                <span>2</span>
                            </div>
                            <div>
                                <span>Состояние</span>
                                <span></span>
                                <span>с отделкой</span>
                            </div>
                            <div>
                                    <span>Стоимость м
                                        <sup>2</sup>
                                    </span>
                                <span></span>
                                <span>956 у.е.</span>
                            </div>
                        </div>
                        <div class="special-deals-area">
                            <div>
                                    <span>Общая площадь, м
                                        <sup>2</sup>
                                    </span>
                                <span></span>
                                <span>144</span>
                            </div>
                            <div>
                                <span>Этаж</span>
                                <span></span>
                                <span>21</span>
                            </div>
                            <div>
                                <span>Количество комнат</span>
                                <span></span>
                                <span>2</span>
                            </div>
                            <div>
                                <span>Состояние</span>
                                <span></span>
                                <span>с отделкой</span>
                            </div>
                            <div>
                                    <span>Стоимость м
                                        <sup>2</sup>
                                    </span>
                                <span></span>
                                <span>956 у.е.</span>
                            </div>
                        </div>
                    </div>
                    <div class="price-block">
                        <span>₽</span>
                        <span>280 600 000</span>
                    </div>
                    <a class="request-button">заявка на осмотр</a>
                </div>
            </div>
        </div>
        -->







     <!--   <div class="special-deal-line">
            <div class="left-block">
                <div class="special-deals-label">
                    <span>Горящее предложение</span>
                </div>
                <div class="slider-arrows">
                    <div class="prev-arrow">
                        <span></span>
                    </div>
                    <div class="next-arrow">
                        <span></span>
                    </div>
                </div>
                <div class="special-deal-slider">
                    <div style="background-image: url('img/special-deal-img-2.jpg')" class="special-deal-slide"></div>
                    <div style="background-image: url('img/special-deal-img.jpg')" class="special-deal-slide"></div>
                </div>
                <div style="background-image: url('img/layout-icon.png')" class="show-layout-button"></div>
            </div>
            <div class="right-block">
                <div class="special-deals-description">
                    <span class="special-deal-name">жк “екатерининский”</span>
                    <h1>2-х комнатная квартира</h1>
                    <p>Шикарная 2-х комнатная квартира с мебелью и бытовой техникой. Профессиональная отделка в стиле Loft и вид на парковую зону не оставит Вас равнодушными</p>
                    <div class="special-deals-area-block">
                        <div class="special-deals-area">
                            <div>
                                    <span>Общая площадь, м
                                        <sup>2</sup>
                                    </span>
                                <span></span>
                                <span>144</span>
                            </div>
                            <div>
                                <span>Этаж</span>
                                <span></span>
                                <span>21</span>
                            </div>
                            <div>
                                <span>Количество комнат</span>
                                <span></span>
                                <span>2</span>
                            </div>
                            <div>
                                <span>Состояние</span>
                                <span></span>
                                <span>с отделкой</span>
                            </div>
                            <div>
                                    <span>Стоимость м
                                        <sup>2</sup>
                                    </span>
                                <span></span>
                                <span>956 у.е.</span>
                            </div>
                        </div>
                        <div class="special-deals-area">
                            <div>
                                    <span>Общая площадь, м
                                        <sup>2</sup>
                                    </span>
                                <span></span>
                                <span>144</span>
                            </div>
                            <div>
                                <span>Этаж</span>
                                <span></span>
                                <span>21</span>
                            </div>
                            <div>
                                <span>Количество комнат</span>
                                <span></span>
                                <span>2</span>
                            </div>
                            <div>
                                <span>Состояние</span>
                                <span></span>
                                <span>с отделкой</span>
                            </div>
                            <div>
                                    <span>Стоимость м
                                        <sup>2</sup>
                                    </span>
                                <span></span>
                                <span>956 у.е.</span>
                            </div>
                        </div>
                    </div>
                    <div class="price-block">
                        <span>₽</span>
                        <span>280 600 000</span>
                    </div>
                    <a class="request-button">заявка на осмотр</a>
                </div>
            </div>
        </div>-->
    </div>
    <div id="selection-application" class="selection-application navigation-target">
        <div class="padding-content">
            <div class="selection-application-blocks">
                <div class="application-description">
                    <h1>заявка на подбор квартиры</h1>
                    <p>Укажите основные пожелания по этажности, количеству комнат и минимальному метражу, и наши менеджеры подберут для вас подходящие объекты в нашем ЖК "Екатерининский".</p>
                </div>
                <div class="application-form">
                    <input type="text" placeholder="Ваше имя">
                    <input type="text" placeholder="Номер телефона">
                    <textarea placeholder="Ваши пожелания"></textarea>
                    <div class="button">
                        <span>подобрать квартиру</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="cost-addiction" class="cost-addiction navigation-target">
        <div class="padding-content">
            <div class="cost-addiction-blocks">
                <div class="slider-arrows">
                    <div class="prev-arrow">
                        <span></span>
                    </div>
                    <div class="next-arrow">
                        <span></span>
                    </div>
                </div>
                <div class="cost-addiction-slider">

                    <?
                        foreach($block1_slider as $slider){

                    ?>
                         <div class="slid-container">
                              <div class="cost-addiction-slide">
                                   <h1><?=$slider->string4;?></h1>
                                   <div class="text-block">
                                       <p><?=$slider->text1;?></p>
                                   </div>
                              </div>
                         </div>

                    <?}?>
                </div>
            </div>
        </div>
    </div>
    <div style="background-image: url('img/about-company.jpg')" id="about-agency" class="about-agency navigation-target">
        <h1>агенство
            <span>ваш выбор+</span> это
        </h1>
        <div class="about-agency-blocks">

            <?
                $i=1;
                foreach($block6_slider as $slider){
            ?>
                    <div class="about-agency-container">
                        <div class="about-agency-circle">
                            <h1><?=$i;?></h1>
                            <div>
                                <h2><?=$slider->string4;?></h2>
                                <p><?=$slider->text1;?></p>
                            </div>
                        </div>
                    </div>

            <?
                $i++;
                }?>

            <!--<div class="about-agency-container">
                <div class="about-agency-circle">
                    <h1>2</h1>
                    <div>
                        <h2>надёжность</h2>
                        <p>Только актуальные объекты с реальными ценами от собственников, без завышения и без излишних "приукрашиваний".</p>
                    </div>
                </div>
            </div>
            <div class="about-agency-container">
                <div class="about-agency-circle">
                    <h1>3</h1>
                    <div>
                        <h2>надёжность</h2>
                        <p>Только актуальные объекты с реальными ценами от собственников, без завышения и без излишних "приукрашиваний".</p>
                    </div>
                </div>
            </div>
            <div class="about-agency-container">
                <div class="about-agency-circle">
                    <h1>4</h1>
                    <div>
                        <h2>надёжность</h2>
                        <p>Только актуальные объекты с реальными ценами от собственников, без завышения и без излишних "приукрашиваний".</p>
                    </div>
                </div>
            </div>
            <div class="about-agency-container">
                <div class="about-agency-circle">
                    <h1>5</h1>
                    <div>
                        <h2>надёжность</h2>
                        <p>Только актуальные объекты с реальными ценами от собственников, без завышения и без излишних "приукрашиваний".</p>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
    <div id="contacts" class="contacts-block navigation-target">
        <div id="map" class="main-page-map"></div>
        <div class="contacts-content">
            <div class="contacts-content-container">
                <h1 class="address">адрес</h1>
                <p><?=$modelcontact->string2;?></p>
                <h1 class="phone">телефоны</h1>
                <p><?=$modelcontact->string4;?></p>
                <p><?=$modelcontact->string5;?></p>
                <p><?=$modelcontact->string6;?></p>
                <h1 class="email">email</h1>
                <a href="mailto:<?=$modelcontact->string1;?>"><?=$modelcontact->string1;?></a>
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
    <div id="more-questions" class="more-questions navigation-target">
        <div class="padding-content">
            <div class="more-questions-content">
                <div class="text-block">
                    <h1>Остались вопросы?</h1>
                    <p>Оставьте свой телефон и наши менеджеры свяжутся с Вами</p>
                </div>
                <div class="button">
                    <span>заказать звонок</span>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu"></div>
    <div class="navigation-menu">
        <div class="navigation-background"></div>
        <a href="#main-parallax" class="navigation-link">
            <div class="navigation-circle"></div>
            <span>Наверх</span>
        </a>
        <a href="#apartments-area" class="navigation-link">
            <div class="navigation-circle"></div>
            <span>Цены</span>
        </a>
        <a href="#text-with-icon" class="navigation-link">
            <div class="navigation-circle"></div>
            <span>Предложения застройщиков</span>
        </a>
        <a href="#mortgage-information" class="navigation-link">
            <div class="navigation-circle"></div>
            <span>Ипотека</span>
        </a>
        <a href="#mortgage-calculator" class="navigation-link">
            <div class="navigation-circle"></div>
            <span>Калькулятор ипотеки</span>
        </a>
        <a href="#new-building-pluses" class="navigation-link">
            <div class="navigation-circle"></div>
            <span>Плюсы новостроек</span>
        </a>
        <a href="#special-deals" class="navigation-link">
            <div class="navigation-circle"></div>
            <span>Горячие предложения</span>
        </a>
        <a href="#selection-application" class="navigation-link">
            <div class="navigation-circle"></div>
            <span>Заявка на подбор</span>
        </a>
        <a href="#cost-addiction" class="navigation-link">
            <div class="navigation-circle"></div>
            <span>Вопрос-ответ</span>
        </a>
        <a href="#about-agency" class="navigation-link">
            <div class="navigation-circle"></div>
            <span>Как мы работаем</span>
        </a>
        <a href="#contacts" class="navigation-link">
            <div class="navigation-circle"></div>
            <span>Контакты</span>
        </a>
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

                // Добавляем первый найденный геообъект на карту.
                myMap.geoObjects.add(firstGeoObject);
                // Масштабируем карту на область видимости геообъекта.

                myMap.setBounds(bounds, {
                    // Проверяем наличие тайлов на данном масштабе.
                    checkZoomRange: true
                });

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

