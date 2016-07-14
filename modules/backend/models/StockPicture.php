<?php

namespace app\modules\backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "stock_picture".
 *
 * @property integer $id
 * @property string $path
 * @property integer $id_stock
 * @property string $info
 */
class StockPicture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock_picture';
    }

    /**
     * @inheritdoc
     */

    public $photos;

    public static function savePicture($model, $attribute)
    {
        $images= UploadedFile::getInstances($model, $attribute);
        if (count($images) != 0){
            // Certificate::deleteAll(['id_realtor'=>$model->id]);

        }


        foreach ($images as $image) {

            $stockpicture = new StockPicture();
            $stockpicture->id_stock = $model->id;
            $ext = end((explode(".", $image->name)));
            // generate a unique file name
            $stockpicture->path = Yii::$app->security->generateRandomString().".{$ext}";
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            $path = Yii::$app->params['uploadPath'] . $stockpicture->path;


            if ( $stockpicture->save()) {

                $image->saveAs($path);

            }
            /* $id_photo = Yii::$app->db->getLastInsertID();
             $model->photos_id = $id_photo;*/

        }
        return  Yii::$app->db->getLastInsertID();
    }

    public function rules()
    {
        return [
            [['id_stock'], 'integer'],
            [['path', 'info'], 'string', 'max' => 256],


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'id_stock' => 'Id Stock',
            'info' => 'Info',
        ];
    }
}
