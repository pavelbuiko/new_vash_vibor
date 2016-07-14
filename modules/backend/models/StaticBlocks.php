<?php

namespace app\modules\backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "static_blocks".
 *
 * @property integer $id
 * @property integer $type //type of the rows/content
 * @property string $type_desc
 * @property string $created_at
 * @property string $updated_at
 * @property string $text1
 * @property string $text2
 * @property string $text3
 * @property string $text4
 * @property string $text5
 * @property string $text6
 * @property string $text7
 * @property string $text8
 * @property string $text9
 * @property string $text10
 * @property string $text11
 * @property string $text12
 * @property string $text13
 * @property string $text14
 * @property string $text15
 * @property string $string1
 * @property string $string2
 * @property string $string3
 * @property string $string4
 * @property string $string5
 * @property string $string6
 * @property string $string7
 * @property string $string8
 * @property string $string9
 * @property string $string10
 * @property string $string11
 * @property string $string12
 * @property string $string13
 * @property string $string14
 * @property string $string15
 */
class StaticBlocks extends ActiveRecord
{
    public $files;
    public $plans;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'static_blocks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['type', /* 'type_desc', 'created_at', 'updated_at' */], 'required'],
            [['type', 'photos_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['text1', 'text2', 'text3', 'text4', 'text5', 'text6', 'text7', 'text8', 'text9', 'text10', 'text11', 'text12', 'text13', 'text14', 'text15'], 'string'],
            [['type_desc', 'string1', 'string2', 'string3', 'string4', 'string5', 'string6', 'string7', 'string8', 'string9', 'string10', 'string11', 'string12', 'string13', 'string14', 'string15'], 'string', 'max' => 128],
            //[['files'], 'file', 'extensions' => 'jpg, jpeg, png, gif'],
            [['files'], 'file', 'extensions' => 'jpg, jpeg, png, gif, doc, docx, pdf','maxFiles' => 1],
            [['plans'], 'file', 'extensions' => 'jpg, jpeg, png, gif, doc, docx, pdf','maxFiles' => 1],
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
            'type_desc' => 'Type Desc',
            'photos_id' => 'Photos Id in storage',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'text1' => 'Text1',
            'text2' => 'Text2',
            'text3' => 'Text3',
            'text4' => 'Text4',
            'text5' => 'Text5',
            'text6' => 'Text6',
            'text7' => 'Text7',
            'text8' => 'Text8',
            'text9' => 'Text9',
            'text10' => 'Text10',
            'text11' => 'Text11',
            'text12' => 'Text12',
            'text13' => 'Text13',
            'text14' => 'Text14',
            'text15' => 'Text15',
            'string1' => 'String1',
            'string2' => 'String2',
            'string3' => 'String3',
            'string4' => 'String4',
            'string5' => 'String5',
            'string6' => 'String6',
            'string7' => 'String7',
            'string8' => 'String8',
            'string9' => 'String9',
            'string10' => 'String10',
            'string11' => 'String11',
            'string12' => 'String12',
            'string13' => 'String13',
            'string14' => 'String14',
            'string15' => 'String15',
        ];
    }
    
    public function behaviors() {        
        return [
            [
                'class'         => TimestampBehavior::className(),
                'attributes'    => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ]
        ];
    }
    //Можно отрефакторить как getStorageImage(). Универсальный, проектировался под случайный ай-дишник, не зависимый от модели данных.
    public function getStorageImages($id)
    {
        return $this->hasMany(StorageImages::className(), ['id_view' => 'id'])->where(['id_view' => $id])->all();
    }
    
    public function getImages()
    {
        return $this->hasMany(StorageImages::className(), ['id_view' => 'id'])->where(['id_view' => $this->id])->all();
    }
    //Зависит от модели, к которой привязано хранилище, через ай-дишник.
    public function getStorageImage()
    {
        return $this->hasMany(StorageImages::className(), ['id_view' => 'id'])->where(['id_view' => $this->id])->one();
    }
    
    public function getImg()
    {
        return $this->hasMany(StorageImages::className(), ['id_view' => 'id'])->where(['id_view' => $this->id])->one()->path;
    }


    public function getDescribe1()
    {
        return $this->hasMany(StorageImages::className(), ['id_view' => 'id'])->where(['id_view' => $this->id])->one()->describe1;
    }
    public function getDescribe2()
    {
        return $this->hasMany(StorageImages::className(), ['id_view' => 'id'])->where(['id_view' => $this->id])->one()->describe2;
    }




    public function getPlansImages($id)
    {
        return $this->hasMany(Plans::className(), ['id_view' => 'id'])->where(['id_view' => $id])->all();
    }
    public function getPlans()
    {
        return $this->hasMany(Plans::className(), ['id_view' => 'id'])->where(['id_view' => $this->id])->all();
    }

}
