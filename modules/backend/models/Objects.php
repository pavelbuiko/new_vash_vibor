<?php

namespace app\modules\backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\base\Model;

/**
 * This is the model class for table "objects".
 *
 * @property integer $id
 * @property string $title
 * @property integer $id_view
 * @property string $color
 * @property string $price_1
 * @property string $price_2
 * @property string $price_3
 * @property string $address
 * @property string $description
 * @property string $description_down
 * @property integer $type
 * @property string $photo
 * @property string $region
 * @property string $street
 * @property string $floats
 * @property string $material
 * @property string $enterdate
 * @property string $square
 */
class Objects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $files;
    public $mainphoto;

    public  $image;
    public $certificates;

    public $imageFile;
    public $status;

    public static function tableName()
    {
        return 'objects';
    }

    public static function getChecked()
    {

    }

    public static function findMinPriceOneRoom()
    {
        return Objects::find()->min('price_1');
    }
    public static function findMinPriceTwoRoom()
    {
        return Objects::find()->min('price_2');
    }
    public static function findMinPriceThirdRoom()
    {
        return Objects::find()->min('price_3');
    }

    public static function findActiveObjects()
    {
        return  Objects::find()
            ->where(['active' => '1'])->all();
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_view', 'type', 'id_realtor', 'active'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['color', 'price_1', 'price_2', 'price_3'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 100],
            [[ 'description_down',  'region', 'street', 'floats', 'material', 'enterdate', 'square'], 'string', 'max' => 256],
            [['description'], 'string', 'max' => 1024],
            [['photo'], 'file', 'extensions' => 'jpg, jpeg, gif, png'],
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
            'title' => 'Title',
            'id_view' => 'Id View',
            'id_realtor'=> 'Id Realtor',
            'color' => 'Color',
            'price_1' => 'Price 1',
            'price_2' => 'Price 2',
            'price_3' => 'Price 3',
            'address' => 'Address',
            'description' => 'Description',
            'description_down' => 'Description Down',
            'type' => 'Type',
            'photo' => 'Photo',
            'region' => 'Region',
            'street' => 'Street',
            'floats' => 'Floats',
            'material' => 'Material',
            'enterdate' => 'Enterdate',
            'square' => 'Square',
        ];
    }
    public function getObjectsStocks($id_object){
        return  Stock::find()
            ->where(['id_object' => $id_object, 'active' => '1'])->all();
    }

}
