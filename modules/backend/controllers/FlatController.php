<?php

namespace app\modules\backend\controllers;

use app\modules\backend\models\FlatsPictures;
use app\modules\backend\models\Objects;
use Yii;
use app\modules\backend\models\Flat;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FlatController implements the CRUD actions for Flat model.
 */
class FlatController extends Controller
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
     * Lists all Flat models.
     * @return mixed
     */
    public function actionIndex($type)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Flat::find()->where(['type'=>$type])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'type'=>$type,
        ]);
    }

    /**
     * Displays a single Flat model.
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
     * Creates a new Flat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type)
    {
        $model = new Flat();
        $model->type = $type;
        $objects = Objects::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Flat::saveFlatFoto($model, 'image');

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'objects'=>$objects,
                'type'=>$type
            ]);
        }
    }

    /**
     * Updates an existing Flat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $type = $model->type;
        $objects = Objects::find()->all();
        $images=$model->getFlatsFoto($model->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Flat::saveFlatFoto($model, 'image');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'images'=>$images,
                'model' => $model,
                'objects'=>$objects,
                'type'=>$type,
            ]);
        }
    }

    /**
     * Deletes an existing Flat model.
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
     * Finds the Flat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Flat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Flat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionDeleteImage($id, $id_update){
        $model = FlatsPictures::findOne($id);


        if ($model->delete()){
            Yii::$app->session->setFlash('success', 'Изображение успешно удалено. Теперь можно загрузить другое:)');
        }
        else{
            Yii::$app->session->setFlash('error_delete_image', 'Ошибка при удалении изображения! Пожалуйста, попробуйте позже или свяжитесь с разработчиком.');
        }

        return $this->redirect([
            'update', 'id' =>$id_update
        ]);
    }
}
