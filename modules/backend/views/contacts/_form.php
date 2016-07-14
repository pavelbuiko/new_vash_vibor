<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\StaticBlocks */
/* @var $form yii\widgets\ActiveForm */

$imageurl = Yii::$app->homeUrl . Yii::$app->controller->module->imagepath;

$config = [
    'options' => [
        'accept' => 'image/*',
        'multiply' => true,
    ],
    'pluginOptions' => [
        'allowedFileExtension' => [
            'jpg', 'jpeg', 'png', 'gif',
        ]
    ]
];


$configImperavi = [
    'settings' => [
        'lang'          => 'ru',
        'toolbarFixed'  => true,
        'placeholder' => 'Введите текст',
        'minHeight' => 200,
        'buttons' => [
            'html', 'bold', 'italic', 'deleted', 'link', 'unorderedlist', 'orderedlist',
        ],
        'buttonSource' => true,
        'linebreaks' => true,
    ]
];
?>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data'],
            ]); ?>
            <div class="col-md-6">
                <?= $form->field($model, 'string1')->label('Email: ')->hint('<span class="label label-warning"></span>') ?>
                <?= $form->field($model, 'string2')->label('Адрес: ')->hint('<span class="label label-warning"></span>') ?>
                <?= $form->field($model, 'string3')->label('Телефон( Header блок): ')->hint('<span class="label label-warning"></span>') ?>
                <?= $form->field($model, 'string4')->label('Телефон1(блок контакты): ')->hint('<span class="label label-warning"></span>') ?>
                <?= $form->field($model, 'string5')->label('Телефон2( блок контакты): ')->hint('<span class="label label-warning"></span>') ?>
                <?= $form->field($model, 'string6')->label('Телефон3( блок контакты): ')->hint('<span class="label label-warning"></span>') ?>
                <?= $form->field($model, 'string7')->label('Телефон ( Footer блок): ')->hint('<span class="label label-warning"></span>') ?>


                <div class="panel panel-default">
                    <div class="panel-heading">В сети: </div>
                    <div class="panel-body">

                        <?= $form->field($model, 'string8')->label('Gmail')->hint('<span class="label label-warning"></span>') ?>
                        <?= $form->field($model, 'string9')->label('Twitter')->hint('<span class="label label-warning"></span>') ?>
                        <?= $form->field($model, 'string10')->label('Message')->hint('<span class="label label-warning"></span>') ?>
                        <?= $form->field($model, 'string11')->label('Facebook')->hint('<span class="label label-warning"></span>') ?>
                        <?= $form->field($model, 'string12')->label('Rss Feeds')->hint('<span class="label label-warning"></span>') ?>

                    </div>
                </div>






                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
