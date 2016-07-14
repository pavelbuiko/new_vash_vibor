<?php

use app\modules\backend\models\Objects;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объекты, которые отображаются на главной странице.';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objects-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h4> Для сохранения дизайна, выберите количесто объектов, кратное 4</h4>

    <?php $form = ActiveForm::begin(['action'=> Url::toRoute(['objects']), 'options' => ['enctype' => 'multipart/form-data' , 'method'=>'post']]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [ 'attribute' => 'title', 'label'=>'Название объекта' ],
            ['class' => 'yii\grid\CheckboxColumn',
                'checkboxOptions' =>function($model, $key, $index, $column) {
                    if ($model->active == 1 )
                        return ['value' => $model->id, 'checked'=>1 ];
                    else
                    {
                        return ['value' => $model->id, ];
                    }
                }]



        ],
    ]); ?>
    <p>
        <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-success' ]) ?>

    </p>
    <?php ActiveForm::end(); ?>

</div>
