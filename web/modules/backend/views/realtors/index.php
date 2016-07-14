<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\backend\models\RealtorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Realtors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realtors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Realtors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'phone',
            'slogan',
            'gmail',
            // 'twitter',
            // 'facebook',
            // 'description',
            // 'photo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
