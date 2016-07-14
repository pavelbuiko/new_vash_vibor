<div class="content">
    <div style="background-image: url('/img/our-team-background.jpg')" class="inner-page-background">
        <div class="inner-page-header">
            <h1>Наша команда</h1>
        </div>
        <div class="all-team-members">

            <?
                foreach($realtors as $realtor){
            ?>
                    <div class="single-team-member">
                        <div class="team-member-photo-block">
                            <div style="background-image: url('<?= '/../uploads/' .$realtor->photo?>')" class="team-member-photo"></div>
                            <div class="team-member-contacts-icon">

                                <a href=""><i aria-hidden="true" class="fa fa-google-plus"></i></a>
                                <a href=""><i aria-hidden="true" class="fa fa-twitter"></i></a>
                                <a href=""><i aria-hidden="true" class="fa fa-facebook"></i></a>
                            </div>
                            <div class="team-member-quote">
                                <p><?=$realtor->slogan?></p>
                            </div>
                        </div>
                        <div class="team-member-text-block">
                            <p>Риэлтор</p>
                            <h1><?=$realtor->name?></h1>
                            <p><?=$realtor->filial?> филиал</p>
                            <div class="team-member-phone-block">
                                <div class="team-member-phone">
                                    <span class="phone-mask">8 XXX-XXX-XX-XX</span>
                                    <span class="hidden-phone"><?=$realtor->phone?></span>
                                </div>
                                <div class="show-phone-button">
                                    <a href="">Показать номер</a>
                                </div>
                            </div>
                            <div class="team-member-description">
                                <p> <?=$realtor->description;?> </p>

                            </div>
                            <div class="team-member-certificats-container">
                                <?
                                    $certificates = $realtor->getCertificates($realtor->id);
                                    foreach($certificates as $certificate){

                                ?>
                                        <div style="background-image: url('<?= '/../uploads/' .$certificate->path?>')" class="team-member-certificate"></div>


                                <?}?>

                               <!-- <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                                <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                                <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>-->
                            </div>
                        </div>
                    </div>

            <? }?>










         <!--
            <div class="single-team-member">
                <div class="team-member-photo-block">
                    <div style="background-image: url('/img/team-member-image.jpg')" class="team-member-photo"></div>
                    <div class="team-member-contacts-icon">
                        <i aria-hidden="true" class="fa fa-google-plus"></i>
                        <i aria-hidden="true" class="fa fa-twitter"></i>
                        <i aria-hidden="true" class="fa fa-facebook"></i>
                    </div>
                    <div class="team-member-quote">
                        <p>Стремись к лучшему и не останавливайся на достигнутом</p>
                    </div>
                </div>
                <div class="team-member-text-block">
                    <p>Риэлтор</p>
                    <h1>Емельянченко Олег Евгеньевич</h1>
                    <p>Северный филиал</p>
                    <div class="team-member-phone-block">
                        <div class="team-member-phone">
                            <span class="phone-mask">8 XXX-XXX-XX-XX</span>
                            <span class="hidden-phone">8 029-123-45-67</span>
                        </div>
                        <div class="show-phone-button">
                            <a href="">Показать номер</a>
                        </div>
                    </div>
                    <div class="team-member-description">
                        <p>ОБРАЗОВАНИЕ:
                            <span>Белорусский негосударственный институт правоведения. Юрист.</span>
                        </p>
                        <p>ПРОФЕССИОНАЛЬНЫЙ СТАЖ:
                            <span>Работа в сфере недвижимости — с марта 2006 года.</span>
                        </p>
                        <p>ПРОФЕССИОНАЛЬНЫЕ НАВЫКИ:
                                <span>В апреле 2011г., в октябре 2015г. прошла обучение на курсах повышения квалификации в УО "Институт переподготовки и повышения квалификации судей, работников прокуратуры, судов и учреждений юстиции БГУ". Свидетельство Министерства
                                    юстиции Республики Беларусь об аттестации риэлтера №596 до 21.06.2016г.</span>
                        </p>
                    </div>
                    <div class="team-member-certificats-container">
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                    </div>
                </div>
            </div>
            <div class="single-team-member">
                <div class="team-member-photo-block">
                    <div style="background-image: url('/img/team-member-image.jpg')" class="team-member-photo"></div>
                    <div class="team-member-contacts-icon">
                        <i aria-hidden="true" class="fa fa-google-plus"></i>
                        <i aria-hidden="true" class="fa fa-twitter"></i>
                        <i aria-hidden="true" class="fa fa-facebook"></i>
                    </div>
                    <div class="team-member-quote">
                        <p>Стремись к лучшему и не останавливайся на достигнутом</p>
                    </div>
                </div>
                <div class="team-member-text-block">
                    <p>Риэлтор</p>
                    <h1>Емельянченко Олег Евгеньевич</h1>
                    <p>Северный филиал</p>
                    <div class="team-member-phone-block">
                        <div class="team-member-phone">
                            <span class="phone-mask">8 XXX-XXX-XX-XX</span>
                            <span class="hidden-phone">8 029-123-45-67</span>
                        </div>
                        <div class="show-phone-button">
                            <a href="">Показать номер</a>
                        </div>
                    </div>
                    <div class="team-member-description">
                        <p>ОБРАЗОВАНИЕ:
                            <span>Белорусский негосударственный институт правоведения. Юрист.</span>
                        </p>
                        <p>ПРОФЕССИОНАЛЬНЫЙ СТАЖ:
                            <span>Работа в сфере недвижимости — с марта 2006 года.</span>
                        </p>
                        <p>ПРОФЕССИОНАЛЬНЫЕ НАВЫКИ:
                                <span>В апреле 2011г., в октябре 2015г. прошла обучение на курсах повышения квалификации в УО "Институт переподготовки и повышения квалификации судей, работников прокуратуры, судов и учреждений юстиции БГУ". Свидетельство Министерства
                                    юстиции Республики Беларусь об аттестации риэлтера №596 до 21.06.2016г.</span>
                        </p>
                    </div>
                    <div class="team-member-certificats-container">
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                    </div>
                </div>
            </div>
            <div class="single-team-member">
                <div class="team-member-photo-block">
                    <div style="background-image: url('/img/team-member-image.jpg')" class="team-member-photo"></div>
                    <div class="team-member-contacts-icon">
                        <i aria-hidden="true" class="fa fa-google-plus"></i>
                        <i aria-hidden="true" class="fa fa-twitter"></i>
                        <i aria-hidden="true" class="fa fa-facebook"></i>
                    </div>
                    <div class="team-member-quote">
                        <p>Стремись к лучшему и не останавливайся на достигнутом</p>
                    </div>
                </div>
                <div class="team-member-text-block">
                    <p>Риэлтор</p>
                    <h1>Емельянченко Олег Евгеньевич</h1>
                    <p>Северный филиал</p>
                    <div class="team-member-phone-block">
                        <div class="team-member-phone">
                            <span class="phone-mask">8 XXX-XXX-XX-XX</span>
                            <span class="hidden-phone">8 029-123-45-67</span>
                        </div>
                        <div class="show-phone-button">
                            <a href="">Показать номер</a>
                        </div>
                    </div>
                    <div class="team-member-description">
                        <p>ОБРАЗОВАНИЕ:
                            <span>Белорусский негосударственный институт правоведения. Юрист.</span>
                        </p>
                        <p>ПРОФЕССИОНАЛЬНЫЙ СТАЖ:
                            <span>Работа в сфере недвижимости — с марта 2006 года.</span>
                        </p>
                        <p>ПРОФЕССИОНАЛЬНЫЕ НАВЫКИ:
                                <span>В апреле 2011г., в октябре 2015г. прошла обучение на курсах повышения квалификации в УО "Институт переподготовки и повышения квалификации судей, работников прокуратуры, судов и учреждений юстиции БГУ". Свидетельство Министерства
                                    юстиции Республики Беларусь об аттестации риэлтера №596 до 21.06.2016г.</span>
                        </p>
                    </div>
                    <div class="team-member-certificats-container">
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                    </div>
                </div>
            </div>
            <div class="single-team-member">
                <div class="team-member-photo-block">
                    <div style="background-image: url('/img/team-member-image.jpg')" class="team-member-photo"></div>
                    <div class="team-member-contacts-icon">
                        <i aria-hidden="true" class="fa fa-google-plus"></i>
                        <i aria-hidden="true" class="fa fa-twitter"></i>
                        <i aria-hidden="true" class="fa fa-facebook"></i>
                    </div>
                    <div class="team-member-quote">
                        <p>Стремись к лучшему и не останавливайся на достигнутом</p>
                    </div>
                </div>
                <div class="team-member-text-block">
                    <p>Риэлтор</p>
                    <h1>Емельянченко Олег Евгеньевич</h1>
                    <p>Северный филиал</p>
                    <div class="team-member-phone-block">
                        <div class="team-member-phone">
                            <span class="phone-mask">8 XXX-XXX-XX-XX</span>
                            <span class="hidden-phone">8 029-123-45-67</span>
                        </div>
                        <div class="show-phone-button">
                            <a href="">Показать номер</a>
                        </div>
                    </div>
                    <div class="team-member-description">
                        <p>ОБРАЗОВАНИЕ:
                            <span>Белорусский негосударственный институт правоведения. Юрист.</span>
                        </p>
                        <p>ПРОФЕССИОНАЛЬНЫЙ СТАЖ:
                            <span>Работа в сфере недвижимости — с марта 2006 года.</span>
                        </p>
                        <p>ПРОФЕССИОНАЛЬНЫЕ НАВЫКИ:
                                <span>В апреле 2011г., в октябре 2015г. прошла обучение на курсах повышения квалификации в УО "Институт переподготовки и повышения квалификации судей, работников прокуратуры, судов и учреждений юстиции БГУ". Свидетельство Министерства
                                    юстиции Республики Беларусь об аттестации риэлтера №596 до 21.06.2016г.</span>
                        </p>
                    </div>
                    <div class="team-member-certificats-container">
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                    </div>
                </div>
            </div>
            <div class="single-team-member">
                <div class="team-member-photo-block">
                    <div style="background-image: url('/img/team-member-image.jpg')" class="team-member-photo"></div>
                    <div class="team-member-contacts-icon">
                        <i aria-hidden="true" class="fa fa-google-plus"></i>
                        <i aria-hidden="true" class="fa fa-twitter"></i>
                        <i aria-hidden="true" class="fa fa-facebook"></i>
                    </div>
                    <div class="team-member-quote">
                        <p>Стремись к лучшему и не останавливайся на достигнутом</p>
                    </div>
                </div>
                <div class="team-member-text-block">
                    <p>Риэлтор</p>
                    <h1>Емельянченко Олег Евгеньевич</h1>
                    <p>Северный филиал</p>
                    <div class="team-member-phone-block">
                        <div class="team-member-phone">
                            <span class="phone-mask">8 XXX-XXX-XX-XX</span>
                            <span class="hidden-phone">8 029-123-45-67</span>
                        </div>
                        <div class="show-phone-button">
                            <a href="">Показать номер</a>
                        </div>
                    </div>
                    <div class="team-member-description">
                        <p>ОБРАЗОВАНИЕ:
                            <span>Белорусский негосударственный институт правоведения. Юрист.</span>
                        </p>
                        <p>ПРОФЕССИОНАЛЬНЫЙ СТАЖ:
                            <span>Работа в сфере недвижимости — с марта 2006 года.</span>
                        </p>
                        <p>ПРОФЕССИОНАЛЬНЫЕ НАВЫКИ:
                                <span>В апреле 2011г., в октябре 2015г. прошла обучение на курсах повышения квалификации в УО "Институт переподготовки и повышения квалификации судей, работников прокуратуры, судов и учреждений юстиции БГУ". Свидетельство Министерства
                                    юстиции Республики Беларусь об аттестации риэлтера №596 до 21.06.2016г.</span>
                        </p>
                    </div>
                    <div class="team-member-certificats-container">
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                    </div>
                </div>
            </div>
            <div class="single-team-member">
                <div class="team-member-photo-block">
                    <div style="background-image: url('/img/team-member-image.jpg')" class="team-member-photo"></div>
                    <div class="team-member-contacts-icon">
                        <i aria-hidden="true" class="fa fa-google-plus"></i>
                        <i aria-hidden="true" class="fa fa-twitter"></i>
                        <i aria-hidden="true" class="fa fa-facebook"></i>
                    </div>
                    <div class="team-member-quote">
                        <p>Стремись к лучшему и не останавливайся на достигнутом</p>
                    </div>
                </div>
                <div class="team-member-text-block">
                    <p>Риэлтор</p>
                    <h1>Емельянченко Олег Евгеньевич</h1>
                    <p>Северный филиал</p>
                    <div class="team-member-phone-block">
                        <div class="team-member-phone">
                            <span class="phone-mask">8 XXX-XXX-XX-XX</span>
                            <span class="hidden-phone">8 029-123-45-67</span>
                        </div>
                        <div class="show-phone-button">
                            <a href="">Показать номер</a>
                        </div>
                    </div>
                    <div class="team-member-description">
                        <p>ОБРАЗОВАНИЕ:
                            <span>Белорусский негосударственный институт правоведения. Юрист.</span>
                        </p>
                        <p>ПРОФЕССИОНАЛЬНЫЙ СТАЖ:
                            <span>Работа в сфере недвижимости — с марта 2006 года.</span>
                        </p>
                        <p>ПРОФЕССИОНАЛЬНЫЕ НАВЫКИ:
                                <span>В апреле 2011г., в октябре 2015г. прошла обучение на курсах повышения квалификации в УО "Институт переподготовки и повышения квалификации судей, работников прокуратуры, судов и учреждений юстиции БГУ". Свидетельство Министерства
                                    юстиции Республики Беларусь об аттестации риэлтера №596 до 21.06.2016г.</span>
                        </p>
                    </div>
                    <div class="team-member-certificats-container">
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                        <div style="background-image: url('/img/team-member-certificate.png')" class="team-member-certificate"></div>
                    </div>
                </div>
            </div>-->
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
</div>