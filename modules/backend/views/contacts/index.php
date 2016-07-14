<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\StaticBlocks */

$this->title = 'Редактирование';
$this->params['breadcrumbs'][] = ['label' => 'Контакты', 'url' => '/managecontent/contacts'];
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= $this->title ?></h1>

<?= $this->render('_form', ['model' => $model, 'images' => $images,
]) ?>