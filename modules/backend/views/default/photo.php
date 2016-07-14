<?php

use yii\helpers\Url;

$this->title = 'Блоки с фото';
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
                    <a href="<?= Url::toRoute('/managecontent/sert') ?>" class="list-group-item">
                        <h4 class="list-group-item-heading">Сертификаты</h4>
                    </a>
                </div>
                <div class="list-group">
                    <a href="<?= Url::toRoute('/managecontent/cat') ?>" class="list-group-item">
                        <h4 class="list-group-item-heading">Категории продукции</h4>
                    </a>
                </div>                
                <div class="list-group">
                    <a href="<?= Url::toRoute('/managecontent/pr') ?>" class="list-group-item">
                        <h4 class="list-group-item-heading">Элементы продукции</h4>
                    </a>
                </div>   
            </div>
        </div>
    </div>
    
</div>
