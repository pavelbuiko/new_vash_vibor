<?php
use yii\helpers\Url;
use app\modules\backend\models\StaticBlocks;
$c = StaticBlocks::findAll(['type' => 55]);
$items = StaticBlocks::findAll(['type' => 56]);
?>
<?= \app\components\widgets\HeaderFrontendWidget::widget(['nameClass' => 'top_block_document']) ?>

<section class="karta_saita">
    <div class="wrap">
        <div class="archit"><span>Ошибка</span></div>
        <div class="archit" style="font-size: 200px; color: #DADADA; "><span style="border-bottom: none;"><strong>404</strong></span></div>
        <p class="text_gallery_works" style="margin-top: 0px">Страница не существует</p>
        <hr noshade size="2" color="#cdd4e2" />
        <?php foreach($c as $cat) { ?>
        <ul><span><?= $cat->string1 ?></span>
            <?php foreach($items as $i) { ?>
            <?php if($i->string1 == $cat->id) { ?>
            <li><a href="<?= Url::toRoute(["/$i->string3"]) ?>"><?= $i->string2 ?></a></li>
            <?php } ?>
            <?php } ?>
        </ul>
        <?php } ?>
    </div>
</section>