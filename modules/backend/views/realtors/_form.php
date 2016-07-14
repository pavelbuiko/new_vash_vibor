<?php

use kartik\widgets\FileInput;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;


/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Realtors */
/* @var $form yii\widgets\ActiveForm */
?>
<?
    $options = ['rows' => 5];

$configImperavi = [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 300,
        'pastePlainText' => true,
        'buttonSource' => true,
        'plugins' => [
            'clips',
            'fullscreen'
        ],
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

<div class="realtors-form">


    <?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data']]

    ); ?>
    <div class="col-md-12">
    <div class="col-md-6">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Ф.И.О. риэлтора: '); ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('Телефон: '); ?>

    <?= $form->field($model, 'slogan')->textarea($options)->label('Слоган реэлтора'); ?>

    <?= $form->field($model, 'filial')->textInput(['maxlength' => true])->label('Филиал: '); ?>

        <div class="panel panel-default">
            <div class="panel-heading">В сети:</div>
            <div class="panel-body">
                <?= $form->field($model, 'gmail')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
            </div>
        </div>


        <?= $form->field($model, 'description')
            ->widget(Widget::className(), $configImperavi)
            ->label('Текст отзыва:')->hint('<span class="label label-warning"></span>') ?>

        <?




        ?>



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



        <?=  $form->field($model, 'certificates[]')->widget(FileInput::className(), ['options'=>[
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

            if ($certificates){
                foreach($certificates as $certificate) {
                    ?>

                    <div class="thumbnail">
                        <img alt="200x200" class="img-thumbnail" data-src="holder.js/300x250" style="width: 200px;"
                             src="<?= "/uploads/" . $certificate->path ?>">
                        <div class="caption">
                            <p></p>

                            <p>
                                <?= Html::a('Удалить изображение', Url::toRoute(['delete-certificate', 'id' => $certificate->id , 'id_update'=> $model->id]), ['class' => 'btn btn-danger']); ?>
                            </p>
                        </div>
                    </div>


                    <?
                }
            }?>


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


