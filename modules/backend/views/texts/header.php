<?php

use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\Url;



$this->title = "Изменение текстовой информации";
$this->params['breadcrumbs'][] = $this->title;
$options = ['rows' => 14];
$config = [
    'options' => [
        'accept' => 'image/*',
        'multiply' => false,
        'maxFileCount' =>1
    ],
    'pluginOptions' => [
        'showUpload' => true,
        'maxFileCount' => 1,
        'allowedFileExtension' => [
            'jpg', 'jpeg', 'png', 'gif',
        ]
    ]
];
$config2 = [
    'options' => [
        'accept' => 'image/*',
        'multiply' => true,
        'maxFileCount' =>5,
        'uploadUrl' => Url::toRoute(['add-plans']),
    ],
    'pluginOptions' => [
        'maxFileCount' => 1,
        'uploadExtraData' => [
            'plan' => 1,

        ],
        'allowedFileExtension' => [
            'jpg', 'jpeg', 'png', 'gif',
        ]
    ]
];
?>
<h1><?= $this->title ?></h1>
<div class="row">
    <?php
    $form = ActiveForm::begin();
    ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            Header текст
        </div>
        <div class="panel-body">
            <div class="col-md-3">
                <?= $form->field($m, 'string1')->label('Тект логотипа'); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($m, 'string2')->label('Телефон'); ?>
            </div>
        </div>
    </div>


    <div class="panel panel-success">
        <div class="panel-heading">
           Слайд 1
        </div>
        <div class="panel-body">
            <div class="col-md-3">
                <?= $form->field($m, 'string3')->textarea($options)->label('Слайд1( главный текст)'); ?>
            </div>



        </div>
    </div>


    <div class="panel panel-success">
        <div class="panel-heading">
            Слайд 8
        </div>
        <div class="panel-body">
            <div class="col-md-3">
                <?= $form->field($m, 'string6')->textarea($options)->label('Заголовок:'); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($m, 'string7')->textarea($options)->label('Адрес:'); ?>
            </div>

        </div>
    </div>

    <div class="col-md-12">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
        <?=  Html::a('Назад', Url::toRoute(['index', 'type' => $model->type]), ['class' => 'btn btn-danger']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>