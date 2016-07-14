<?php 
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
$this->registerJs("

    var fb = $('.part_form');
    var ew = $('.error_mess');
    var sw = $('.success_mess');

    $(document).on('click', '#submit_feedback', function (e) {
        e.preventDefault();        
        var url = '/contacts';
        var form = $('#contact');
        console.log('test'                                                                                                                                                      );
        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            success: function(result) {
                if(result == 'true') {
                    ew.css('display', 'none');
                    fb.fadeOut();
                    sw.fadeIn();
                    console.log('succcces');
                } else {
                    ew.html(result);  
                    ew.fadeIn();
                }
                return false;
            }
        });
    });
    

    ", yii\web\View::POS_END);
?>

<div class="part_form">
<h1><span>ОТПРАВЬТЕ НАМ СООБЩЕНИЕ</span></h1>
<p>И наши специалисты свяжутся с вами<br>в ближайшее время.</p>
<?php
$form = ActiveForm::begin([
            'id' => 'contact',
            //'enableAjaxValidation' => true,
        ])
?>
<?= $form->field($f, 'name')->label('')->input('text', ['placeholder' => Yii::t('app', 'YouName')]) ?>
<?= $form->field($f, 'phone')->label('')->input('text', ['placeholder' => 'Номер телефона']) ?>
<?= $form->field($f, 'email')->label('')->input('text', ['placeholder' => 'Е-mail']) ?>
<?= $form->field($f, 'body')->textarea(['placeholder' => 'Сообщение'])->label('') ?>
<?=
$form->field($f, 'verifyCode')->widget(Captcha::className(), [
    'captchaAction' => '/main/contact/captcha',
    'template' => '<div class="security_code">{image}</div>{input}',
    'options' => [
        'class' => 'security_code2',
        'placeholder' => 'Защитный код'
    ],
])->label('');
?>
    <!-- <div class="security_code"><img src="/img/security_code.jpg" alt=""/></div> -->
    <!-- <input class="security_code2" type="text" name="" value="" placeholder="Защитный код"/> -->
<input type="submit" name="" value="ОТПРАВИТЬ" id="submit_feedback"/>
<?php ActiveForm::end() ?>
</div>
<div class="success_mess" style="display: none">
    <h1><span>СООБЩЕНИЕ УСПЕШНО ОТПРАВЛЕНО</span></h1>
    <p>Наши специалисты свяжутся с вами в ближайшее время.</p> 
</div>
<div class="error_mess" style="display: none;">
    
</div>