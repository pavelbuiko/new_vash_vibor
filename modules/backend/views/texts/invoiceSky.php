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
        'minHeight' => 150,
        'buttons' => [
            'html', 'bold', 'italic', 'deleted', 'link',
        ],
        'buttonSource' => true,
        'linebreaks' => true,
    ]
];

$configImperavi2 = [
    'settings' => [
        'lang' => 'ru',
        'toolbarFixed' => true,
        'placeholder' => 'Введите текст',
        'minHeight' => 50,
        'buttons' => [
            'html', 'bold', 'italic', 'deleted', 'link',
        ],
        'buttonSource' => true,
        'linebreaks' => true,
    ]
];


$this->title = 'Разделы: "' . $model->string1 . "\"";
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
        <div class="panel-heading">Текстовая информация</div>
        <div class="panel-body">
                <?php // $form->field($model, 'string1')->label('') ?>
                <?php
                echo $form->field($model, 'text1')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
                <?=  $form->field($model, 'string1')->label('Заголовок') ?>
                <?php
                echo $form->field($model, 'text2')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            <?php
                echo $form->field($model, 'text6')
                        ->widget(Widget::className(), $configImperavi2)
                        ->label('Заголовок')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            <?php
                echo $form->field($model, 'text7')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
                <?=  $form->field($model, 'string2')->label('Заголовок') ?>
                <?php
                echo $form->field($model, 'text3')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
                <?php
                echo $form->field($model, 'text4')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
                <?php
                echo $form->field($model, 'text5')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
        </div>
    </div>    
    
    <div class="panel panel-warning">
        <div class="panel-heading">Изображения</div>
        <div class="panel-body">
            <div class="col-md-12">
                <?= $form->field($model, 'files[]')->widget(FileInput::className(), $config)->label("Изображения") ?>
                <div class="col-md-12"> <span class="label label-danger">Картинки загружаются последовательно, Первая сверху, последняя снизу.</span> </div>
                <?php
                if (!empty($images)) {
                    foreach ($images as $img) {
                        ?>
                        <div class="thumbnail col-md-2">                       	
                            <img alt="200x200" class="img-thumbnail" data-src="holder.js/300x250" style="width: 300px;" src="<?= $imageurl . $img->path ?>">
                            <div class="caption">
                                <p></p>
                                <p>
                                    <?= Html::a('Удалить', Url::toRoute(['remove-image', 'id' => $img->id, 'idUpdate' => $model->id, 'url' => Yii::$app->request->absoluteUrl]), ['class' => 'btn btn-danger']); ?>                    
                                </p>
                            </div>
                        </div>
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
