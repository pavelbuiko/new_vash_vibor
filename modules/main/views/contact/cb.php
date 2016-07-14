<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->registerJs("
    var cb = $('.modal_window');
    var ew = $('#error_window');
    var sw = $('#success_window');
    var fm = $('.fon_modal_window');
    var modalContainer = $('#modal_container');

    $(document).on('click', '#submit_callback', function (e) {
        e.preventDefault();        
        var url = '/main/contact/handler-c-b';
        var form = $('#call_back');
        
        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            success: function(result) {
                if(result == 'true') {
                    cb.fadeOut();
                    $('div').removeClass('.modal_window');
                    sw.fadeIn();
                    $('div').removeClass('.modal_window2');
                    console.log('succcces');
                } else {
                console.log(result);
                    $('.modal_window').css('display', 'none');
                    $('#error_window').css('display', 'block');                    
                }
                return false;
            }
        });
    });
    
    $(document).on('click', '#repeat_open', function(e) {
        e.preventDefault();
        ew.fadeOut();
        cb.fadeIn();
        return false;
    });
    
    $('.mod_close').click(function () {
        fm.fadeOut();
        sw.fadeOut();
        ew.fadeOut();
        cb.fadeOut();
        modalContainer.html('');
    });
    ", yii\web\View::POS_END);
?>
<div class="fon_modal_window"></div>
<div class="modal_window">
    <h1>НАПИШИТЕ СООБЩЕНИЕ</h1>
    <img class="mod_close" src="/img/mod_close.png"/>
   <?php $form = ActiveForm::begin([
        'id' => 'call_back',
   ]); ?>
    <form id="call_back">
    <span>ХОЧУ:</span>
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
        <input type="text" name="CallBackForm[name]">
        <input type="text" name="CallBackForm[phone]">
        <input type="text" name="CallBackForm[email]">
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
    <input id="submit_callback" type="submit" name="" value="ОТПРАВИТЬ"/>
    <?php ActiveForm::end() ?>
</div>
<div class="modal_window2" id="success_window" style="display: none">
    <img class="mod_close" src="/img/mod_close.png"/>
    <h1>СПИСИБО ЗА ЗАЯВКУ</h1>
    <p>Совсем скоро мы c вами свяжемся.<br>Ожидайте.</p>
    <hr noshade color="#b3b3b3">    
    <h2>А ПОКА ВЫ МОЖЕТЕ:<h2>        
    <a href="<?= Url::toRoute(['/news']) ?>">Почитать новости</a><br>
    <a href="<?= Url::toRoute(['/about-company']) ?>">Больше узнать нас</a>
</div>
<div class="modal_window2" id="error_window" style="display: none">
    <img class="mod_close" src="/img/mod_close.png"/>
    <h1>Ошибка при заполнении формы</h1>
    <p>Перепроверьте е-mail адрес.<br>Обязательно введите имя и номер телефона.</p>
    <hr noshade color="#b3b3b3">    
    <h2>А ПОКА ВЫ МОЖЕТЕ:<h2>        
    <a id="repeat_open" href="#">Заполнить заново</a><br>
    
</div>
