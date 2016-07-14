<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->registerJs("$(document).on('submit', '#call_back', function (e) {
        var url = '/main/contact/handler-call-back';
        var form = $(this);
        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            success: function(result) {
                if(result == true) {
                    $('.modal_window').hide();
                    $('.model_window2').css('display', 'block');
                } else {
                    console.log('d');
                    modalContainer.html(result).hide().fadeIn();
                }
            }
        });
    });", yii\web\View::POS_END);
?>
<div class="fon_modal_window"></div>
<div class="modal_window">
    <h1>НАПИШИТЕ СООБЩЕНИЕ</h1>
    <img class="mod_close" src="img/mod_close.png"/>
    <?php
    $form = ActiveForm::begin([
                'id' => 'call_back',
                //'enableAjaxValidation' => true,
                'action' => 'main/contact/handler-call-back',
                'enableClientValidation' => false,
            ])
    ?>    
    <span>ХОЧЮ:</span>
    <div class="mod_style_select">
        <select name="CallBackForm[subject]">
            <option value="СТАТЬ ДИСТРИБЬЮТОРОМ">СТАТЬ ДИСТРИБЬЮТОРОМ</option>
            <option value="СТАТЬ КЛИЕНТОМ">СТАТЬ КЛИЕНТОМ</option>
        </select>
    </div>
    <hr noshade color="#cccccc">

    <section>
        <p>Ваше имя:</p>
        <p>Телефон:</p>
        <p>Электронная почта:</p>
        <p>Страна:</p>
        <p>Город:</p>
    </section>
    <section>
        <?= $form->field($model, 'name')->label('') ?>
        <?= $form->field($model, 'phone')->label('') ?>
<?= $form->field($model, 'email')->label('') ?>

        <div class="mod_style_select2">               
            <select name="CallBackForm[country]">
                <option value="Беларусь">Беларусь</option>
                <option value="Польша">Польша</option>
                <option value="Россия">Россия</option>
                <option value="Другая страна">Другая страна</option>
            </select>
        </div>
        <div class="mod_style_select2">
            <select name="CallBackForm[city]">                    
                <option value="Минск">Минск</option>
                <option value="Гомель">Гомель</option>
                <option value="Гродно">Гродно</option>
                <option value="Брест">Брест</option>
                <option value="Могилев">Могилев</option>
                <option value="Витебск">Витебск</option>
                <option value="Другой город">Другой город</option>                    
            </select>
        </div>
    </section>
    <hr noshade color="#cccccc">
    <h2>ВАШЕ СООБЩЕНИЕ</h2>
    <textarea name="CallBackForm[body]" placeholder="Добрый день, у вас самые актуальные"></textarea>
    <input type="submit" name="" value="ОТПРАВИТЬ"/>
<?php ActiveForm::end() ?>
</div>
<div class="modal_window2" style="display: none">
    <img class="mod_close" src="img/mod_close.png"/>
    <h1>СПИСИБО ЗА ЗАЯВКУ</h1>
    <p>Совсем скоро мы c вами свяжемся.<br>Ожидайте.</p>
    <hr noshade color="#b3b3b3">    
    <h2>А ПОКА ВЫ МОЖЕТЕ:<h2>        
    <a href="<?= Url::toRoute(['/news']) ?>">Почитать новости</a><br>
    <a href="<?= Url::toRoute(['/about-company']) ?>">Больше узнать нас</a>
</div>
