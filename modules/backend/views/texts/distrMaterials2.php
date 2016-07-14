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


$this->title = 'Раздел: "' . $model->string4 . "\"";
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
        <div class="panel-heading">Раздел: <?= $form->field($model, 'string4')->label('') ?></div>
        <div class="panel-body">
            <div class="col-md-4">
                <?php // $form->field($model, 'string1')->label('') ?>
                <?php
                echo $form->field($model, 'text1')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>
            <div class="col-md-4">
                <?php // $form->field($model, 'string2')->label('') ?>
                <?php
                echo $form->field($model, 'text2')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>
            <div class="col-md-4">
                <?php // $form->field($model, 'string3')->label('') ?>
                <?php
                echo $form->field($model, 'text3')
                        ->widget(Widget::className(), $configImperavi)
                        ->label('')
                        ->hint('<span class="label label-warning"></span>') // */ 
                ?>
            </div>            
        </div>
    </div>
    
    <div class="panel panel-warning">
        <div class="panel-heading">Фотоновые картинки в трех блоках, что выше.</div>
        <div class="panel-body">
            <?= $form->field($model, 'files[]')->widget(FileInput::className(), $config)->label('Изображения') ?>
            <span class="label label-danger col-md-12">Картинки загружаются последовательно, слева направо.</span><br>
                <?php
                if (!empty($images)) {
                    foreach ($images as $img) {
                        ?>
                        <div class="thumbnail col-md-4">
                            <img alt="200x200" class="img-thumbnail" data-src="holder.js/300x250" style="width: 300px;" src="<?= $imageurl . $img->path ?>">
                            <div class="caption">
                                <p></p>
                                <p>
                                    <?= Html::a('Удалить изображение', Url::toRoute(['remove-image', 'id' => $img->id, 'idUpdate' => $model->id, 'url' => Yii::$app->request->absoluteUrl]), ['class' => 'btn btn-danger']); ?>                    
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
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
<?php ActiveForm::end(); ?>
