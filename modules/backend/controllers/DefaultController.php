<?php

namespace app\modules\backend\controllers;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\modules\backend\models\StaticBlocks;

class DefaultController extends Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'main-page'],
                'rules' => [
                    [
                        'actions' => ['index', 'main-page', 'photo'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],                    
                ],
            ]
        ];
    }
    
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => StaticBlocks::find()->where(['type' => 11]),
        ]);

        $model = StaticBlocks::findOne(['type' => 11]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'type'=>11,
            'model'=>$model
        ]);
    }
    
    public function actionMainPage()
    {
        return $this->render('mainPage');
    }
    
    public function actionPhoto()
    {
        return $this->render('photo');
    }

    public function actionSendMail()
    {
        $m = StaticBlocks::findOne(['type' => 2]);

        if($m->load(Yii::$app->request->post()) && $m->save())
        {
            Yii::$app->session->setFlash('success_save');
            return $this->refresh();
        } else {
            return $this->render('sendMail', [
                'm'         => $m,

            ]);
        }
    }
}
