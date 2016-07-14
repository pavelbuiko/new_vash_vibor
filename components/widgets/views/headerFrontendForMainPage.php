<?php ?>
<section class="slider_top">
    <div id="slider">
        <div id="mask">
            <ul id="image_container">
                <li class="img_slider1" style="background:url(uploads/thumbs/<?= $slides[0]->getImages()[0]->path ?>) no-repeat center">
                    <div class="wrap slogan">
                        <div><?= $slides[0]->string1 ?><br><span><?= $slides[0]->text1 ?></span></div>
                    </div>
                </li>
                <a href="<?= $slides[1]->string2 ?>"><li class="img_slider2" style="background:url(uploads/thumbs/<?= $slides[1]->getImages()[0]->path ?>) no-repeat center">
                        <div class="wrap">
                            <div class="discription_novelty"><span><?= $slides[1]->string1 ?></span>
                                <p><?= $slides[1]->text1 ?></p>
                            </div>
                        </div>
                    </li></a>
                <a href="<?= $slides[2]->string2 ?>"><li class="img_slider3" style="background:url(uploads/thumbs/<?= $slides[2]->getImages()[0]->path ?>) no-repeat center">
                        <div class="wrap">
                            <div class="discription_novelty"><span><?= $slides[2]->string1 ?></span>
                                <p><?= $slides[2]->text1 ?></p>
                            </div>
                        </div>
                    </li></a>
                <a href="<?= $slides[3]->string2 ?>"><li class="img_slider4" style="background:url(uploads/thumbs/<?= $slides[3]->getImages()[0]->path ?>) no-repeat center">
                        <div class="wrap">
                            <div class="discription_novelty"><span><?= $slides[3]->string1 ?></span>
                                <p><?= $slides[3]->text1 ?></p>
                            </div>
                        </div>
                    </li></a>
            </ul>
        </div>
        <!--<ul id="dots">
                <li class="button1" onClick="changeImage(1)" ></li>
                <li class="button2" onClick="changeImage(2)" ></li>
                <li class="button3" onClick="changeImage(3)" ></li>
                <li class="button4" onClick="changeImage(4)" ></li>
                <li class="button5" onClick="changeImage(5)" ></li>
        </ul>-->
    </div>
    <div class="wrap_clients">
        <section class="clients">
            <a href="<?= $model->string2 ?>"><div><span><?= $model->string1 ?></span></div></a>
            <a href="<?= $model->string4 ?>"><div><span><?= $model->string3 ?></span></div></a>
            <a href="<?= $model->string6 ?>"><div><span><?= $model->string5 ?></span></div></a>
        </section>
    </div>
    <!--
    <div class="consultant">
        <div class="img_consultant"><img src="/img/consultant.png" alt=""></div>
        <div class="text_consultant">КОНСУЛЬТАНТ</div>
    </div>    -->
</section>