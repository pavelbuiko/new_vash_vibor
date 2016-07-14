<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = ['label' => 'Блоки с фото', 'url' => '/managecontent/default/photo'];
$this->params['breadcrumbs'][] = $this->title;

$config = [
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'class'     => DataColumn::className(),
            'attribute' => 'string1',
            'label'     => 'Наименование',
        ],
                [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} &nbsp; {delete}',
            'buttons' => [
                'update' => function($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::toRoute(['update', 'id' => $model->id]));
                },
                'delete' => function($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-remove"></span>', Url::toRoute(['delete', 'id' => $model->id]), [
                        'data-confirm'  => 'Вы уверены, что хотите удалить этот элемент', 
                        'data-method'   => 'post',
                    ]);
                },
            ],
        ],
    ],
];
?>
<div class="static-blocks-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Добавить', Url::toRoute(['create']), ['class' => 'btn btn-success']) ?><br><br>
    </p>

    <?= GridView::widget($config); ?>
    
    <div class="alert alert-warning">
        <a href="<?=  Url::toRoute(['/']) ?>" target="_blank" class="alert-link"><strong>Просмотреть</strong></a> на сайте.
    </div>

</div>
