<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Infrastructure */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="infrastructure-form">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="col-md-6">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Планировка:') ?>

                    <? $items = ArrayHelper::map($objects, 'id', 'title');
                    $params = [
                       /* 'prompt' => 'Выберите объект',
                        1=>['disabled' => true]*/
                    ];
                    ?>

                    <?= $form->field($model, 'id_object')->dropDownList($items,$params,['options'=>['1'=>['disabled'=>true]]])->label("Выберите объект:");?>

                    <?= $form->field($model, 'square')->textInput(['maxlength' => true])->label('Общая площадь:') ?>

                    <?= $form->field($model, 'room')->textInput(['maxlength' => true])->label('Количество комнат:') ?>
                    <?= $form->field($model, 'status')->textInput(['maxlength' => true])->label('Состояние:') ?>
                    <?= $form->field($model, 'price')->textInput(['maxlength' => true])->label('Стояимость за 1 кв.м. :') ?>



                </div>
                <div class="col-md-6">
                    <?=  $form->field($model, 'image')->widget(FileInput::className(), ['options'=>[
                            'multiple' => 'multiple',
                            'accept'=>'image/*',
                        ],
                            'pluginOptions'=>[
                                'maxFileCount' => 1,
                                'allowedFileExtensions'=>['jpg','gif','png'],
                                'showUpload' => false,
                            ]
                        ]
                    )->label('Главное фото');?>


                    <? if ( $model->photo !=null ) {?>
                        <div class="thumbnail">
                            <img alt="200x200" class="img-thumbnail" data-src="holder.js/300x250" style="width: 300px;" src="<?="/uploads/".$model->photo?>">
                            <div class="caption">
                                <p></p>
                                <p>
                                    <?=  Html::a('Удалить изображение', Url::toRoute(['delete-image', 'id' => $model->id ]), ['class' => 'btn btn-danger']); ?>
                                </p>
                            </div>
                        </div>
                    <?}?>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        <?=  Html::a('Назад', Url::toRoute(['index']), ['class' => 'btn btn-danger']); ?>
                    </div>
                </div>


                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>