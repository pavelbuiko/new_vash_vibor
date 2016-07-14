<?php

use kartik\widgets\FileInput;
use yii\bootstrap\Alert;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Objects */
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
<div class="objects-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="col-md-12">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->label('Название застройщика')->hint('<span class="label label-warning"></span>') ?>
            <?= $form->field($model, 'price_1')->label('1 комнатная квартира. Цена за 1 кв.м.')->hint('<span class="label label-warning"></span>') ?>
            <?= $form->field($model, 'price_2')->label('2-х комнатная квартира. Цена за 1 кв.м.')->hint('<span class="label label-warning"></span>') ?>
            <?= $form->field($model, 'price_3')->label('3-х комнатная квартира. Цена за 1 кв.м.')->hint('<span class="label label-warning"></span>') ?>
            <?= $form->field($model, 'address')->label('Адрес: ')->hint('<span class="label label-warning"></span>') ?>
            <?= $form->field($model, 'region')->label('Регион: ')->hint('<span class="label label-warning"></span>') ?>
            <?= $form->field($model, 'street')->label('Улица: ')->hint('<span class="label label-warning"></span>') ?>
            <?= $form->field($model, 'floats')->label('Количество этажей: ')->hint('<span class="label label-warning"></span>') ?>
            <?= $form->field($model, 'material')->label('Материал стен: ')->hint('<span class="label label-warning"></span>') ?>
            <?= $form->field($model, 'enterdate')->label('Сдача в эксплуатацию: ')->hint('<span class="label label-warning"></span>') ?>
            <?= $form->field($model, 'square')->label('Минимальная площадь, кв.м.: ')->hint('<span class="label label-warning"></span>') ?>

            <?= $form->field($model, 'description')
                  ->widget(Widget::className(), $configImperavi)
                  ->label('Описание:')->hint('<span class="label label-warning"></span>') ?>
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
            <? $items = ArrayHelper::map($realtors, 'id', 'name');
                 $params = [
                'prompt' => 'Укажите риэлтора',
                     1=>['disabled' => true]
            ];
            ?>

            <?= $form->field($model, 'id_realtor')->dropDownList($items,$params,['options'=>['1'=>['disabled'=>true]]])->label("Выберите риэлтора, закрепленного за объектом");?>







            <div class="form-group">

               <!-- <input type="hidden" id ='objects-color' class="color_value" name ="Objects[color]" >-->
             <?= $form->field($model, 'color')->hiddenInput(['class'=> 'color_value'])->label(false) ;?>

                <label for="color_picker">Выберите цвет объекта:</label>
                <input type="text"  id ="color_picker" value="" class="color" readonly >
                <div class="palitra">
                    <div class="color_block" style="background-color: red ;">
                    </div>
                    <div class="color_block" style="background-color: green ;">
                    </div>
                    <div class="color_block" style="background-color: gold ;">
                    </div>
                    <div class="color_block" style="background-color: cyan ;">
                    </div>
                    <div class="color_block" style="background-color: blue ;">
                    </div>
                    <div class="color_block" style="background-color: aquamarine ;">
                    </div>
                    <div class="color_block" style="background-color: gold ;">
                    </div>
                    <div class="color_block" style="background-color: deeppink ;">
                    </div>
                    <div class="color_block" style="background-color: saddlebrown ;">
                    </div>
                    <div class="color_block" style="background-color: grey ;">
                    </div>
                    <div class="color_block" style="background-color: maroon ;">
                    </div>
                    <div class="color_block" style="background-color: lime ;">
                    </div>
                    <div class="color_block" style="background-color: greenyellow ;">
                    </div>
                    <div class="color_block" style="background-color: tomato ;">
                    </div>
                    <div class="color_block" style="background-color: palevioletred ;">
                    </div>
                    <div class="color_block" style="background-color: orange ;">
                    </div>
                    <div class="color_block" style="background-color: navy ;">
                    </div>
                    <div class="color_block" style="background-color: lawngreen ;">
                    </div>
                    <div class="color_block" style="background-color: cornflowerblue ;">
                    </div>
                    <div class="color_block" style="background-color: antiquewhite ;">
                    </div>


                </div>

            </div>







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
    $color = $model->color;

    $script = <<< JS
        $('#objects-status').find('option').eq(0).attr('disabled', true);


        $('#color_picker').css('background-color', '$color');
        $('#color_picker').css('border', '2px solid black');

        $('#color_picker').on('click', function(){            /// show palitra

               if ( $('.palitra').hasClass('active')){
               $('.palitra').fadeOut(400);
               $('.palitra').removeClass('active');
               }
               else
               {
               $('.palitra').fadeIn(400);
               $('.palitra').addClass('active');
               }

        });
        $('.color_block').on('click', function(){         // choice a color
                var color = $(this).css("background-color");
                 $('.palitra').fadeOut(200);
                 $('.palitra').removeClass('active');
                 $('.color').css('background-color', color);
                 $('.color').css('border', '2px solid black');

                 console.log(color);
                 console.log( $('.color_value'));
                 var hexColor = rgb2hex(color);
                 $('.color_value').val(hexColor);

        });
        function rgb2hex(orig){                                   /// convert rgb to hex format color
 var rgb = orig.replace(/\s/g,'').match(/^rgb?\((\d+),(\d+),(\d+)/i);
 return (rgb && rgb.length === 4) ? "#" +
  ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
  ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
  ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : orig;
}



JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
    $this->registerJs($script, yii\web\View::POS_END);

?>
<?
$this->registerCss("
.color {width: 100px; cursor: pointer;}
.palitra {width:auto; max-width:200px; padding:10px; border: 1px solid #A9A9A9 ; margin-left: 180px;display:none;}
.color_block{
    display:inline-block;
    width: 40px;
    height: 20px;
    border: 1px solid black;
    cursor: pointer;
}
.color_block:hover{
    transition:0.2s;
    border: 2px solid #F1E607;
}
.color_block:(not):(hover){
    transition:0.2s;
}
");
?>

