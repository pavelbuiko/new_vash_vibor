<?php

namespace app\modules\backend\controllers;

use app\modules\backend\models\Objects;
use app\modules\backend\models\StockPicture;
use Yii;
use app\modules\backend\models\Stock;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * StockController implements the CRUD actions for Stock model.
 */

Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';
class StockController extends Controller
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
        ];
    }

    /**
     * Lists all Stock models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Stock::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Stock model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Stock model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Stock();
        $objects = Objects::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            StockPicture::savePicture($model, 'photos');



            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'objects'=>$objects,

            ]);
        }
    }

    /**
     * Updates an existing Stock model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $objects = Objects::find()->all();
        $photos =$model->getPhotos($model->id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            StockPicture::savePicture($model, 'photos');



            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'objects'=>$objects,
                'photos'=>$photos,
            ]);
        }
    }

    /**
     * Deletes an existing Stock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Stock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Stock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Stock::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionDeletePhoto($id, $id_update){
        $model = StockPicture::findOne($id);

        if ($model->delete()){
            Yii::$app->session->setFlash('success', 'Изображение успешно удалено. Теперь можно загрузить другое:)');
        }
        else{
            Yii::$app->session->setFlash('error_delete_image', 'Ошибка при удалении изображения! Пожалуйста, попробуйте позже или свяжитесь с разработчиком.');
        }

        return $this->redirect([
            'update', 'id' => $id_update,

        ]);
    }


}
