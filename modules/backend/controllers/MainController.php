<?php

namespace app\modules\backend\controllers;

use app\modules\backend\models\Objects;
use app\modules\backend\models\Stock;
use Yii;
use yii\data\ActiveDataProvider;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Objects::find(),
        ]);
        $model = Objects::find()->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model'=>$model,
        ]);
    }

    public function actionObjects(){
        $dataProvider = new ActiveDataProvider([
            'query' => Objects::find(),
        ]);
        $model = Objects::find()->all();
        if (Yii::$app->request->post('selection')){
            $actives =Yii::$app->request->post('selection');
            foreach($model as $object) {
                $object->active = 0;
                $object->save();
            }
            if ( $actives){
                foreach($model as $object){
                    $object->active = 0;
                    $object->save();
                    $id = (string)$object->id;
                    /*      var_dump($id);
                          var_dump($actives);*/
                    if (in_array($id, $actives)){
                        var_dump('1');
                        $object->active = 1;
                        $object->save();
                    }
                }
            }
        }

        $model = Objects::find()->all();

        return $this->render('index',array( 'dataProvider' => $dataProvider,
            'model'=>$model,));

    }


    public function actionStock()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Stock::find(),
        ]);
        $model = Stock::find()->all();
        if (  Yii::$app->request->post('selection')){
            $actives =Yii::$app->request->post('selection');
            foreach($model as $stock) {
                $stock->active = 0;
                $stock->save();
            }
            if ( $actives){
                foreach($model as $stock){
                    $stock->active = 0;
                    $stock->save();
                    $id = (string)$stock->id;
                    if (in_array($id, $actives)){
                        $stock->active = 1;
                        $stock->save();
                    }
                }
            }
        }

        $model = Stock::find()->all();

        return $this->render('stock', [
            'dataProvider' => $dataProvider,
            'model'=>$model,
        ]);
    }

}
