<?php

namespace app\modules\backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\backend\models\StaticBlocks;
use app\modules\backend\models\StorageImages;

class MapController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'slider', 'main-page', 'send-mail', 'delete', 'delete-image'],
                'rules' => [
                    [
                        'actions' => ['index', 'slider', 'main-page', 'send-mail','delete', 'delete-image'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $m = StaticBlocks::findOne(['type' => 7]);

        if($m->load(Yii::$app->request->post()) && $m->save())
        {
            Yii::$app->session->setFlash('success_save');
            return $this->refresh();
        } else {
            return $this->render('index', [
                'm'         => $m,

            ]);
        }
    }

    public function actionMainPage()
    {
        $model = StaticBlocks::findOne(['type' => 2]);
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            Yii::$app->session->setFlash('save');

            return $this->refresh();
        } else {
            return $this->render('mainPage', ['model' => $model]);
        }
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

    public function actionMap(){

        $m = StaticBlocks::findOne(['type' => 7]);

        if($m->load(Yii::$app->request->post()) && $m->save())
        {
            Yii::$app->session->setFlash('success_save');
            return $this->refresh();
        } else {
            return $this->render('index', [
                'm'         => $m,

            ]);
        }
    }





    public function actionSlider()
    {
        $m = StaticBlocks::findOne(['type' => 7]);

        if($m->load(Yii::$app->request->post()) && $m->save())
        {
            Yii::$app->session->setFlash('success_save');
            return $this->refresh();
        } else {
            return $this->render('slider', [
                'm' => $m,
            ]);
        }
    }

    public function actionDeleteImage($id, $idUpdate) {
        $model = StorageImages::findOne($id);

        if ($model->delete())
        {
            Yii::$app->session->setFlash('success_delete_image', 'Изображение успешно удалено. Теперь можно загрузить другое:)');
        } else {
            Yii::$app->session->setFlash('error_delete_image', 'Ошибка при удалении изображения! Пожалуйста, попробуйте позже или свяжитесь с разработчиком.');
        }

        return $this->redirect([
            'document-materials'
        ]);
    }

    public function actionRemoveImage($id, $idUpdate, $url) {
        $model = StorageImages::findOne($id);

        if ($model->delete())
        {
            Yii::$app->session->setFlash('success_delete_image', 'Изображение успешно удалено. Теперь можно загрузить другое:)');
        } else {
            Yii::$app->session->setFlash('error_delete_image', 'Ошибка при удалении изображения! Пожалуйста, попробуйте позже или свяжитесь с разработчиком.');
        }

        return $this->redirect($url);
    }
}
