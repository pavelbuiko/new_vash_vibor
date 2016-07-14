<?php

namespace app\modules\backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "flat".
 *
 * @property integer $id
 * @property string $type
 * @property integer $id_object
 * @property string $title
 * @property string $description
 * @property integer $square1
 * @property integer $float1
 * @property integer $room1
 * @property string $status1
 * @property string $price1
 * @property integer $square2
 * @property integer $float2
 * @property integer $room2
 * @property string $status2
 * @property string $price2
 * @property string $totalprice
 */
class Flat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $image;

    public static function tableName()
    {
        return 'flat';
    }

    public static function saveFlatFoto($model, $attribute)
    {
        $images= UploadedFile::getInstances($model, $attribute);
        if (count($images) != 0){
            // Certificate::deleteAll(['id_realtor'=>$model->id]);

        }

        foreach ($images as $image) {

            $fl_picture = new FlatsPictures();
            $fl_picture->filename = $image->name;
            $fl_picture->id_flat = $model->id;
            $ext = end((explode(".", $image->name)));
            // generate a unique file name
            $fl_picture->path = Yii::$app->security->generateRandomString().".{$ext}";
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            $path = Yii::$app->params['uploadPath'] . $fl_picture->path;


            if ( $fl_picture->save()) {

                $image->saveAs($path);

            }
            /* $id_photo = Yii::$app->db->getLastInsertID();
             $model->photos_id = $id_photo;*/

        }
        return  Yii::$app->db->getLastInsertID();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_object', 'square1', 'float1', 'room1', 'square2', 'float2', 'room2'], 'integer'],
            [['type', 'title', 'status1', 'price1', 'status2', 'price2', 'totalprice'], 'string', 'max' => 256],
            [['description'], 'string', 'max' => 1024],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'id_object' => 'Id Object',
            'title' => 'Title',
            'description' => 'Description',
            'square1' => 'Square1',
            'float1' => 'Float1',
            'room1' => 'Room1',
            'status1' => 'Status1',
            'price1' => 'Price1',
            'square2' => 'Square2',
            'float2' => 'Float2',
            'room2' => 'Room2',
            'status2' => 'Status2',
            'price2' => 'Price2',
            'totalprice' => 'Totalprice',
        ];
    }

    public function getFlatsFoto($id)
    {
        return  FlatsPictures::find()
            ->where(['id_flat' => $id])->all();
    }
}
