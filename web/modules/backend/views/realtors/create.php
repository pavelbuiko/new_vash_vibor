<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\Realtors */

$this->title = 'Create Realtors';
$this->params['breadcrumbs'][] = ['label' => 'Realtors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realtors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
