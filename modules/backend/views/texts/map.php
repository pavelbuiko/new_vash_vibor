<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "��������� ��������� ����������";
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
            Header �����
        </div>
        <div class="panel-body">
            <div class="col-md-3">
                <?= $form->field($m, 'string1')->label('���� ��������'); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($m, 'string2')->label('�������'); ?>
            </div>
        </div>
    </div>


    <div class="panel panel-success">
        <div class="panel-heading">
            ����� 1
        </div>
        <div class="panel-body">
            <div class="col-md-3">
                <?= $form->field($m, 'string3')->textarea($options)->label('�����1( ������� �����)'); ?>
            </div>

        </div>
    </div>


    <div class="panel panel-success">
        <div class="panel-heading">
            ����� 8
        </div>
        <div class="panel-body">
            <div class="col-md-3">
                <?= $form->field($m, 'string6')->textarea($options)->label('���������:'); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($m, 'string7')->textarea($options)->label('�����:'); ?>
            </div>

        </div>
    </div>

    <div class="col-md-12">
        <?= Html::submitButton('���������', ['class' => 'btn btn-success']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>