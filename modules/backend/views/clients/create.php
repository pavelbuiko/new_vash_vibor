<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\StaticBlocks */

$this->title = 'Добавление клиента';
$this->params['breadcrumbs'][] = ['label' => 'Блоки с фото', 'url' => '/managecontent/default/photo'];
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => '/managecontent/client'];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= $this->title ?></h1>

<?= $this->render('_form', ['model' => $model, 'images' => $images,
]) ?>
