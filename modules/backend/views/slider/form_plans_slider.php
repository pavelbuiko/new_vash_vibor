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
        'multiply' => false,
        'maxFileCount' =>1
    ],
    'pluginOptions' => [
        'showUpload' => false,
        'maxFileCount' => 1,
        'allowedFileExtension' => [
            'jpg', 'jpeg', 'png', 'gif',
        ]
    ]
];
$config2 = [
    'options' => [
        'accept' => 'image/*',
        'multiple'=>true,
        'maxFileCount' =>5,
        'enctype'=>'multipart/form-data'

    ],
    'pluginOptions' => [
        'multiply' => true,
        'showUpload' => false,
        'maxFileCount' =>10,
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
                <?= $form->field($model, 'text1')
                    ->widget(Widget::className(), $configImperavi)
                    ->label('Текст')->hint('<span class="label label-warning"></span>')
                ?>

                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
                <?=  Html::a('Назад', Url::toRoute(['index', 'type' => $model->type]), ['class' => 'btn btn-danger']); ?>
            </div>
            <div class="col-md-6">
            <?=  $form->field($model, 'files[]')->widget(FileInput::className(), $config, ['options' => ['multiple' => false]])->label('Фоновое Изображение') ?>

                <span class="label label-danger"></span>
                <?php                 if (!empty($images)) {
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
                    <?php                   }
                }
                ?>

                <div class="panel panel-default">
                    <div class="panel-body">
                <?=  $form->field($model, 'plans[]')->widget(FileInput::className(), $config2
                )->label('Слайды') ?>
                <?php   if ( $model->type == 20 || $model->type == 25) {


                 ?>




                <?php   if ( $model->type == 25  ) { ?>

                   <!-- <?/*= $form->field($model, 'string12')->label('Текст слайда(верхний)')->hint('<span class="label label-warning"></span>') */?>
                    --><?/*= $form->field($model, 'string13')->label('Текст слайда(нижний)')->hint('<span class="label label-warning"></span>') */?>
                    <?php }?>
                        <script>
                          /*  var text1 = document.getElementById('staticblocks-string9');
                            text1.value = "";
                            var text2 = document.getElementById('staticblocks-string10');
                            text2.value = "";*/
                        </script>

                    </div>
                    </div>

                <h4> <span class="label label-default">Сейчас на сайте:</span></h4>

                    <?php                if (!empty($images_plans)) {

                        foreach ($images_plans as $img) {
                            ?>
                            <div class="thumbnail">
                                <img alt="200x200" class="img-thumbnail" data-src="holder.js/300x250" style="width: 300px;" src="<?=$imageurl .$img->path ?>">
                                <div class="caption">
                                    <p></p>
                                    <p>
                                        <?= $form->field($model, 'string9')->label('Текст слайда(верхний)')->hint('<span class="label label-warning"></span>') ?>
                                        <?= $form->field($model, 'string10')->label('Текст слайда(нижний)')->hint('<span class="label label-warning"></span>') ?>
                                        <?=  Html::a('Удалить слайд', Url::toRoute(['delete-plans', 'id' => $img->id, 'idUpdate' => $model->id]), ['class' => 'btn btn-danger']); ?>
                                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php                   }
                    }
                    ?>
                    <!--    --><?/*=  Html::a('Добавить слайды', Url::toRoute(['add-plans']), ['class' => 'btn btn-danger']); */?>
                    <?php
                }

                ?>






                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

