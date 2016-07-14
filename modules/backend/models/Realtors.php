<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "realtors".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $slogan
 * @property string $gmail
 * @property string $twitter
 * @property string $facebook
 * @property string $description
 * @property string $photo
 */
class Realtors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public $files;
    public $mainphoto;

    public  $image;
    public $certificates;


    public static function tableName()
    {
        return 'realtors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'phone'], 'string', 'max' => 50],
            [['slogan', 'gmail', 'twitter', 'facebook', 'filial' ], 'string', 'max' => 512],
            [[ 'description' ], 'string', 'max' =>2048],
            [['photo'], 'file', 'extensions' => 'jpg, jpeg, gif, png'],
            [['mainphoto'], 'safe'],
            [['mainphoto'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['certificates'], 'safe'],
            [['certificates'], 'file', 'extensions'=>'jpg, gif, png', 'maxFiles'=>6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'slogan' => 'Slogan',
            'gmail' => 'Gmail',
            'twitter' => 'Twitter',
            'facebook' => 'Facebook',
            'description' => 'Description',
            'photo' => 'Photo',
            'filial'=>'Filial'
        ];
    }

    public function getCertificates($id_realtor)
    {
      //  return $this->hasMany(Certificate::className(), ['id_realtor' => 'id'])->where(['id' => $this->id]);
       return  Certificate::find()
            ->where(['id_realtor' => $id_realtor])->all();
    }
}
