<?php

use yii\helpers\Url;

$this->title = 'О компании';
$this->params['breadcrumbs'][] = $this->title;

//$nameBlock = 'Сотрудничество';
?>
<div class="row">
    <h1>Редактирование страницы "О Компании"</h1>
    <div class="panel panel-default">
        <div class="panel-heading">Все разделы страницы</div>
        <div class="panel-body">
            <div class="col-md-12">
                                <div class="list-group">
                    <a href="<?= Url::toRoute('/managecontent/texts/about-company') ?>" class="list-group-item">
                        <h4 class="list-group-item-heading">Блок "О КОМПАНИИ"</h4>
                        <p class="list-group-item-text">Расположен в начале страницы</p>
                    </a>
                </div>
                <div class="list-group">
                    <a href="<?= Url::toRoute('/managecontent/ourvalues') ?>" class="list-group-item">
                        <h4 class="list-group-item-heading">Наши ценности</h4>
                        <p class="list-group-item-text">Блок с перечислением ценностей...</p>
                    </a>
                </div>
                <div class="list-group">
                    <a href="<?= Url::toRoute('/managecontent/ourpartners') ?>" class="list-group-item">
                        <h4 class="list-group-item-heading">Наши партнеры</h4>
                        <p class="list-group-item-text">Название компании, логотип...</p>
                    </a>
                </div>
                <div class="list-group">
                    <a href="<?= Url::toRoute('/managecontent/lettersthanks') ?>" class="list-group-item">
                        <h4 class="list-group-item-heading">Письма благодарности</h4>
                        <p class="list-group-item-text">Наименование организации, текст письма...</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-warning">
        <div class="panel-heading">История</div>
        <div class="panel-body">
            <div class="list-group">
                <a href="<?= Url::toRoute('/managecontent/history') ?>" class="list-group-item">
                    <h4 class="list-group-item-heading">История</h4>
                    <p class="list-group-item-text"></p>
                </a>
            </div>            
        </div>
    </div>
</div>
