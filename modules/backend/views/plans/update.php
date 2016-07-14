<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\FloorPlans */

$this->title = 'Update Floor Plans: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Floor Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="floor-plans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'objects'=>$objects,
    ]) ?>

</div>
