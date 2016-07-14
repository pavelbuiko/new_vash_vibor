<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Текстовые блоки";
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
            Header текст
        </div>
        <div class="panel-body">
            <div class="col-md-3">
                <?= $form->field($m, 'string1')->label('Тект логотипа'); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($m, 'string9')->textarea($options)->label('Текст 1'); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($m, 'string10')->textarea($options)->label('Текст 2'); ?>
            </div>
            <div class="col-md-3">

                <?= $form->field($m, 'text8')->textarea($options)->label('Текст 3'); ?>
            </div>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">
            Текст в разделе "ПОЧЕМУ РЕКЛАМА В НЕБЕ ВЫГОДНА ДЛЯ ВАШЕГО БИЗНЕСА"
        </div>
        <div class="panel-body">
            <div class="col-md-4">
                <?= $form->field($m, 'string5')->label('Заголовок 1'); ?>
                <?= $form->field($m, 'text5')->textarea($options)->label('Текст 1-го'); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($m, 'string6')->label('Заголовок 2'); ?>
                <?= $form->field($m, 'text6')->textarea($options)->label('Текст 2-го'); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($m, 'string7')->label('Заголовок 3'); ?>
                <?= $form->field($m, 'text7')->textarea($options)->label('Текст 3-го'); ?>
            </div>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">
            Текст в разделе "Как мы работаем"
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($m, 'string1')->label('Заголовок 1'); ?>
                    <?= $form->field($m, 'text1')->textarea($options)->label('Первый блок'); ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($m, 'string2')->label('Заголовок 2'); ?>
                    <?= $form->field($m, 'text2')->textarea($options)->label('Второй блок'); ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($m, 'string3')->label('Заголовок 3'); ?>
                    <?= $form->field($m, 'text3')->textarea($options)->label('Третий блок'); ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($m, 'string4')->label('Заголовок 4'); ?>
                    <?= $form->field($m, 'text4')->textarea($options)->label('Четвертый блок'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    </div>
<?php ActiveForm::end(); ?>
</div>