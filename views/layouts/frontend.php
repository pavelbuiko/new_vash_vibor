<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\FrontendAsset;
use app\modules\backend\models\StaticBlocks;

/* @var $this \yii\web\View */
/* @var $content string */

FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <header class="header">
        <div class="header-top-line">
            <div class="padding-content">
                <div class="logo">
                    <a href="#">
                        <img src="/img/logo.png">
                    </a>
                </div>
                <div class="header-phone">
                    <span><?= $this->context->contact->string3;  ?></span>
                </div>
                <div class="get-call-button"></div>
            </div>
        </div>
        <div class="header-bottom-line">
            <div class="padding-content">
                <div class="header-menu">
                    <ul>
                        <li>
                            <a href="<?=Url::toRoute('/');?>">Главная</a>
                        </li>
                        <li>

                            <a href="<?=Url::toRoute('/our-team');?>">Объекты</a>
                        </li>
                        <li>
                            <a href="<?=Url::toRoute('/our-team');?>">О компании</a>
                        </li>
                        <li>
                            <a href="#">Ипотека</a>
                        </li>
                        <li>
                            <a href="<?=Url::toRoute('/contacts');?>">Контакты</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>


        <?php $this->beginBody() ?>
        
            <?= $content ?>

        <?php $this->endBody() ?>
    <footer class="footer">
        <div class="footer-top-line">
            <?
                $under_fotos = $this->context->under_photos;
                foreach($under_fotos as $photo){
            ?>
                    <div style="background-image: url('<?= '/../uploads/' .$photo->getImg()?>')" class="another-landing-block">
                        <h1><?=$photo->string4;?></h1>
                        <a href="http://<?=$photo->text2;?>"><?=$photo->text2;?></a>
                        <div class="another-landing-description">
                            <h1><?=$photo->string4;?></h1>
                            <p><?=$photo->text1;?></p>
                            <a href="http://<?=$photo->text2;?>"><?=$photo->text2;?></a>
                        </div>
                    </div>


            <? }?>

        </div>
        <div class="footer-bottom-line">
            <div class="footer-copyright">
                <p>© 2016 “Ваш выбор”</p>
                <div class="icons-block">
                    <a href="<?= $this->context->contact->string8;  ?>"  target="_blank"> <div style="background-image: url('/img/contacts-icon-1.png')" class="single-icon"></div></a>
                    <a href="<?= $this->context->contact->string9;  ?>"  target="_blank"> <div style="background-image: url('/img/contacts-icon-2.png')" class="single-icon"></div></a>
                    <a href="<?= $this->context->contact->string10;  ?>" target="_blank"> <div style="background-image: url('/img/contacts-icon-3.png')" class="single-icon"></div></a>
                    <a href="<?= $this->context->contact->string11;  ?>" target="_blank"> <div style="background-image: url('/img/contacts-icon-4.png')" class="single-icon"></div></a>
                    <a href="<?= $this->context->contact->string12;  ?>" target="_blank"> <div style="background-image: url('/img/contacts-icon-5.png')" class="single-icon"></div></a>
                </div>
            </div>
            <div class="footer-phone">
                <h1><?= $this->context->contact->string7;  ?></h1>
                <p><?= $this->context->contact->string2;  ?></p>
            </div>
            <div class="reactive-logo">
                <a href="http://reactive.by" target="_blank">
                    <span>Дизайн и разработка -</span>
                    <img src="/img/reactive-logo.png">
                </a>
            </div>
        </div>
    </footer>
    </body>
</html>
<?php $this->endPage() ?>
