<?php
/*
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
use app\assets\FrontendAsset;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\StaticBlocks */
/*
  $this->title = $meta->string2;
  if ($meta->string4) {
  $this->registerMetaTag([
  'name' => 'description',
  'content' => $meta->string4,
  ]);
  }
  if ($meta->string3) {
  $this->registerMetaTag([
  'name' => 'keywords',
  'content' => $meta->string3
  ]);
  }
 */
/*$this->registerJsFile('https://api-maps.yandex.ru/2.0-stable/?load=package.full&lang=ru-RU', ['position' => View::POS_BEGIN]);
$this->registerJsFile('js/map.js', ['position' => View::POS_BEGIN]);
$this->registerJsFile('js/logic.js', ['position' => View::POS_END, 'depends' => [FrontendAsset::className()]]);
$this->registerJsFile('js/forms.js', ['position' => View::POS_END, 'depends' => [FrontendAsset::className()]]);
*/*/?><!--

<ul id="menu">
    <li data-menuanchor="arusnavi" class="active"><a href="#arusnavi">
            <div class="icon_menu icon_menu1"><span class="text_menu">arusnavi<img src="img/shadow_menu.png" alt=""/></span></div>
        </a></li>
    <li data-menuanchor="dealers"><a href="#dealers">
            <div class="icon_menu icon_menu2"><span class="text_menu">дилерам<img src="img/shadow_menu.png" alt=""/></span></div>
        </a></li>
    <li data-menuanchor="products"><a href="#products">
            <div class="icon_menu icon_menu3"><span class="text_menu">продукты<img src="img/shadow_menu.png" alt=""/></span></div>
        </a></li>
    <li data-menuanchor="activities"><a href="#activities">
            <div class="icon_menu icon_menu4"><span class="text_menu">вид деятельности<img src="img/shadow_menu.png" alt=""/></span></div>
        </a></li>
    <li data-menuanchor="demoversion"><a href="#demoversion">
            <div class="icon_menu icon_menu5"><span class="text_menu">демо-версия<img src="img/shadow_menu.png" alt=""/></span></div>
        </a></li>
    <li data-menuanchor="manufacture"><a href="#manufacture">
            <div class="icon_menu icon_menu7"><span class="text_menu">производство<img src="img/shadow_menu.png" alt=""/></span></div>
        </a></li>
    <li data-menuanchor="contacts"><a href="#contacts">
            <div class="icon_menu icon_menu6"><span class="text_menu">контакты<img src="img/shadow_menu.png" alt=""/></span></div>
        </a></li>
</ul>

<div id="fullpage">
    <div class="section " id="section0">
        <div class="wrapper arusnavi">
            <div class="wrap_clouds">
                <div class="x-clouds"><div class="y-clouds"></div></div>
            </div>
            <div class="block_action">
                <div class="top_phone">
                    <img src="img/top_phone.png" alt=""/>
                    <span>+7 (903)</span> 728-7881
                    <img class="top_shadow" src="img/top_shadow.png" alt=""/>
                </div>
                <div class="top_phone action">
                    <img src="img/action.png" alt=""/>
                    <span>Акция</span>
                    <img class="top_shadow" src="img/top_shadow.png" alt=""/>
                </div>
            </div>
            <div class="content">
                <img class="logo_mini" src="img/logo_mini.png" alt=""/>
                <div class="table_cell">
                    <div class="circle"></div>
                    <div class="row">
                        <ul class="carousel">
                            <li class="item item6 active">
                                <img src="img/icon_blue5.png" alt=""/>
                                <div><img src="img/icon_white5.png" alt=""/></div>
                            </li>
                            <li class="item item1">
                                <img src="img/icon_blue9.png" alt=""/>
                                <div><img src="img/icon_white9.png" alt=""/></div>
                            </li>
                            <li class="item item2">
                                <img src="img/icon_blue8.png" alt=""/>
                                <div><img src="img/icon_white8.png" alt=""/></div>
                            </li>
                            <li class="item item3">
                                <img src="img/icon_blue7.png" alt=""/>
                                <div><img src="img/icon_white7.png" alt=""/></div>
                            </li>
                            <li class="item item4">
                                <img src="img/icon_blue6.png" alt=""/>
                                <div><img src="img/icon_white6.png" alt=""/></div>
                            </li>
                            <li class="item item5">
                                <img src="img/icon_blue1.png" alt=""/>
                                <div><img src="img/icon_white1.png" alt=""/></div>
                            </li>

                        </ul>
                    </div>
                    <div class="controls">
                        <a href="#" class="previous"><img src="/img/carusel_prev.png" alt=""/></a> 
                        <a href="#" class="next"><img src="/img/carusel_next.png" alt=""/></a>
                    </div>

                    <div class="content_carusel">
                        <div class="block_item1">
                            <h1 class="title_block_item"><?/*= $slider->string7 */?><br><span><?/*= $slider->string8 */?></span></h1>
                            <p class="text_block_item"><?/*= $slider->text1 */?></p>
                            <div class="block_img">
                                <img class="item1_img1" src="img/n-item1_img1.png" alt=""/>
                                <img class="item1_img2" src="img/n-item1_img2.png" alt=""/>
                                <img class="item1_img3" src="img/n-item1_img3.png" alt=""/>
                            </div>
                            <a class="button_block_item" href="#">ЗАПРОСИТЬ ПРАЙС</a>
                        </div>

                        <div class="block_item2">
                            <h1 class="title_block_item"><?/*= $slider->string9 */?><br><span><?/*= $slider->string10 */?></span></h1>
                            <p class="text_block_item"><?/*= $slider->text2 */?></p>
                            <div class="block_img">
                                <img class="item2_img1" src="img/n-item2_img1.png" alt=""/>
                                <img class="item2_img2" src="img/n-item2_img2.png" alt=""/>
                                <img class="item2_img3" src="img/n-item2_img3.png" alt=""/>
                            </div>
                            <a class="button_block_item" href="#">ЗАПРОСИТЬ ПРАЙС</a>
                        </div>

                        <div class="block_item3">
                            <h1 class="title_block_item"><span><?/*= $slider->string11 */?></span><br><?/*= $slider->string12 */?></h1>
                            <!-- <p class="text_block_item">Начала работать на рынке Кузбасса с 2004 года под именем ООО «Кузбасские навигационные системы». На сегодняшний день мы охватываем всю территорию Российской Федерации. Нашими клиентами являются как крупные </p> -->
                            <div class="block_img">
                                <img class="item3_img1" src="img/n-item3_img1.png" alt=""/>
                            </div>
                            <a class="button_block_item" href="#">ЗАПРОСИТЬ ПРАЙС</a>
                        </div>

                        <div class="block_item4">
                            <h1 class="title_block_item"><span><?/*= $slider->string13 */?></span><br><img src="img/gelios_white.png" alt=""/></h1>
                            <p class="text_block_item"><?/*= $slider->text4 */?></p>
                            <div class="block_img">
                                <img class="item4_img1" src="img/n-item4_img1.png" alt=""/>
                                <img class="item4_img2" src="img/n-item4_img2.png" alt=""/>
                            </div>
                            <a class="button_block_item" href="#">ЗАПРОСИТЬ ПРАЙС</a>
                        </div>

                        <div class="block_item5">
                            <h1 class="title_block_item"><span><?/*= $slider->string14 */?></span><br><?/*= $slider->string15 */?></h1>
                            <p class="text_block_item"><?/*= $slider->text11 */?></p>
                            <div class="block_img">
                                <img class="item5_img1" src="img/item4_img1.png" alt=""/>
                            </div>
                            <a class="button_block_item" href="#">ЗАПРОСИТЬ ПРАЙС</a>
                        </div>

                        <div class="block_item6">
                            <h1 class="title_block_item"><span><?/*= $slider->text13 */?></span><br><?/*= $slider->text14 */?></h1>
                            <p class="text_block_item"><?/*= $slider->text12 */?></p>
                            <div class="block_img">
                                <img class="item6_img1" src="img/item6_img1.png" alt=""/>
                                <img class="item6_img2" src="img/item6_img2.png" alt=""/>
                                <img class="item6_img3" src="img/item6_img3.png" alt=""/>
                            </div>
                            <a class="button_block_item" href="#">ЗАПРОСИТЬ ПРАЙС</a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="section" id="section1">
        <div class="wrapper dealers">
            <div class="content">
                <div class="table_cell">
                    <div class="title_content">
                        <img src="img/icon_dealers.png" alt=""/>
                        Дилерам
                    </div>
                    <div class="description_dealers">
                        <div class="block_dealers">
                            <div class="top_block_dealers"><?/*= $slider->string1 */?> <img src="img/arrow_dealers.png" alt=""/></div>
                            <div class="bottom_block_dealers">
                                <?/*= $slider->text5 */?>
                            </div>
                        </div>
                        <div class="block_dealers">
                            <div class="top_block_dealers"><?/*= $slider->string2 */?> <img src="img/arrow_dealers.png" alt=""/></div>
                            <div class="bottom_block_dealers">
                                <?/*= $slider->text6 */?>
                            </div>
                        </div>
                        <div class="block_dealers">
                            <div class="top_block_dealers"><?/*= $slider->string3 */?> <img src="img/arrow_dealers.png" alt=""/></div>
                            <div class="bottom_block_dealers">
                                <?/*= $slider->text7 */?>
                            </div>
                        </div>
                    </div>
                    <div class="description_dealers description_dealers2">
                        <div class="block_dealers">
                            <div class="top_block_dealers"><?/*= $slider->string4 */?> <img src="img/arrow_dealers_bot.png" alt=""/></div>
                            <div class="bottom_block_dealers">
                                <?/*= $slider->text8 */?>
                            </div>
                        </div>
                        <div class="block_dealers">
                            <div class="top_block_dealers"><?/*= $slider->string5 */?> <img src="img/arrow_dealers_bot.png" alt=""/></div>
                            <div class="bottom_block_dealers">
                                <?/*= $slider->text9 */?>
                            </div>
                        </div>
                        <div class="block_dealers">
                            <div class="top_block_dealers"><?/*= $slider->string6 */?> <img src="img/arrow_dealers_bot.png" alt=""/></div>
                            <div class="bottom_block_dealers">
                                <?/*= $slider->text10 */?>
                            </div>
                        </div>
                    </div>
                    <?php
/*                    $form1 = ActiveForm::begin([
                                'id' => 'OrderForm'
                            ])
                    */?>
                    <h1>Оставить заявку</h1>
                    <input type="text" name="OrderForm[name]" value="" placeholder="Имя"/>
                    <input type="text" name="OrderForm[phone]" value="" placeholder="Телефон"/>
                    <input type="text" name="OrderForm[email]" value="" placeholder="e-mail"/>
                    <input type="text" name="OrderForm[city]" value="" placeholder="Город"/>
                    <input type="submit" id="submitOrderForm" value="отправить"/>

                    <div class="smof" style="display: none">
                        <p>Заявка успешно отправлена</p>
                    </div>
                    <div class="emof" style="display: none">

                    </div>
                    <input type="submit" id="fixOrderForm" value="исправить" style="display: none"/>
                    <?php /*ActiveForm::end(); */?>
                </div>
            </div>
        </div>
    </div>

    <div class="section" id="section2">
        <div class="wrapper products">
            <div class="content">
                <div class="table_cell">
                    <div class="title_content">
                        <img src="img/icon_products.png" alt=""/>
                        Продукты
                    </div>
                    <div class="product_selection">
                        <?php /*$i = 1 */?>
                        <?php /*foreach ($cat as $c) { */?>
                            <span class="<?/*= $i == 1 ? 'active_select ' : '' */?>select<?/*= $i */?>"><?/*= $c->string1 */?></span>
                            <?php
/*                            $i++;
                        }
                        */?>

                    </div>
                    <div class="wrap_block_product">
                    <?php /*$i = 1 */?>
                    <?php /*foreach ($cat as $c) { */?>
                        <div class="block_products block_products<?/*= $i */?>">
                        <div id="jcl-demo">
                          <div class="custom-container nonImageContent">
                            <a href="#" class="prev">&lsaquo;</a>
                                <div class="carousel carousel<?/*= $i */?>">
                                <ul>
                            <?php /*foreach ($pr as $p) { */?>
                                <?php /*if ($p->string2 == $c->id) { */?>
                                    <li><div class="goods">
                                        <h1><?/*= $p->string1 */?></h1>
                                        <img src="/uploads/thumbs/<?/*= isset($p->img) ? $p->img : 'product.png' */?>" alt=""/>
                                        <p><?/*= $p->text1 */?></p>
                                        <button>подробнее</button>
                                    </div></li>
                                <?php /*} */?>
                            <?php /*} */?>
                                </ul>
                                </div>
                            <a href="#" class="next">&rsaquo;</a>
                            <div class="clear"></div>
                          </div>
                        </div>
                        </div>
                        <?php
/*                        $i++;
                    }
                    */?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section" id="section3">
        <div class="wrapper kind_activity">
            <div class="content">
                <div class="table_cell">
                    <div class="logo">
                        <img src="img/logo.png" alt=""/>
                        ООО «Аруснави» начала работать на рынке Кузбасса с 2004 года под именем ООО «Кузбасские навигационные системы». На сегодняшний день мы охватываем всю территорию Российской Федерации. Нашими клиентами являются как крупные холдинги и корпорации, так и небольшие организации. Мы занимаемся установкой и обслуживанием оборудования для мониторинга транспорта и  системами спутникового слежения за любыми подвижными объектами (люди, автомобили, велосипеды, мотоциклы и т.д.).
                    </div>
                    <div class="block_kind_activity">
                        <div class="block_kind_activity1">
                            <div>
                                <img src="img/kind_activity_icon1.png" alt=""/>
                                <p>Производство приборов для мониторинга транспорта</p>
                            </div>
                            <div class="inside_block1">
                                <img src="img/kind_activity_icon2.png" alt=""/>
                                <p>Установка противоугонной<br> охранно-поисковой навигационной системы</p>
                            </div>
                            <div>
                                <img src="img/kind_activity_icon3.png" alt=""/>
                                <p>Развитие сети диллеров</p>
                            </div>
                        </div>
                        <div class="block_kind_activity2">
                            <div class="inside_block2">
                                ОСНОВНЫЕ ВИДЫ<br>ДЕЯТЕЛЬНОСТИ
                            </div>
                            <div>
                                <img src="img/kind_activity_icon7.png" alt=""/>
                                <p>Предоставление услуг сервера мониторинга</p>
                            </div>
                        </div>
                        <div class="block_kind_activity3">
                            <div>
                                <img src="img/kind_activity_icon4.png" alt=""/>
                                <p>Продажа и установка контроллеров<br> учета работы механизмов</p>
                            </div>
                            <div class="inside_block3">
                                <img src="img/kind_activity_icon5.png" alt=""/>
                                <p>Настройка, установка и обслуживание<br> GPS/ГЛОНАСС навигационного оборудования</p>
                            </div>
                            <div class="inside_block3">
                                <img src="img/kind_activity_icon6.png" alt=""/>
                                <p>Продажа и установка высокоточных датчиков уровня и расхода топлива</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="section4">
        <div class="wrapper demoversion">
            <div class="content">
                <div class="table_cell">
                    <img class="logo_gelios" src="img/gelios.png" alt=""/>
                    <p>Gelios - это система мониторинга транспорта, позволяющая осуществлять online мониторинг состояния объекта, контроль расхода топлива, контроль состояния датчиков, контроль посещения различных геообъектов, контроль прохождения маршрутов, контроль качества вождения, контроль тревожного состояния объекта, учет технического обслуживания транспорта</p>
                    <div class="img_demoversion">
                        <img class="img_demoversion1" src="img/img_demoversion2.png" alt=""/>
                        <img class="img_demoversion2" src="img/img_demoversion1.png" alt=""/>
                        <img class="img_demoversion3" src="img/img_demoversion3.png" alt=""/>
                    </div>
                    <a href="#">демо-версия</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="section5">
        <div class="wrapper manufacture">
            <div class="title_content">
                <img src="img/manufacture_icon.png" alt=""/>
                Наше производство
            </div>
            <div class="img_gallery">
                <div>
                    <a href="img/unnamed1.jpg" data-lightbox="gallery"><div class="plus"><img src="img/plus.png"/></div><img src="img/m-unnamed1.jpg" alt="" /></a>
                </div>
                <div>
                    <a href="img/unnamed2.jpg" data-lightbox="gallery"><div class="plus"><img src="img/plus.png"/></div><img src="img/m-unnamed2.jpg" alt="" /></a>
                </div>
                <div>
                    <a href="img/unnamed3.jpg" data-lightbox="gallery"><div class="plus"><img src="img/plus.png"/></div><img src="img/m-unnamed3.jpg" alt="" /></a>
                </div>
                <div>
                    <a href="img/unnamed4.jpg" data-lightbox="gallery"><div class="plus"><img src="img/plus.png"/></div><img src="img/m-unnamed4.jpg" alt="" /></a>
                </div>
                <div>
                    <a href="img/unnamed5.jpg" data-lightbox="gallery"><div class="plus"><img src="img/plus.png"/></div><img src="img/m-unnamed5.jpg" alt="" /></a>
                </div>
                <div>
                    <a href="img/unnamed6.jpg" data-lightbox="gallery"><div class="plus"><img src="img/plus.png"/></div><img src="img/m-unnamed6.jpg" alt="" /></a>
                </div>
            </div>
            <div class="content">
                <div class="table_cell">
                    <div class="certificate">
                        <h1>Сертификаты</h1>
                        <div id="slider">
                            <div id="mask">
                                <ul id="image_container">
                                    <?php
/*                                    $flag = 1;
                                    foreach ($serts as $s) {
                                        */?>
                                        <?php
/*                                        if ($flag == 1) {
                                            echo '<li>';
                                        }
                                        */?>
                                        <a href="/uploads/<?/*= !empty($s->img) ? $s->img : '' */?>" data-lightbox="certificate"><img src="/uploads/thumbs/<?/*= !empty($s->img) ? $s->img : '' */?>" alt="" /></a>
                                        <?php
/*                                        if ($flag == 6) {
                                            echo '</li>';
                                        }
                                        */?>
                                        <?php
/*                                        $flag++;
                                        if ($flag >= 7) {
                                            $flag = 1;
                                        }
                                        */?>
                                    <?php /*} */?>
                                </ul>
                            </div>
                            <!--  <ul id="dots">
                              <li class="button1" onClick="changeImage(1)" ></li>
                              <li class="button2" onClick="changeImage(2)" ></li>
                            </ul> -->
                            <div id="fleche_gauche" class="fleche" onClick="prevImage()"><img src="img/arrow_prev.png"></div>
                            <div id="fleche_droite" class="fleche" onClick="nextImage()"><img src="img/arrow_next.png"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="section6">
        <div class="wrapper">
            <a class="reactive" href=""><div><img class="top_shadow" src="img/top_shadow.png" alt=""></div></a>
            <div id="map"></div>
            <div class="block_contacts">
                <div class="top_block_contacts">
                    <div class="header1 active_contact">Контакты</div>
                    <div class="header2">Обратная связь</div>
                </div>
                <div class="address">
                    <img class="close_address" src="img/close.png" alt="">
                    <img src="img/label.png" alt="" />
                    <p><span class="center_map center1">РФ, Московская область, г. Москва, ул. Севанская д.4 оф. 661</span><br>
                        <span class="center_map center3">РФ, Новосибирская область, г. Новосибирск, ул. Селезнева, д.33 оф.40</span><br>
                        <span class="center_map center2">РФ, Кемеровская область, г. Новокузнецк, пр-кт. Металлургов, д.39 оф.181</span></p>
                    <img style="margin-top:3%;" src="img/phone.png" alt="" />
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td><h6>Москва: </h6><p>+7 (903) 728-78-81</p></td>
                            <td><h6>Новосибирск: </h6><p>+7 (962) 835-55-88</p></td>
                            <td><h6>Новокузнецк: </h6><p>+7 (906) 930-23-23</p></td>
                        </tr>
                        <tr>
                            <td><h6>Оптовая закупка:</h6><p>Тел.: +7 (903) 728-78-81</p><p>E-mail: opt@arusnavi.ru</p></td>
                            <td><h6>Техподдержка<br> по оборудованию:</h6><p>support@arusnavi.ru</p></td>
                            <td><h6>Техподдержка по программному обеспечению:</h6><p>support@geliossoft.ru</p></td>
                        </tr>
                        <tr>
                            <td><h6>Техподдержка телефоны:</h6><p>Москва +7 (903) 724-70-45, Новосибирск +7 (962) 828-77-88,<br>Новокузнецк +7 (905) 934-88-55</p></td>
                            <td><h6>Отдел Логистики: </h6><p>+7 (964) 256-888</p></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="feedback">
                    <img class="close_address" src="img/close.png" alt="">
                    <?php /*$form2 = ActiveForm::begin(['id' => 'fb']) */?>
                    <textarea name="FeedbackForm[body]" id="" cols="" rows="" placeholder="Сообщение"></textarea>
                    <input type="text" name="FeedbackForm[name]" value="" placeholder="Имя"/>
                    <input type="text" name="FeedbackForm[email]" value="" placeholder="E-mail"/>
                    <input type="submit" name="" id="submitFB" value="отправить"/>

                    <div class="smff" style="display: none;">
                        <p>Сообщение отправлено</p>
                    </div>
                    <div class="emff" style="display: none;">
                        Заполните все поля, проверьте правильность ввода е-майл адреса и отправьте сообщение еще раз.
                    </div>
                    <input type="submit" id="fixff" style="display: none;" value="Исправить"/>
                    <?php /*ActiveForm::end() */?>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="fon_window"></div>
<div class="window_action">
    <img src="img/close_window.png" alt="" class="close_window"/>
    <div class="nakleuka">ПО СЕБЕСТОИМОСТИ</div>
    <div class="action_text">
        <h1>ARNAVI GELIOS</h1>
        <!-- <h2>2900<span>руб</span></h2>
        <p class="text_right"><span>Цены конкурентов:<br>от 3500 до 5000 руб</span></p> -->
        <hr noshade size="2px" color="#66c0da" />
        <p>При условии использования GeliosHosting</p>
        <div>осталось дней<br><span>До окончания акции</span>
            <img src="img/day_action.png" alt=""/>
        </div>
        <button id="arusnaviButt">заказать</button>
    </div>
    <div class="bg"><img src="img/window_action_bg.png" alt=""/></div>
</div>

<div class="top_order" style="height: 296px">
    <img class="close_window" src="img/close_window.png" alt=""/>
    <?php /*$form3 = ActiveForm::begin(['id' => 'requestPriceList']) */?>
    <p>Имя<br>
        <input type="text" name="RequestPriceListForm[name]" value=""/></p>
    <p>Телефон<br>
        <input type="text" name="RequestPriceListForm[phone]" value=""/></p>
    <p>E-mail<br>
        <input type="text" name="RequestPriceListForm[email]" value=""/></p>
    <p>Город<br>
        <input type="text" name="RequestPriceListForm[city]" value=""/></p>

    <div id="srplf" style="display: none;">
        <p>Запрос отправлен</p>
    </div>
    <div id="erplf" style="display: none;">
        <p>Заполните все поля, проверьте правильность ввода е-майл адреса и отправьте сообщение еще раз.</p>
    </div>
    <input type="submit" id="frplf" style="display: none;" value="Исправить"/>

    <input type="submit" id="submitRPLF" value="отправить"/>
    <?php /*ActiveForm::end() */?>
</div>

<div class="top_order2" style="height: 296px">
    <img class="close_window" src="img/close_window.png" alt=""/>
    <?php /*$form4 = ActiveForm::begin(['id' => 'arnaviOrderForm']) */?>
    <p>Имя<br>
        <input type="text" name="ArnaviOrderForm[name]" value=""/></p>
    <p>Телефон<br>
        <input type="text" name="ArnaviOrderForm[phone]" value=""/></p>
    <p>E-mail<br>
        <input type="text" name="ArnaviOrderForm[email]" value=""/></p>
    <p>Город<br>
        <input type="text" name="ArnaviOrderForm[city]" value=""/></p>

    <div id="saof" style="display: none;">
        <p>Заказ отправлен</p>
    </div>
    <div id="eaof" style="display: none;">
        <p>Заполните все поля, проверьте правильность ввода е-майл адреса и отправьте сообщение еще раз.</p>
    </div>
    <input type="submit" id="faof" style="display: none;" value="Исправить"/>


    <input type="submit" id="submitAOF" value="отправить"/>
    <?php /*ActiveForm::end() */?>
</div>

<div class="discription">
    <img class="close_window" src="img/close_window.png" alt=""/>
    <h1>555a777dawvevvwvwvvwv</h1>
    <p>advdvwvwvDVsvwvwv</p>
</div>

<!--вход-->
<div class="input">
    <div class="content_input">
        <div class="table_cell_input">
            <div class="top_block">
                <div>
                    <img src="img/input_icon.png" alt=""/>
                    <a href=""><span>Подключение стороннего<br> оборудования</span></a>
                    <p>Начала работать на рынке Кузбасса с 2004 года под именем ООО «Кузбасские навигационные системы». На сегодняшний день мы охватываем всю территорию <br><span>25.06.2015</span></p>
                </div>
                <div>
                    <img src="img/input_icon.png" alt=""/>
                    <a href=""><span>Подключение оборудования</span></a>
                    <p>Начала работать на рынке Кузбасса  с 2004 года под именем ООО «Кузбасские навигационные системы». На сегодняшний день мы охватываем всю территорию<br><span>25.06.2015</span></p>
                </div>
                <div>
                    <img src="img/input_icon.png" alt=""/>
                    <a href=""><span>Подключение стороннего <br>оборудования стороннего</span></a>
                    <p>Начала работать на рынке Кузбасса с 2004 года под именем ООО «Кузбасские навигационные системы». На сегодняшний день мы охватываем всю территорию <br><span>25.06.2015</span></p>
                </div>
            </div>
            <div class="center">
                <form action="" method="">
                    <img src="img/input_logo.png" alt=""/><br>
                    <input class="name" type="text" name="" value="" placeholder="Имя"/>
                    <input class="password" type="text" name="" value="" placeholder="Пароль"/>
                    <input type="submit" name="" value="ВОЙТИ"/>
                </form>
            </div>
            <div class="bottom_block">
                <div class="bottom_block1">
                    <img class="satellite" src="img/satellite.png" alt=""/>
                    <img class="dot_input_img" src="img/dot_input_img.png" alt=""/>
                    <div>
                        <h6>Cистема мониторинга <br>транспорта </h6>
                        <img src="img/gelios_logo.png" alt=""/>
                    </div>
                    <p>Gelios - это система мониторинга транспорта, позволяющая осуществлять online мониторинг состояния объекта, контроль расхода </p>
                </div>
                <div class="bottom_block2">
                    <img src="img/action_line.png" alt=""/>
                    <h1>ArnaviGelios</h1>
                    <h2>2901<span>руб*</span></h2>
                    <p>Цены конкурентов:<br>от 3500 до 5000 руб.</p>
                    <h6>*При условии использования GeliosHosting</h6>
                </div>
                <div class="bottom_block2">
                    <img src="img/action_line.png" alt=""/>
                    <h1>ArnaviGelios</h1>
                    <h2>2901<span>руб*</span></h2>
                    <p>Цены конкурентов:<br>от 3500 до 5000 руб.</p>
                    <h6>*При условии использования GeliosHosting</h6>
                </div>
            </div>
        </div>
    </div>
</div>-->