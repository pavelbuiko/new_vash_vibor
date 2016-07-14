<?php

namespace app\modules\main;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\main\controllers';
    public $layout              = '@app/views/layouts/frontend';
    
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
