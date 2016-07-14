<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="row">
    <?php
    $form = ActiveForm::begin();
    ?>
    <div class="col-md-6">
        <?= $form->field($m, 'string1')->label('Наименование продукции'); ?>
        <?= $form->field($m, 'string2')->label('Производство(Страна и другая информация)') ?>
        
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    </div>
    <div class="col-md-6">
        
    </div>
<?php ActiveForm::end(); ?>
</div>