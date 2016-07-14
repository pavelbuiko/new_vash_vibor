<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Stock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_object')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'square1')->textInput() ?>

    <?= $form->field($model, 'square2')->textInput() ?>

    <?= $form->field($model, 'float1')->textInput() ?>

    <?= $form->field($model, 'float2')->textInput() ?>

    <?= $form->field($model, 'room1')->textInput() ?>

    <?= $form->field($model, 'room2')->textInput() ?>

    <?= $form->field($model, 'status1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price1')->textInput() ?>

    <?= $form->field($model, 'price2')->textInput() ?>

    <?= $form->field($model, 'totalprice')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
