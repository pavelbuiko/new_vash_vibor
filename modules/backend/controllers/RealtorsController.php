<?php

namespace app\modules\backend\controllers;

use app\modules\backend\models\Certificate;
use Yii;
use app\modules\backend\models\Realtors;
use app\modules\backend\models\RealtorsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RealtorsController implements the CRUD actions for Realtors model.
 */

Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';

class RealtorsController extends Controller
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
     * Lists all Realtors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RealtorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 8;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Realtors model.
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
     * Creates a new Realtors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Realtors();

        if ($model->load(Yii::$app->request->post()) && $model->save() ) {


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


            $ttt =  Certificate::saveCertificate($model, 'certificates');
         /*   var_dump($ttt);
            die();*/

            if($model->save()){
                if ($image != null)
                    $image->saveAs($path);
                Yii::$app->session->setFlash('success', [ 'duration'=>5000, 'message'=> 'The title was updated']);
                return $this->redirect(['index', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }




        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Realtors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $certificates =$model->getCertificates($model->id);
        if ($model->load(Yii::$app->request->post() ) && $model->save() ) {

            $image = UploadedFile::getInstance($model, 'image');
            Certificate::saveCertificate($model, 'certificates');
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
                return $this->redirect(['update', 'id' => $model->id, 'certificates' => $certificates]);
            } else {
                // error in saving model
            }





        } else {
            return $this->render('update', [
                'model' => $model,
                'certificates' => $certificates,
            ]);
        }
    }

    /**
     * Deletes an existing Realtors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionDeleteImage($id){
        $model = Realtors::findOne($id);


         $model->photo= null;
         if ($model->save()){
             Yii::$app->session->setFlash('success', 'Изображение успешно удалено. Теперь можно загрузить другое:)');
         }
          else{
              Yii::$app->session->setFlash('error_delete_image', 'Ошибка при удалении изображения! Пожалуйста, попробуйте позже или свяжитесь с разработчиком.');
          }

          return $this->redirect([
            'update', 'id' => $id,
        ]);
    }
    public function actionDeleteCertificate($id, $id_update){
        $model = Certificate::findOne($id);

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


    /**
     * Finds the Realtors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Realtors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Realtors::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionUploads(){
        $model = new Realtors();
        return $this->redirect(['create']);
    }


}
