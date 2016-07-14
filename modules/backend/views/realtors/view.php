<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Realtors */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Realtors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realtors-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?=  Html::a('Назад', Url::toRoute(['index']), ['class' => 'btn btn-danger']); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [                      // the owner name of the model
                'label' => 'Ф.И.О. риэлтора',
                'value' => $model->name,

            ],
            [                      // the owner name of the model
                'label' => 'Телефон риэлтора',
                'value' => $model->phone,

            ],
            [                      // the owner name of the model
                'label' => 'Слоган риэлтора',
                'value' => $model->description,

            ],
            [                      // the owner name of the model
                'label' => 'Gmail',
                'value' => $model->gmail,

            ],
            [                      // the owner name of the model
                'label' => 'Twitter',
                'value' => $model->twitter,

            ],
            [                      // the owner name of the model
                'label' => 'Facebook',
                'value' => $model->facebook,

            ],
            [                      // the owner name of the model
                'label' => 'Описание',
                'value' => $model->description,

            ],
            [
                'label' => 'Фото',
                'value' =>'/uploads/'.$model->photo,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ]
            ,


        ],
    ]) ?>

</div>
