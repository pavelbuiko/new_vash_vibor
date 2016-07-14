<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\StaticBlocks */

$this->title = 'Добавить слайд';
$this->params['breadcrumbs'][] = ['label' => 'Блоки с фото', 'url' => '/managecontent/default/photo'];
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => '/managecontent/review'];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= $this->title ?></h1>
<?php /*   if ($model->type == 25 ){  echo $this->render('form_plans_slider', ['model' => $model, 'images' => $images, 'action'=>'create'
]);return ;} */?>
<?= $this->render('_form', ['model' => $model, 'images' => $images,
]) ?>
