<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "infrastructure".
 *
 * @property integer $id
 * @property string $photo
 * @property string $l_text
 * @property string $r_text
 * @property integer $id_object
 * @property string $description
 */
class Infrastructure extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $image;

    public static function tableName()
    {
        return 'infrastructure';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_object'], 'integer'],
            [['photo', 'l_text', 'r_text', 'description','title'], 'string', 'max' => 1024],
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
            'photo' => 'Photo',
            'l_text' => 'L Text',
            'r_text' => 'R Text',
            'id_object' => 'Id Object',
            'description' => 'Description',
        ];
    }
}
