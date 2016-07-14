<?php

namespace app\modules\backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\backend\models\StaticBlocks;
use app\modules\backend\models\StorageImages;
use app\modules\backend\models\Plans;

use yii\web\Controller;

use yii\web\NotFoundHttpException;

class FeedbackController extends \yii\web\Controller
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
        $model = StaticBlocks::findOne(['type' => 40]);
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            Yii::$app->session->setFlash('save');

            return $this->refresh();
        } else {
            return $this->render('feedback', ['model' => $model]);
        }


    }

    public function actionMainPage()
    {
        $model = StaticBlocks::findOne(['type' => 40]);
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
        $m = StaticBlocks::findOne(['type' => 40]);

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

    public function actionHeader(){

        $m = StaticBlocks::findOne(['type' => 40]);
        //$model = StaticBlocks::findOne(['type' => 7]);
        /* $images = $m->getStorageimages($m->id);*/


        if($m->load(Yii::$app->request->post()) && $m->save())
        {

            Yii::$app->session->setFlash('success_save');
            return $this->refresh();
        } else {
            return $this->render('header', [
                'm'         => $m,


            ]);
        }
    }









    protected function findModel($id)
    {
        if (($model = StaticBlocks::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
    }



    public function actionSlider()
    {
        $m = StaticBlocks::findOne(['type' => 40]);

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
