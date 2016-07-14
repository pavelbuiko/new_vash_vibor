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


$this->title = 'Разделы: "Режим работы", "' . $model->string7 . "\", \"" . $model->string8 . "\"";
$this->params['breadcrumbs'][] = ['label' => 'Дилерам', 'url' => '/managecontent/default/distributors'];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        ]);
?>
<h1>Текстовые блоки</h1>

    <?php if(Yii::$app->session->hasFlash('saveDesc')) { ?>
    <div class="alert alert-success">Информация сохранена</div>
    <?php } ?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Режим работы</div>
        <div class="panel-body">
            <div class="col-md-3">
                <?php
                echo $form->field($model, 'text1')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>
            <div class="col-md-3">
                <?php
                echo $form->field($model, 'text2')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>
            <div class="col-md-3">
                <?php
                echo $form->field($model, 'text3')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>
            <div class="col-md-3">
                <?php
                echo $form->field($model, 'text4')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>            
        </div>
    </div>
    
    <div class="panel panel-warning">
        <div class="panel-heading">Раздел страницы: <?= $form->field($model, 'string7')->label('') ?></div>
        <div class="panel-body">
            <div class="col-md-4">
                <?= $form->field($model, 'string1')->label('') ?>
                <?php
                echo $form->field($model, 'text5')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
                <?= $form->field($model, 'string4')->label('') ?>
                <?php echo $form->field($model, 'text8')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'string2')->label('') ?>
                <?php
                echo $form->field($model, 'text6')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
                <?= $form->field($model, 'string5')->label('') ?>
                <?php
                echo $form->field($model, 'text9')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>                
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'string3')->label('') ?>
                <?php
                echo $form->field($model, 'text7')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
                <?= $form->field($model, 'string6')->label('') ?>
                <?php
                echo $form->field($model, 'text10')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>                
            </div>
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">Раздел страницы: <?= $form->field($model, 'string8')->label('') ?></div>
        <div class="panel-body">
            <div class="col-md-12">
                <?php
                echo $form->field($model, 'text11')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>                
            </div>
        </div>
    </div>

</div>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
<?php ActiveForm::end(); ?>
