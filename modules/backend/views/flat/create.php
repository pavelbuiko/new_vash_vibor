<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Flat */

$this->title = 'Добавить квартиру';
$this->params['breadcrumbs'][] = ['label' => 'Flats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'objects'=>$objects,
        'type'=>$type,
    ]) ?>

</div>
