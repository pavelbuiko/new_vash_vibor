<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Содержание слайдера ';
$this->params['breadcrumbs'][] = ['label' => 'Блоки с фото', 'url' => '/managecontent/default/photo'];
$this->params['breadcrumbs'][] = $this->title;

$config = [
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'class'     => DataColumn::className(),
            'attribute' => 'string4',
            'label'     => 'Наименование',
        ],
                [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} &nbsp; {delete} &nbsp; ',
            'buttons' => [
                'update' => function($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::toRoute(['update', 'id' => $model->id, 'type'=>$model->type]));
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


<?= Yii::$app->session->getFlash('success create'); ?>


<div class="static-blocks-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?php

        if ( $type == 11 ) {
            if ($dataProvider->totalCount < 3){
                echo Html::a('Добавить', Url::toRoute(['create', 'type'=>$type ]), ['class' => 'btn btn-success']). "<br><br>"  ;
            }
        }
        else {
            if ( $type == 20 ) {
                if ($dataProvider->totalCount < 7){
                    echo Html::a('Добавить', Url::toRoute(['create', 'type'=>$type ]), ['class' => 'btn btn-success']). "<br><br>"  ;
                }
            }
            else {
                echo Html::a('Добавить', Url::toRoute(['create', 'type'=>$type ]), ['class' => 'btn btn-success']). "<br><br>" ;
            }
        }
     ?>





    </p>

    <?= GridView::widget($config); ?>
    
    <div class="alert alert-warning">
        <a href="<?=  Url::toRoute(['/']) ?>" target="_blank" class="alert-link"><strong>Просмотреть</strong></a> на сайте.
    </div>

</div>
