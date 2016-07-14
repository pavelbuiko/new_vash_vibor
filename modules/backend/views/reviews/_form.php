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
$options = ['rows' => 14];
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
                <?= $form->field($model, 'text4')
                    ->widget(Widget::className(), $configImperavi)
                    ->label('О компании(левый блок):')->hint('<span class="label label-warning"></span>') ?>

             </div>
            <div class="col-md-6">
                <?= $form->field($model, 'text5')
                    ->widget(Widget::className(), $configImperavi)
                    ->label('О компании(ghfdsq блок):')->hint('<span class="label label-warning"></span>') ?>


            </div>
            <div class="col-md-12">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
