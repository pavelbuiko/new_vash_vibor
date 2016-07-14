<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Infrastructure */

$this->title = 'Обновление инфраструктуры: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Infrastructures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="infrastructure-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'objects'=>$objects,
    ]) ?>

</div>
