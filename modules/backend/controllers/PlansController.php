<?php

namespace app\modules\backend\controllers;

use app\modules\backend\models\Objects;
use Yii;
use app\modules\backend\models\FloorPlans;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PlansController implements the CRUD actions for FloorPlans model.
 */
class PlansController extends Controller
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
     * Lists all FloorPlans models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => FloorPlans::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FloorPlans model.
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
     * Creates a new FloorPlans model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FloorPlans();

        $objects = Objects::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $image = UploadedFile::getInstance($model, 'image');


            // store the source file name
            if ($image != null){

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
                    'objects' =>$objects,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'objects' =>$objects,
            ]);
        }
    }


    /**
     * Updates an existing FloorPlans model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $objects = Objects::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $image = UploadedFile::getInstance($model, 'image');


            // store the source file name
            if ($image != null){

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
                return $this->redirect(['update', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'objects' =>$objects,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'objects' =>$objects,
            ]);
        }
    }

    /**
     * Deletes an existing FloorPlans model.
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
     * Finds the FloorPlans model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FloorPlans the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FloorPlans::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
