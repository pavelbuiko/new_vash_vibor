<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Планировки кваартир';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="floor-plans-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить планировку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [ 'attribute' => 'title', 'label'=>'Планировки квартир' ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
