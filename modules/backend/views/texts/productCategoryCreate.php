<?php

$this->title = 'Создать категорию полотна коллекции';
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => '/managecontent/default/products'];
$this->params['breadcrumbs'][] = ['label' => 'Категории полотен коллекции', 'url' => '/managecontent/texts/product-category'];
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= $this->title ?></h1>
<?= $this->render('productCategoryForm', ['m' => $m]); ?>
