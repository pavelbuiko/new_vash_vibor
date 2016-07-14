<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use vova07\imperavi\Widget;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\StaticBlocks */
/* @var $form yii\widgets\ActiveForm */

$imageurl = Yii::$app->homeUrl . Yii::$app->controller->module->imagepath;
$options = ['rows' => 5];
$config = [
    'options' => [
        'accept' => 'image/*',
        'multiply' => false,
        'maxFileCount' =>1
    ],
    'pluginOptions' => [
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
                <?= $form->field($model, 'string4')->label('Заголовок')->hint('<span class="label label-warning"></span>') ?>

                <?php if ($model->type == 26  ) {?>
                    <?= $form->field($model, 'text1')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание:')->hint('<span class="label label-warning"></span>') ?>
                 <? }?>

                <?php if ($model->type == 11 ) {?>
                    <?= $form->field($model, 'text1')->label('Описнаие:'); ?>
                    <?= $form->field($model, 'text2')->label('Ссылка на сайт:'); ?>

                <? }?>


                <?php if ($model->type == 27 ) {?>
                    <?= $form->field($model, 'text1')->textarea($options)->label('Текст описания'); ?>
                <? }?>


                <?php if ($model->type == 22 ) {?>
                    <?= $form->field($model, 'string1')->label('Текст слева от фото:'); ?>
                    <?= $form->field($model, 'string2')->label('Текст справа от фото:'); ?>
                    <?= $form->field($model, 'text1')->textarea($options)->label('Текст описания'); ?>

                <? }?>


                <?php if ($model->type ==20 || $model->type ==21 ) {?>
                    <?= $form->field($model, 'text1')->textarea($options)->label('Текст описания'); ?>
                <? }?>
            </div>

                <?php if ($model->type != 27  && $model->type != 20 && $model->type != 26 && $model->type != 21) {?>
                    <div class="col-md-6">
                <?=  $form->field($model, 'files[]')->widget(FileInput::className(), $config, ['options' => ['multiple' => false]])->label('Фоновое Изображение(размер от 820px до 1400px )') ?>

                <span class="label label-danger"></span>

                <?php  if (!empty($images)) {

                    foreach ($images as $img) {
                        ?>
                        <div class="thumbnail">
                            <img alt="200x200" class="img-thumbnail" data-src="holder.js/300x250" style="width: 300px;" src="<?=$imageurl .$img->path ?>">

                            <div class="caption">
                                <p></p>
                                <p>
                                    <?=  Html::a('Удалить изображение', Url::toRoute(['delete-image', 'id' => $img->id, 'idUpdate' => $model->id]), ['class' => 'btn btn-danger']); ?>
                                </p>
                            </div>
                        </div>
                    <?php
                    }
                }
                ?>






            <!--  --><?/*=  Html::a('Добавить слайды', Url::toRoute(['add-plans']), ['class' => 'btn btn-danger']); */?>





            </div>
        <?}?>
            <div class="col-md-12">
                 <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
             <?=  Html::a('Назад', Url::toRoute(['index', 'type' => $model->type]), ['class' => 'btn btn-danger']); ?>

                </div>


            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>
