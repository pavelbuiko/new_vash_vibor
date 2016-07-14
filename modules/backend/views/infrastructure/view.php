<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Infrastructure */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Infrastructures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="infrastructure-view">

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
            'id',
            'photo',
            'l_text',
            'r_text',
            'id_object',
            'description',
        ],
    ]) ?>

</div>
