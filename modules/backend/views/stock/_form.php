<?php

use kartik\widgets\FileInput;
use yii\bootstrap\Alert;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Stock */
/* @var $form yii\widgets\ActiveForm */
?>
<?
$options = ['rows' => 5];

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
<?
if($flash = Yii::$app->session->getFlash('success')){
    echo Alert::widget(['options' => ['class' => 'alert-success'], 'body' => $flash]);

    $script = <<< JS
    $(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
    $this->registerJs($script, yii\web\View::POS_READY);
}



?>



<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="stock-form">

                <?php $form = ActiveForm::begin([
                        'options'=>['enctype'=>'multipart/form-data']]

                ); ?>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Название акции: '); ?>


                        <? $items = ArrayHelper::map($objects, 'id', 'title');
                        $params = [
                            'prompt' => 'Выберите объект',
                            1=>['disabled' => true]
                        ];
                        ?>

                        <?= $form->field($model, 'id_object')->dropDownList($items,$params,['options'=>['1'=>['disabled'=>true]]])->label("Выберите объект:");?>
                        <?= $form->field($model, 'description')
                            ->widget(Widget::className(), $configImperavi)
                            ->label('Описание: ')->hint('<span class="label label-warning"></span>') ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">Описание акции(левый блок)</div>
                                <div class="panel-body">
                                    <?= $form->field($model, 'square1')->textInput(['maxlength' => true])->label('Общая площадь: '); ?>
                                    <?= $form->field($model, 'float1')->textInput(['maxlength' => true])->label('Этаж: '); ?>
                                    <?= $form->field($model, 'room1')->textInput(['maxlength' => true])->label('Количество комнат: '); ?>
                                    <?= $form->field($model, 'status1')->textInput(['maxlength' => true])->label('Состояние: '); ?>
                                    <?= $form->field($model, 'price1')->textInput(['maxlength' => true])->label('Стоимость за 1 кв.м.: '); ?>
                                </div>
                            </div>

                        <div class="panel panel-default">
                                <div class="panel-heading">Описание акции(правый блок)</div>
                                <div class="panel-body">
                                    <?= $form->field($model, 'square2')->textInput(['maxlength' => true])->label('Общая площадь: '); ?>
                                    <?= $form->field($model, 'float2')->textInput(['maxlength' => true])->label('Этаж: '); ?>
                                    <?= $form->field($model, 'room2')->textInput(['maxlength' => true])->label('Количество комнат: '); ?>
                                    <?= $form->field($model, 'status2')->textInput(['maxlength' => true])->label('Состояние: '); ?>
                                    <?= $form->field($model, 'price2')->textInput(['maxlength' => true])->label('Стоимость за 1 кв.м.: '); ?>
                                </div>
                        </div>

                        <?= $form->field($model, 'totalprice')->textInput(['maxlength' => true])->label('Общая стоимость: '); ?>



                        <?=  $form->field($model, 'photos[]')->widget(FileInput::className(), ['options'=>[
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
                        )->label('Фотографии:( для загрузки нескольких фото одновременно -  зажмите ctrl и выделите нужные фото)');?>

                        <?
                        if ($photos){
                            foreach($photos as $photo) {
                                ?>

                                <div class="thumbnail">
                                    <img alt="200x200" class="img-thumbnail" data-src="holder.js/300x250" style="width: 200px;"
                                         src="<?= "/uploads/" . $photo->path ?>">
                                    <div class="caption">
                                        <p></p>

                                        <p>
                                            <?= Html::a('Удалить изображение', Url::toRoute(['delete-photo', 'id' => $photo->id , 'id_update'=> $model->id]), ['class' => 'btn btn-danger']); ?>
                                        </p>
                                    </div>
                                </div>


                                <?
                            }
                        }?>
                    </div>
                    <div class="col-md-6">


                    </div>
                    <?
                    $this->registerCss(".kv-file-upload { display: none; }");
                    ?>









                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            <?=  Html::a('Назад', Url::toRoute(['index']), ['class' => 'btn btn-danger']); ?>

                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>

    </div>

</div>

<?


$script = <<< JS
        $('#stock-id_object').find('option').eq(0).attr('disabled', true);


JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_END);

?>
<?
$this->registerCss("");
?>
