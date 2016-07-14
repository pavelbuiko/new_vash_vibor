<?php

use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\Url;



$this->title = "Изменение текстовой информации";
$this->params['breadcrumbs'][] = $this->title;
$options = ['rows' => 5];
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
            Обратная форма
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                 <?= $form->field($model, 'string3')->textarea($options)->label('Email получателей( через , ):'); ?>
            </div>
            <div class="col-md-12">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
            </div>

        </div>
    </div>




    <?php ActiveForm::end(); ?>
</div>