<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Flat */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Flats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'id_object',
            'title',
            'description',
            'square1',
            'float1',
            'room1',
            'status1',
            'price1',
            'square2',
            'float2',
            'room2',
            'status2',
            'price2',
            'totalprice',
        ],
    ]) ?>

</div>
