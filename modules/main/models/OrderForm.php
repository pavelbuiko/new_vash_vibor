<?php

namespace app\modules\main\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class OrderForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $country;  
    public $city;  
    public $subject;
    public $body;
    //public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['email', 'phone', 'city'], 'required'],
            ['name', 'required', 'message' => 'Введите имя'],
            
            ['email', 'email'],
            [['name', 'phone', 'city'], 'string'],
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
        //    'verifyCode' => 'Verification Code',
            'name' => "Имя",
            'city' => 'Город',
            'email' => 'Е-майл',
            'phone' => 'Телефон',
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
                '<br><b> Телефон: </b>'.$this->phone.
                '<br><b> Е-mail: </b>'.$this->email.
                '<br><b> Город: </b>'.$this->city;
         
        if ($this->validate()) {
            mail($email, 'Заявка', $body, $headers);

            return true;
        } else {
            return false;
        }
    }
}
