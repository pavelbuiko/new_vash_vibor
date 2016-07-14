<?php

namespace app\modules\backend\controllers;

use app\modules\backend\models\Realtors;
use Yii;
use app\modules\backend\models\Objects;
use yii\base\Object;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ObjectsController implements the CRUD actions for Objects model.
 */
Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';
class ObjectsController extends Controller
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
     * Lists all Objects models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Objects::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Objects model.
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
     * Creates a new Objects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Objects();
        $realtors = Realtors::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $image = UploadedFile::getInstance($model, 'image');


            // store the source file name
            if ($image != null){
                $model->filename = $image->name;
                $ext = end((explode(".", $image->name)));
                // generate a unique file name
                $model->photo = Yii::$app->security->generateRandomString().".{$ext}";
                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path = Yii::$app->params['uploadPath'] . $model->photo;
            }

            if($model->save()){
                if ($image != null)
                    $image->saveAs($path);
                Yii::$app->session->setFlash('success', [ 'duration'=>5000, 'message'=> 'The title was updated']);
                return $this->redirect(['index', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'realtors' =>$realtors,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'realtors' =>$realtors,
            ]);
        }
    }

    /**
     * Updates an existing Objects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $realtors = Realtors::find()->all();
        if ($model->load(Yii::$app->request->post() ) && $model->save() ) {


            $image = UploadedFile::getInstance($model, 'image');

            if ($image){
                $model->filename = $image->name;
                $ext = end((explode(".", $image->name)));
                $model->photo = Yii::$app->security->generateRandomString().".{$ext}";

                $path = Yii::$app->params['uploadPath'] . $model->photo;
            }

            if($model->save()){
                if ($image){
                    $image->saveAs($path);
                }


                Yii::$app->session->setFlash('success', 'Информация успешно обновлена.');
                return $this->redirect([
                    'update',
                    'id' => $model->id ,
                    'realtors' =>$realtors, ]);
            } else {
                // error in saving model
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'realtors' =>$realtors,
            ]);
        }
    }

    /**
     * Deletes an existing Objects model.
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
     * Finds the Objects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Objects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Objects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionDeleteImage($id){
        $model = Objects::findOne($id);
        $realtors = Realtors::find()->all();

        $model->photo= null;
        if ($model->save()){
            Yii::$app->session->setFlash('success', 'Изображение успешно удалено. Теперь можно загрузить другое:)');
        }
        else{
            Yii::$app->session->setFlash('error_delete_image', 'Ошибка при удалении изображения! Пожалуйста, попробуйте позже или свяжитесь с разработчиком.');
        }

        return $this->redirect([
            'update', 'id' => $id,
            'realtors' =>$realtors,
        ]);
    }
}
