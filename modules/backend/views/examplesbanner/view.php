<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\StaticBlocks */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Static Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="static-blocks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'type_desc',
            'photos_id',
            'created_at',
            'updated_at',
            'text1:ntext',
            'text2:ntext',
            'text3:ntext',
            'text4:ntext',
            'text5:ntext',
            'text6:ntext',
            'text7:ntext',
            'text8:ntext',
            'text9:ntext',
            'text10:ntext',
            'text11:ntext',
            'text12:ntext',
            'text13:ntext',
            'text14:ntext',
            'text15:ntext',
            'string1',
            'string2',
            'string3',
            'string4',
            'string5',
            'string6',
            'string7',
            'string8',
            'string9',
            'string10',
            'string11',
            'string12',
            'string13',
            'string14',
            'string15',
        ],
    ]) ?>

</div>
