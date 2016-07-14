<?php

namespace app\components\widgets;

use yii\base\Widget;
use app\modules\backend\models\StaticBlocks;

class HeaderFrontendWidget extends Widget 
{
    public $isMainPage = false;
    public $nameClass;
    public $model;
    public $slides;
    
    public function init()
    {
        if($this->isMainPage) 
        {
            $this->model = StaticBlocks::findOne(['type' => 2]);
            $this->slides = StaticBlocks::findAll(['type' => 65]);
        }
            
    }
    
    public function run()
    {
        if(!$this->isMainPage)
        {
            return $this->render('headerFrontend', ['nameClass' => $this->nameClass]);
        } else {
            return $this->render('headerFrontendForMainPage', [
                'model' => $this->model,
                'slides' => $this->slides
            ]);
        }
    }
}