<?php

namespace app\modules\backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "certificate".
 *
 * @property integer $id
 * @property integer $id_realtor
 * @property string $path
 * @property string $filename
 * @property string $string
 */
class Certificate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'certificate';
    }

    public static function saveCertificate($model, $attribute)
    {
        $images= UploadedFile::getInstances($model, $attribute);
        if (count($images) != 0){
           // Certificate::deleteAll(['id_realtor'=>$model->id]);

        }

        foreach ($images as $image) {

            $certificate = new Certificate();
            $certificate->filename = $image->name;
            $certificate->id_realtor = $model->id;
            $ext = end((explode(".", $image->name)));
            // generate a unique file name
            $certificate->path = Yii::$app->security->generateRandomString().".{$ext}";
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            $path = Yii::$app->params['uploadPath'] . $certificate->path;


            if ( $certificate->save()) {

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
            [['id_realtor', 'path', 'filename'], 'required'],
            [['id_realtor'], 'integer'],
            [['path', 'filename'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_realtor' => 'Id Realtor',
            'path' => 'Path',
            'filename' => 'Filename',

        ];
    }


}
