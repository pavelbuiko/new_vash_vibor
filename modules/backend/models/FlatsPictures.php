<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "flats_pictures".
 *
 * @property integer $id
 * @property string $path
 * @property string $filename
 * @property integer $id_flat
 * @property string $text1
 */
class FlatsPictures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $image;

    public static function tableName()
    {
        return 'flats_pictures';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_flat'], 'integer'],
            [['path', 'filename', 'text1'], 'string', 'max' => 255],

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
            'filename' => 'Filename',
            'id_flat' => 'Id Flat',
            'text1' => 'Text1',
        ];
    }
}
