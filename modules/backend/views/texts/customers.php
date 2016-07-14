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
        'accept' => '*',
        'multiply' => true,
    ],
    'pluginOptions' => [
        'allowedFileExtension' => [
            'jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx'
        ]
    ]
];

$configImperavi = [
    'settings' => [
        'lang' => 'ru',
        'toolbarFixed' => true,
        'placeholder' => 'Введите текст',
        'minHeight' => 200,
        'buttons' => [
            'html', 'bold', 'italic', 'deleted', 'link',
        ],
        'buttonSource' => true,
        'linebreaks' => true,
    ]
];


$this->title = 'Частным клиентам';

$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$form = ActiveForm::begin();
?>
<h1><?= $this->title ?></h1>
<?php if (Yii::$app->session->hasFlash('saveDesc')) { ?>
    <div class="alert alert-success">Информация сохранена</div>
<?php } ?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Описание вверху страницы</div>
        <div class="panel-body">
            <div class="col-md-12">
                <?php // $form->field($model, 'string1')->label('') ?>
                <?php
                echo $form->field($model, 'text1')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>            
        </div>
    </div>    


    <div class="panel panel-warning">
        <div class="panel-heading">Раздел: <?php
            echo $form->field($model, 'text3')
                    ->label('')
                    ->hint('<span class="label label-warning">Заголовок</span>') // */ 
            ?></div>
        <div class="panel-body">
            <div class="col-md-12">
                <?php
                echo $form->field($model, 'text4')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                ?>
                <?php
                echo $form->field($model, 'text5')
                        ->label('')
                        ->hint('<span class="label label-warning">Заголовок</span>') // */ 
                ?>
                <?php
                echo $form->field($model, 'text6')
                        ->label('')
                        ->widget(Widget::className(), $configImperavi)
                ?>
            </div>                      
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Раздел в нижней части страницы, ниже "Этапов работы", выше формы связи</div>
        <div class="panel-body">
            <div class="col-md-12">
                <?php
                echo $form->field($model, 'text2')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                ?>                
            </div>                      
        </div>
    </div>
</div>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
<?php ActiveForm::end(); ?>
<p>
<div class="alert alert-warning">
    <a href="<?= Url::toRoute(['/individual-customer']) ?>" target="_blank" class="alert-link"><strong>Просмотреть</strong></a> на сайте.
</div>
</p>

