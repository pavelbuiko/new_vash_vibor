<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Инфраструктура';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="infrastructure-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить в инфраструктуру', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [ 'attribute' => 'title', 'label'=>'Содержание инфраструктуры' ],
            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

</div>
