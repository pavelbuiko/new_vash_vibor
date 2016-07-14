<?php
/* @var $model app\modules\backend\models\StaticBlocks */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Главная страница', 'url' => '/managecontent/default/main-page'];
$this->params['breadcrumbs'][] = 'Текстовая информация';
?> 
<?php $form = ActiveForm::begin() ?>
<div class="row">
    <?php if(Yii::$app->session->hasFlash('save')) { ?>
    <div class="alert alert-success">Изменения успешно сохранены</div>
    <?php } ?>
</div>
<h3>Три ссылки в области верхнего слайдера(шапка)</h3>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'string1')->label('Текст ссылки'); ?>
        <?= $form->field($model, 'string3')->label('Текст ссылки'); ?>
        <?= $form->field($model, 'string5')->label('Текст ссылки'); ?>
    </div>
    <div class="col-md-6">  
        <?= $form->field($model, 'string2')->label('Ссылка на страницу'); ?>
        <?= $form->field($model, 'string4')->label('Ссылка на страницу'); ?>
        <?= $form->field($model, 'string6')->label('Ссылка на страницу'); ?>
    </div>        
</div>
<h3>Блок "ПОЧЕМУ СТОИТ ВЫБРАТЬ SOFIMARSEL"</h3>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'text1')->textarea(['rows' => 5])->label('Первый абзац'); ?>        
    </div>
    <div class="col-md-6">  
        <?= $form->field($model, 'text2')->textarea(['rows' => 5])->label('Второй абзац'); ?>
    </div>        
</div>
<h3>Блок "НОВЫЕ ПРОДУКТЫ"</h3>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'string7')->label('Заголовок'); ?>        
        <?= $form->field($model, 'string8')->label('Ссылка на страницу'); ?>        
    </div>
    <div class="col-md-6">  
        <?= $form->field($model, 'text3')->textarea(['rows' => 5])->label('Текстовое описание продукта'); ?>
    </div>        
</div>
<div class="row">
    <div class="col-md-4">
        <?= Html::submitButton('Cохранить', ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

