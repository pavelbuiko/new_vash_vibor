<?php

namespace app\modules\backend;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\backend\controllers';
    public $layout              = '@app/views/layouts/backend';
    public $imagepath           = 'uploads/';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
