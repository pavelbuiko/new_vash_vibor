<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Установка е-майл адреса, на который будет осуществляться рассылка заявок";
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= $this->title ?></h1>
<div class="row">
    <?php
    $form = ActiveForm::begin();
    ?>
    <div class="col-md-12">
        <?= $form->field($m, 'string1')->label('Е-майл, на который осуществляется отправка заявок обратного звонка'); ?>        
    </div>
    
    <div class="col-md-12">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    </div>
<?php ActiveForm::end(); ?>
</div>