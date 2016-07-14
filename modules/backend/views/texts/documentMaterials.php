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
            'html', 'bold', 'italic', 'deleted', 'link', 'unorderedlist', 'orderedlist',
        ],
        'buttonSource' => true,
    ]
];


$this->title = 'Текстовые блоки';
$this->params['breadcrumbs'][] = ['label' => 'Документы', 'url' => '/managecontent/default/documents'];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        ]);
?>
<h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->session->hasFlash('saveDesc')) { ?>
    <div class="alert alert-success">Информация сохранена</div>
    <?php } ?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Рекламные материалы</div>
        <div class="panel-body">
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'text1')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание качеств')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'text2')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание качеств')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'text3')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание качеств')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>                
            </div>
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">ПРОГРАММА SOFIMARSEL</div>
        <div class="panel-body">
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'text4')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание качеств')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'text5')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание качеств')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'text6')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание качеств')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>                
            </div>
        </div>
    </div>

    <div class="panel panel-warning">
        <div class="panel-heading">Наша программа</div>
        <div class="panel-body">
            <div class="col-md-12">
                <?php
                echo $form->field($model, 'text7')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('Описание качеств')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>     
                <?= $form->field($model, 'files[]')->widget(FileInput::className(), $config)->label('Документ') ?>
                <span class="label label-danger"></span>
                <?php
                if (!empty($images)) {
                    $flagDoc = 1;
                    foreach ($images as $img) {
                        $parse = explode('.', $img->path);
                        isset($parse[1]) ? $ext = $parse[1] : $ext = null;
                        ?>

                        <?php if ($ext != null && (strcmp($ext, 'docx') == 0 || strcmp($ext, 'doc') == 0 || strcmp($ext, 'pdf') == 0)) { ?>
                            <div class="thumbnail">
                                <p>
                                    <span class="glyphicon glyphicon-file"></span>
                                    Документ <a href="/uploads/<?= $img->path ?>" target="_blank"> (Скачать / Просмотреть) </a>                
                                </p>
                                <p>
                                    <?= Html::a('Удалить документ', Url::toRoute(['delete-image', 'id' => $img->id, 'idUpdate' => $model->id]), ['class' => 'btn btn-danger']); ?>                    
                                </p>
                            </div>
                        <?php } ?>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
<?php ActiveForm::end(); ?>
