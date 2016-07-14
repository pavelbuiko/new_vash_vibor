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
                <?= $form->field($model, 'string1')->label('Наименование компании')->hint('<span class="label label-warning"></span>') ?>
                
                <?php  /* echo $form->field($model, 'text1')
                    ->widget(Widget::className(), $configImperavi)
                    ->label('Описание качеств')
                    ->hint('<span class="label label-warning"></span>') //*/ ?>
                <p style="color:red;">*размеры нового изображения должны соответствовать размерам старого изображения</p>
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
            </div>
            <div class="col-md-6">
                <?=  $form->field($model, 'files[]')->widget(FileInput::className(), $config)->label('Изображение') ?>
                <span class="label label-danger"></span>
                <?php                 if (!empty($images)) {
                    foreach ($images as $img) {
                        ?>
                        <div class="thumbnail">                       	
                            <img alt="200x200" class="img-thumbnail" data-src="holder.js/300x250" style="width: 300px;" src="<?=  $imageurl . $img->path ?>">
                            <div class="caption">
                                <p></p>
                                <p>
                                    <?=  Html::a('Удалить изображение', Url::toRoute(['delete-image', 'id' => $img->id, 'idUpdate' => $model->id]), ['class' => 'btn btn-danger']); ?>                    
                                </p>
                            </div>
                        </div>
                    <?php                     }
                }
                ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
