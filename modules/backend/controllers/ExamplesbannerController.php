<?php

namespace app\modules\backend\controllers;

use Yii;
use app\modules\backend\models\StaticBlocks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\modules\backend\models\StorageImages;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * SertController implements the CRUD actions for StaticBlocks model.
 */
class ExamplesbannerController extends Controller
{
        public $wThumbs = 93;
    public $hThumbs = 122;
        
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
                'only' => ['index', 'create', 'update', 'delete', 'delete-image'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'delete-image'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],                                       
                ],
            ],
        ];
    }

    /**
     * Lists all StaticBlocks models that matching defined category of the data.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => StaticBlocks::find()->where(['type' => 13]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
                    ]);
    }

    /**
     * Creates a new StaticBlocks model of the defined category data.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StaticBlocks();
        $model->type = 13;
        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
                        StorageImages::saveImagesWithThumbs($model, 'files', $this->wThumbs, $this->hThumbs);
                        if($model->save()) 
            {
                Yii::$app->session->setFlash('success_create');
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error_save');
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'images'=> null,
            ]);
        }
    }

    /**
     * Updates an existing StaticBlocks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $id_view = $model->id;
        $images = $model->getStorageimages($model->id);
                
        if ($model->load(Yii::$app->request->post())) 
        {
                        StorageImages::saveImagesWithThumbs($model, 'files', $this->wThumbs, $this->hThumbs);
                        
            if($model->save()) 
            {
                Yii::$app->session->setFlash('success_save');
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error_save');
                return $this->redirect(['update', 'id' => $id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'images'    => $images,
            ]);
        }
    }

    /**
     * Deletes an existing StaticBlocks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
        
        if ($model->delete()) 
        {
            Yii::$app->session->setFlash('success_delete', 'Данные успешно удалены');
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash('error_delete', 'Ошибка при удалении данных. Пожалуйста, попробуйте позже или свяжитесь с разработчиком.');
            return $this->redirect(['index']);
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
            'update', 'id' => $idUpdate,
        ]);
    }
    
    /**
     * Finds the StaticBlocks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StaticBlocks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StaticBlocks::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
    }
}
