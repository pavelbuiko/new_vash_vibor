<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Realtors */

$this->title = 'Редактирование  информаии о риэлторе: ' . ' ' ;
$this->params['breadcrumbs'][] = ['label' => 'Realtors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="realtors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'certificates' => $certificates,
    ]) ?>

</div>
