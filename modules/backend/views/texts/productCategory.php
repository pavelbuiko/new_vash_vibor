<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\DataColumn;

$this->title = 'Категории продукции';
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => '/managecontent/default/products'];
$this->params['breadcrumbs'][] = $this->title;

$config = [
    'dataProvider' => $dP,
    'columns' => [
        [
            'class'     => DataColumn::className(),
            'attribute' => 'string1',
            'label'     => 'Категория',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} &nbsp; {delete}',
            'buttons' => [
                'update' => function($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::toRoute(['product-category-update', 'id' => $model->id]));
                },
                'delete' => function($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-remove"></span>', Url::toRoute(['product-category-delete', 'id' => $model->id]), Yii::$app->params['trashLink']);
                },
            ],
        ],
    ],
];
?>

<h1><?= $this->title ?></h1>
<div class="row">
    <?= Html::a('Добавить категорию', Url::toRoute(['product-category-create']), ['class' => 'btn btn-success']) ?><br><br>
    <?= GridView::widget($config) ?>
</div>

