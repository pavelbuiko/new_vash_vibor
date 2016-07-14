<?php

use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Flat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
<div class="flat-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <? $items = ArrayHelper::map($objects, 'id', 'title');
    $params = [
       /* 'prompt' => 'Выберите объект',
        1=>['disabled' => true]*/
    ];
    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Заголовок: ') ?>

    <?= $form->field($model, 'id_object')->dropDownList($items,$params,['options'=>['1'=>['disabled'=>true]]])->label("Выберите объект:");?>


    <? if ($type == 1){?>



    <?= $form->field($model, 'description')->textArea(['maxlength' => true, 'rows'=>5])->label("Описание:") ?>
    <div class="panel panel-default">
        <div class="panel-heading">Описание квартиры(левый блок)</div>
        <div class="panel-body">
            <?= $form->field($model, 'square1')->textInput(['maxlength' => true])->label('Общая площадь: '); ?>
            <?= $form->field($model, 'float1')->textInput(['maxlength' => true])->label('Этаж: '); ?>
            <?= $form->field($model, 'room1')->textInput(['maxlength' => true])->label('Количество комнат: '); ?>
            <?= $form->field($model, 'status1')->textInput(['maxlength' => true])->label('Состояние: '); ?>
            <?= $form->field($model, 'price1')->textInput(['maxlength' => true])->label('Стоимость за 1 кв.м.: '); ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Описание квартиры(правый блок)</div>
        <div class="panel-body">
            <?= $form->field($model, 'square2')->textInput(['maxlength' => true])->label('Общая площадь: '); ?>
            <?= $form->field($model, 'float2')->textInput(['maxlength' => true])->label('Этаж: '); ?>
            <?= $form->field($model, 'room2')->textInput(['maxlength' => true])->label('Количество комнат: '); ?>
            <?= $form->field($model, 'status2')->textInput(['maxlength' => true])->label('Состояние: '); ?>
            <?= $form->field($model, 'price2')->textInput(['maxlength' => true])->label('Стоимость за 1 кв.м.: '); ?>
        </div>
    </div>

    <?= $form->field($model, 'totalprice')->textInput(['maxlength' => true])->label("Общая стоимость: ");} ?>




    <?=  $form->field($model, 'image[]')->widget(FileInput::className(), ['options'=>[
            'id'=>'input-24',
            'multiple' => 'true',
            'accept'=>'image/*',
        ],
            'pluginOptions'=>[

                'uploadUrl' => Url::toRoute(['uploads' ]),
                'allowedFileExtensions'=>['jpg','gif','png'],
                'showUpload' => false,
                'maxFileCount' =>10,
                'overwriteInitial' => false,





            ],
        ]
    )->label('Сертефикаты:( для загрузки нескольких сертефикатов одновременно зажмите ctrl и выделите нужные фото)');?>

    <?

    if ($images){
        foreach($images as $image) {
            ?>

            <div class="thumbnail">
                <img alt="200x200" class="img-thumbnail" data-src="holder.js/300x250" style="width: 200px;"
                     src="<?= "/uploads/" . $image->path ?>">
                <div class="caption">
                    <p></p>

                    <p>
                        <?= Html::a('Удалить изображение', Url::toRoute(['delete-image', 'id' => $image->id , 'id_update'=> $model->id]), ['class' => 'btn btn-danger']); ?>
                    </p>
                </div>
            </div>


            <?
        }
    }?>










    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
    </div>
</div>
