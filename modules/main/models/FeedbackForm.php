<?php

namespace app\modules\main\models;

use Yii;
use yii\base\Model;
use yii\validators\EmailValidator;
use yii\validators\Validator;

/**
 * ContactForm is the model behind the contact form.
 */
class FeedbackForm extends Model
{
    public $name;
    public $email;
    public $body;

    //public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            [['name', 'body'], 'string'],
            // verifyCode needs to be entered correctly
            //['verifyCode', 'captcha', 'captchaAction' => '/main/contact/captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Е-майл',
            'body' => 'Текст сообщения',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        $headers = "From: $this->name <$this->email>\r\n".
               "MIME-Version: 1.0" . "\r\n" .
               "Content-type: text/html; charset=UTF-8" . "\r\n"; 
         
        $body = '<b>Имя: </b>'.$this->name.
                '<br><b> Е-mail: </b>'.$this->email.
                '<br><b> Пояснение </b>'.$this->body;
        $validatorEmail = new EmailValidator();
        if ($validatorEmail->validate($this->email) or ((int) $this->email) ) {
            mail($email, 'Обратная связь', $body, $headers);
            return true;
        }
        else {
            return false;
        }

    }
}
