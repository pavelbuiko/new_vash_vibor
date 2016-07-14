<?php

namespace app\modules\backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\db\ActiveRecord;

class Plans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plans';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_view'], 'required'],
            [['id_view'], 'integer'],
            [['id_main_photo'], 'integer'],
            [['path'], 'safe'],
            [['path'], 'file', 'extensions' => 'jpg, jpeg, gif, png, docx, doc, pdf'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_view' => 'ИД представления',
            'id_main_photo'=>'фото',
            'path' => 'Имя файла',
        ];
    }


    public static function savePlans($model, $attribute)
    {
        $images = UploadedFile::getInstances($model, $attribute);
        //генерация случайного идентификатора в случае actionCreate
        $id_view = $model->id;//rand(11, 9999990);

        foreach ($images as $image)
        {

            $plansImage = new Plans();
            $ext = end((explode(".", $image->name)));
           // $plansImage->id_parent_photo = $parent_photo;
            $plansImage->path = \Yii::$app->security->generateRandomString().".{$ext}";
            //if($getview == 5)
            //{
            $plansImage->id_view = $id_view;
            //} else {
            //    $storageImage->id_view = (int)$getview;
            //}

            $path = Yii::getAlias('@webroot')."/uploads/".$plansImage->path;

            if($plansImage->save()) {
                $image->saveAs($path);
            }

        }
        return  Yii::$app->db->getLastInsertID();
        if(!empty($images)) {
            return $id_view;
        } else {
            return 1;
        }
    }
}
