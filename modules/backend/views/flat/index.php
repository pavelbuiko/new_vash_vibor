<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Квартиры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить слайдер ', Url::toRoute(['create', 'type'=>$type ]), ['class' => 'btn btn-success']). "<br><br>" ; ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [ 'attribute' => 'title', 'label'=>'Квартиры' ],
            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

</div>
