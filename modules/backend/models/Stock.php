<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property integer $id
 * @property integer $id_object
 * @property string $title
 * @property string $description
 * @property integer $square1
 * @property integer $square2
 * @property integer $float1
 * @property integer $float2
 * @property integer $room1
 * @property integer $room2
 * @property string $status1
 * @property string $status2
 * @property integer $price1
 * @property integer $price2
 * @property integer $totalprice
 * @property integer $active
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $photos;

    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_object', 'title'], 'required'],
            [['id_object', 'square1', 'square2', 'float1', 'float2', 'room1', 'room2', 'price1', 'price2','active'], 'integer'],
            [['title'], 'string', 'max' => 70],
            [['status1', 'status2','totalprice' ], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 256],
            [['photos'], 'safe'],
            [['photos'], 'file', 'extensions'=>'jpg, gif, png', 'maxFiles'=>6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_object' => 'Id Object',
            'title' => 'Title',
            'description' => 'Description',
            'square1' => 'Square1',
            'square2' => 'Square2',
            'float1' => 'Float1',
            'float2' => 'Float2',
            'room1' => 'Room1',
            'room2' => 'Room2',
            'status1' => 'Status1',
            'status2' => 'Status2',
            'price1' => 'Price1',
            'price2' => 'Price2',
            'totalprice' => 'Totalprice',
            'active' => 'Active',
        ];
    }

    public function getPhotos($id_stock)
    {
        //  return $this->hasMany(Certificate::className(), ['id_realtor' => 'id'])->where(['id' => $this->id]);
        return  StockPicture::find()
            ->where(['id_stock' => $id_stock])->all();
    }
}
