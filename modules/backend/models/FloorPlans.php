<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "floor_plans".
 *
 * @property integer $id
 * @property string $title
 * @property integer $square
 * @property integer $room
 * @property string $status
 * @property string $price
 * @property integer $id_object
 */
class FloorPlans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $image;

    public static function tableName()
    {
        return 'floor_plans';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['square', 'room', 'id_object'], 'integer'],
            [['title', 'status', 'price', 'photo'], 'string', 'max' => 200],
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
            'square' => 'Square',
            'room' => 'Room',
            'status' => 'Status',
            'price' => 'Price',
            'id_object' => 'Id Object',
        ];
    }
}
