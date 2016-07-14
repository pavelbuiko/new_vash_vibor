<?php

use yii\helpers\Url;

$this->title = 'Главная страница';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <h1>Редактирование главной страницы</h1>
    <div class="panel panel-default">
        <div class="panel-heading">Все разделы</div>
        <div class="panel-body">
            <div class="list-group">
                <a href="<?= Url::toRoute('/managecontent/slider') ?>" class="list-group-item">
                    <h4 class="list-group-item-heading">Лицевой слайдер</h4>
                    <p class="list-group-item-text">Заголовок слайда, описание и внутренние сслыки...</p>
                </a>
            </div>
            <div class="list-group">
                <a href="<?= Url::toRoute('/managecontent/texts/main-page') ?>" class="list-group-item">
                    <h4 class="list-group-item-heading">Текстовая информация</h4>
                    <p class="list-group-item-text">Ссылки и текстовое содержимое...</p>
                </a>
            </div>
            <div class="list-group">
                <a href="<?= Url::toRoute('/managecontent/gwidget') ?>" class="list-group-item">
                    <h4 class="list-group-item-heading">Раздел "Натяжные потолки</h4>
                    <p class="list-group-item-text">Ссылки на резделы Галерии</p>
                </a>
            </div>
        </div>
    </div>
</div>
