<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Изменение карты";
$this->params['breadcrumbs'][] = $this->title;
$options = ['rows' => 14];
?>
<h1><?= $this->title ?></h1>
<div class="row">
    <?php
    $form = ActiveForm::begin();
    ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            Карта
        </div>
        <div class="panel-body">
            <div class="col-md-9">
              <?= $form->field($m, 'string8')->label('Адресс на карте:'); ?>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>