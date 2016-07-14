<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\backend\models\RealtorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Риэлторы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realtors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?
    if($flash = Yii::$app->session->getFlash('success')){
        echo Alert::widget(['options' => ['class' => 'alert-success'], 'body' => $flash]);

        $script = <<< JS
    $(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
        $this->registerJs($script, yii\web\View::POS_READY);
    }



    ?>




    <p>
        <?= Html::a('Добавить риэлтора', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [ 'attribute' => 'name', 'label'=>'Риэлтор' ],
            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

</div>
