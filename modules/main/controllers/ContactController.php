<?php

namespace app\modules\main\controllers;

use Yii;
use yii\web\Controller;
use app\modules\main\models\ContactForm;
use app\modules\main\models\FeedbackForm;
use app\modules\main\models\OrderForm;
use app\modules\main\models\RequestPriceListForm;
use app\modules\main\models\ArnaviOrderForm;

/**
 * Description of ContactController
 *
 * @author Robert Kuznetsov <RK at buildinggame.ru>
 */
class ContactController extends Controller {

    /*
    public function beforeAction($action) {
        $this->enableCsrfValidation = ($action->id !== 'handler-request-price-list');
        return parent::beforeAction($action);
    }//*/

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
            ],
        ];
    }

    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionHand()
    {
        return $this->render('index');
    }
    public function actionHandlerOrder()
    {
        $mail = \app\modules\backend\models\StaticBlocks::findOne(['type' => 2]);
        $model = new OrderForm();
        if($model->load(Yii::$app->request->post()) && $model->contact($mail->string1))
        {
            $success = true;
            return json_encode($success);
        } else {
            return (new \yii\widgets\ActiveForm)->errorSummary($model);
        }
    }
    
    public function actionHandlerFeedBack()
    {
        $mail = \app\modules\backend\models\StaticBlocks::findOne(['type' => 2]);
        $model = new FeedbackForm();
        if($model->load(Yii::$app->request->post()) && $model->contact($mail->string1))
        {
            $success = true;
            return json_encode($success);
        } else {
            return (new \yii\widgets\ActiveForm)->errorSummary($model);
        }
    }
    
    public function actionHandlerRequestPriceList()
    {
        $mail = \app\modules\backend\models\StaticBlocks::findOne(['type' => 2]);
        $model = new RequestPriceListForm();
        if($model->load(Yii::$app->request->post()) && $model->contact($mail->string1))
        {
            $success = true;
            return json_encode($success);
        } else {
            return (new \yii\widgets\ActiveForm)->errorSummary($model);
        }
    }
    
    public function actionHandlerArnaviOrder()
    {
        $mail = \app\modules\backend\models\StaticBlocks::findOne(['type' => 2]);
        $model = new ArnaviOrderForm();
        if($model->load(Yii::$app->request->post()) && $model->contact($mail->string1))
        {
            $success = true;
            return json_encode($success);
        } else {
            return (new \yii\widgets\ActiveForm)->errorSummary($model);
        }
    }
    
    public function actionHandlerCB()
    {
        $mail = \app\modules\backend\models\StaticBlocks::findOne(['type' => 2]);
        $model = new CallBackForm();
        if($model->load(Yii::$app->request->post()) && $model->contact($mail->string1))
        {
            $success = true;
            return json_encode($success);
        } else {
            return (new \yii\widgets\ActiveForm)->errorSummary($model);
        }
    }
    

}