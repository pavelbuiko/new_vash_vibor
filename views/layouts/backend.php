<?php

use kartik\nav\NavX;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\BackendAsset;
use app\components\widgets\AlertWidget;



/* @var $this \yii\web\View */
/* @var $content string */

BackendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
    </head>
    <body>


            <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [ 
                    Yii::$app->user->isGuest ?
                            ['label' => Yii::t('app', 'NAV_LOGIN'), 'url' => ['/user/default/login']] :
                            ['label' => Yii::t('app', 'NAV_LOGOUT') . ' (' . Yii::$app->user->identity->username . ')',
                                'url' => ['/user/default/logout'],
                                'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
            ?>


            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'homeLink' => ['label' => 'Админка', 'url' => '/managecontent/default/index'],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= AlertWidget::widget() ?>
                <div class="row">
                    <div class="col-md-3">
                        <?= !Yii::$app->user->isGuest ? Navx::widget([
                            'options' => ['class' => 'nav nav-pills nav-stacked'],
                            'items' => [
                                ['label' => 'Риэлторы', 'url' => '/managecontent/realtors'],
                                ['label' => 'Объекты', 'url' => '/managecontent/objects'],
                                ['label' => 'Акции', 'url' => '/managecontent/stock'],
                                ['label' => 'Контакты', 'url' => '/managecontent/contacts'],
                                ['label' => 'Описание с фото', 'url' => '/managecontent/slider?type=11'],
                                ['label' => 'Главная',     'url' => '/managecontent/' , 'items' => [
                                    ['label' => 'Отображение объектов', 'url' => '/managecontent/main'],
                                    ['label' => 'Отображение акций', 'url' => '/managecontent/main/stock'],
                                    ['label' => 'Калькулятор ипотеки', 'url' => '/managecontent/price'],
                                    ['label' => 'Плюсы', 'url' => '/managecontent/slider?type=20'],
                                    ['label' => 'АГЕНСТВО ВАШ ВЫБОР+ ЭТО', 'url' => '/managecontent/slider?type=21'],
                                    ['label' => 'Слайдеры', 'items' => [
                                        ['label' => 'Помощь по ипотеке', 'url' => '/managecontent/slider?type=27'],
                                        ['label' => 'Горячие предложения', 'url' => '/managecontent/slider?type=20'],
                                        ['label' => 'Информация по квартире', 'url' => '/managecontent/slider?type=26'],
                                    ]],
                                    ['label' => 'Карта', 'url' => '/managecontent/map'],
                                ]],
                                ['label' => 'Объекты',     'url' => '/managecontent/' , 'items' => [
                                    ['label' => 'Инфраструктура', 'url' => '/managecontent/infrastructure'],
                                    ['label' => 'Слайдер типы квартир', 'url' => '/managecontent/flat?type=1'],
                                    ['label' => 'Квартиры', 'url' => '/managecontent/flat?type=2'],
                                    ['label' => 'Планировки квартир', 'url' => '/managecontent/plans'],
                                ]],

                            ],
                            'activateParents' => true,
                            'activateItems' => true,
                        ]) : '' ?>
                    </div>
                    <div class="col-md-9">
                        <?= $content ?>
                    </div>
                </div>                
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>               
            </div>
        </footer>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
