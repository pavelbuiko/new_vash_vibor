<?php

namespace app\modules\backend\controllers;

use app\modules\backend\models\Plans;
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
class SliderController extends Controller
{
    public $wThumbs = 93;
    public $hThumbs = 122;
    public $parent_id =0 ;
        
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
                'only' => ['index', 'create', 'update', 'delete', 'delete-image', 'delete-plans'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'delete-image', 'delete-plans'],
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
    public function actionIndex($type)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => StaticBlocks::find()->where(['type' => $type]),
        ]);

        $model = StaticBlocks::findOne(['type' => $type]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'type'=>$type,
            'model'=>$model
                    ]);
    }





    /**
     * Creates a new StaticBlocks model of the defined category data.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionCreate($type, $id=null)
    {
        if ($id == null){
            $model = new StaticBlocks();
        }
        else{
            $model = $this->findModel($id);
        }

        $model->type = $type;
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {

            if($model->save()){

                $storage_images = $model->getStorageimages($model->id);
                $parent_id =  StorageImages::saveImages($model, 'files', $storage_images);



               // StorageImages::deleteAll(['id'=>$model->photos_id]);
                $model->photos_id = $parent_id ;

               // StorageImages::saveImagesChildren($model, 'plans' );
                $images = $model->getStorageimages($model->id);
                $images_plans = $model->getPlansImages($model->id);



                Yii::$app->session->setFlash('success_create');
                return $this->redirect(['index',  'model' => $model,
                    'images'=> $images,
                    'images_plans'=>$images_plans,
                    'type'=>$type, ]);
            } else {
                Yii::$app->session->setFlash('error_save');
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'images'=> null,
                'images_plans'=>null,
                'type'=>$type,
            ]);
        }
    }
    public function actionReturn($type){
        $dataProvider = new ActiveDataProvider([
            'query' => StaticBlocks::find()->where(['type' => $type]),
        ]);

        $model = StaticBlocks::findOne(['type' => $type]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'type'=>$type,
            'model'=>$model
        ]);
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
        $type = $model->type;
        $id_view = $model->id;
        $images = $model->getStorageimages($model->id);

        $images_plans = $model->getPlansImages($model->id);




        if ( $model->load(Yii::$app->request->post()) )
        {
            $i = 0;
            $j=1;
            foreach ($images as $key=> $img){
                $img->describe1 = $_POST['StorageImage'][$i];
                $img->describe2 = $_POST['StorageImage'][$j];
                $i=$i+2;
                $j=$j+2;
                $img->save();

            }


            $storage_images = $model->getStorageimages($model->id);
            $parent_id =  StorageImages::saveImages($model, 'files', $storage_images);

            $model->photos_id = $parent_id ;
            /*StorageImages::saveImagesChildren($model, 'plans', $model->photos_id );*/

            $images_plans = $model->getPlansImages($model->id);

            if($model->save()) 
            {
                Yii::$app->session->setFlash('success_save');
                $images = $model->getStorageimages($model->id);
                return $this->redirect(['update','id' => $id ,'type'=>$type,'images'    => $images,
                    'images_plans'=>$images_plans,]);
            } else {
                Yii::$app->session->setFlash('error_save');
                return $this->redirect(['update', 'id' => $id]);
            }
        } else {

            return $this->render('update', [
                'model' => $model,
                'images'    => $images,
                'images_plans'=>$images_plans,
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
        $type = $this->findModel($id)->type;
        $this->findModel($id)->delete();
        
        return $this->redirect(['index', 'type'=> $type]);

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

    public function actionDeletePlans($id, $idUpdate) {
        $model = Plans::findOne($id);

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



    public function actionAddPlans($id_model){


        $model = $this->findModel($id_model);
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            if($model->save()){
                  Plans::savePlans($model, 'plans');
             //   $parent_id =  StorageImages::saveImages($model, 'files', $storage_images);
             //   StorageImages::deleteAll(['id'=>$model->photos_id]);
               // $model->photos_id = $parent_id ;

                Yii::$app->session->setFlash('success_create');
                return $this->redirect(['index', 'type'=>20]);
            } else {
                Yii::$app->session->setFlash('error_save');
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('addplans', [
                'model' => $model,
                'images'=> null,
                'type'=>20,
            ]);
        }

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
