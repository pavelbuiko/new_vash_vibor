<?php

namespace app\modules\backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * This is the model class for table "storage_images".
 *
 * @property integer $id
 * @property integer $id_view
 * @property string $path
 * 
 * example create and update :
 * 
 * CONTROLLER:
    public function actionCreate()
    { 
        $model = new ModelClass();

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            $model->images = StorageImages::saveImages($model, 'files', 'objects');
            
            if($model->save()) 
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }     
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $id_view = $model->images;
        
        if ($model->load(Yii::$app->request->post())) 
        {
            StorageImages::saveImages($model, 'files', 'objects', $id_view);
            
            if($model->save()) 
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
  
    public function actionDeleteimage($id, $idUpdate) {
        $model = StorageImages::findOne($id);

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Изображение успешно удалено. Теперь ты можешь загрузить другое:)');
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка, при удалении изображения! Пожалуйста, попробуйте позже или свяжитесь с разработчиком');
        }

        return $this->redirect([
            'update', 'id' => $idUpdate,
        ]);
    }
 * 
 * VIEWS:
 * 
 * 
 * 
 * 
 */
class StorageImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'storage_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_view'], 'required'],
            [['id_view'], 'integer'],
            [['parent'], 'integer'],
            [['path'], 'safe'],
            //[['path'], 'file', 'extensions' => 'jpg, jpeg, gif, png'],
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
            'parent'=>'фото',
            'path' => 'Имя файла',
        ];
    }
    
    /**
     * 
     * @param type $model экземпляр класса модели, который имеет атрибут с изображением
     * @param type $attribute атрибут этой модели, который содержит id картинки
     * @param type $folder дериктория в которую сохраняем
     * @param type $getview
     * @return int
     */
    public static function saveImagesInFolder($model, $attribute, $folder, $getview = 5)
    {
        $images = UploadedFile::getInstances($model, $attribute);
        //генерация случайного идентификатора в случае actionCreate
        $id_view = rand(11, 9999990);

        
        foreach ($images as $image)
        {
            $storageImage = new StorageImages();
            $ext = end((explode(".", $image->name)));
            
            $storageImage->path = \Yii::$app->security->generateRandomString().".{$ext}";
            if($getview == 5)
            {
                $storageImage->id_view = $id_view;
            } else {
                $storageImage->id_view = $getview;
            }            
            
            $path = Yii::getAlias('@webroot')."/uploads/".$folder."/".$storageImage->path;
            
            if($storageImage->save()) {
                $image->saveAs($path);
            }            
        }
        
        if(!empty($images)) {
            return $id_view;
        } else {
            return 1;
        }        
    }
    
    /**
     * 
     * @param type $model
     * @param type $attribute
     * @param type $getview - исключена(закомментированные строки в методе подразумевают 
     * использование этого параметра)
     * @return int
     */
    public static function saveImages($model, $attribute, $storage_images)
    {
        $images = UploadedFile::getInstances($model, $attribute);
          //генерация случайного идентификатора в случае actionCreate
        $id_view = $model->id;//rand(11, 9999990);
        foreach( $storage_images as $img){
         //   $img->delete();
        }


        if (count($images) != 0){

  /*      var_dump($model->photos_id);*/
        if ($model->type != 27 )
        StorageImages::deleteAll(['id'=>$model->photos_id]);


       // $storage_images->delete();
       // var_dump($storage_images[1]->id_view);
       /* foreach($storage_images as $st_img){


        }*/


        foreach ($images as $image) {
            $storageImage = new StorageImages();
            $ext = end((explode(".", $image->name)));

            $storageImage->path = \Yii::$app->security->generateRandomString() . ".{$ext}";
            //if($getview == 5)
            //{
            $storageImage->id_view = $id_view;
            //} else {
            //    $storageImage->id_view = (int)$getview;
            //}            

            $path = Yii::getAlias('@webroot') . "/uploads/" . $storageImage->path;

            if ($storageImage->save()) {
                $image->saveAs($path);
            }
           /* $id_photo = Yii::$app->db->getLastInsertID();
            $model->photos_id = $id_photo;*/

        }
        }

        return  Yii::$app->db->getLastInsertID();
           if(!empty($images)) {
            return $id_view;
        } else {
            return 1;
        }        
    }

    public static function saveImagesChildren($model, $attribute)
    {
        $images = UploadedFile::getInstances($model, $attribute);
        //генерация случайного идентификатора в случае actionCreate
        $id_view = $model->id;//rand(11, 9999990);


       // var_dump($storage_images[1]->id_view);

        if (count($images) != 0){

          if ($model->type == 25 ) {
              Plans::deleteAll(['id_view' => $model->id]);
          }

        foreach ($images as $image)
        {
           $plans = new Plans();

           $ext = end((explode(".", $image->name)));

           $plans->path = \Yii::$app->security->generateRandomString().".{$ext}";
           /* $plans->parent =  $parent_photo;*/
            //if($getview == 5)
            //{
            $plans->id_view = $id_view;
            $plans->id_main_photo = $model->photos_id;
            //} else {
            //    $storageImage->id_view = (int)$getview;
            //}

            $path = Yii::getAlias('@webroot')."/uploads/".$plans->path;

            if($plans->save()) {
                $image->saveAs($path);
            }

            }
        }
        return  Yii::$app->db->getLastInsertID();

    }





    public static function savePlansImages($model, $attribute, $getview = 5)
    {

        $images = UploadedFile::getInstances($model, $attribute);
        //генерация случайного идентификатора в случае actionCreate
        $id_view = $model->id;//rand(11, 9999990);

        foreach ($images as $image)
        {
            $storageImage = new StorageImages();
            $ext = end((explode(".", $image->name)));

            $storageImage->path = \Yii::$app->security->generateRandomString().".{$ext}";
            //if($getview == 5)
            //{
            $storageImage->id_view = $id_view;
            //} else {
            //    $storageImage->id_view = (int)$getview;
            //}

            $path = Yii::getAlias('@webroot')."/uploads/".$storageImage->path;

            if($storageImage->save()) {
                $image->saveAs($path);
            }
        }

        if(!empty($images)) {
            return $id_view;
        } else {
            return 1;
        }
    }




    /**
     * Сохранить в папку upload/ и уменьшенную копию с заданным разрешением в upload/thumbs/, вернув при этом ключ
     * @param ActiveRecord $model - экземпляр класса модели, который имеет атрибут с изображением(файлом)
     * @param string $attribute - атрибут этой модели, который содержит id картинки
     * @param integer $w ширина thumb-картинки
     * @param integer $h высота thumb-картинки
     * @return int значение-ключ, по которому идентифицируются изображения из хранилища с моделью
     */
    public static function saveImagesWithThumbs($model, $attribute, $w, $h)
    {
        $images = UploadedFile::getInstances($model, $attribute);

        //генерация случайного идентификатора в случае actionCreate
        $id_view = $model->id;//rand(11, 9999990);
        
        foreach ($images as $image)
        {
            $storageImage = new StorageImages();
            $ext = end((explode(".", $image->name)));
            
            $storageImage->path = \Yii::$app->security->generateRandomString().".{$ext}";
            
            $storageImage->id_view = $id_view;
            
            $path = Yii::getAlias('@webroot')."/uploads/".$storageImage->path;
            
            if($storageImage->save()) {
                $image->saveAs($path);
            }
            
            $pathThumb = Yii::getAlias('@webroot').'/uploads/thumbs/'.$storageImage->path;
            if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif') {
                Image::thumbnail($path, $w, $h)->save($pathThumb);
            }
        }
        
        if(!empty($images)) {
            return $id_view;
        } else {
            return 1;
        }        
    }
    
    public static function saveImagesWithTwoThumbs($model, $attribute, $w, $h, $w2, $h2)
    {
        $images = UploadedFile::getInstances($model, $attribute);
        //генерация случайного идентификатора в случае actionCreate
        $id_view = $model->id;//rand(11, 9999990);
        
        foreach ($images as $image)
        {
            $storageImage = new StorageImages();
            $ext = end((explode(".", $image->name)));
            
            $storageImage->path = \Yii::$app->security->generateRandomString().".{$ext}";
            
            $storageImage->id_view = $id_view;
            
            $path = Yii::getAlias('@webroot')."/uploads/".$storageImage->path;
            
            if($storageImage->save()) {
                $image->saveAs($path);
            }
            
            $pathThumb = Yii::getAlias('@webroot').'/uploads/thumbs/'.$storageImage->path;
            Image::thumbnail($path, $w, $h)->save($pathThumb);
            
            
            $pathThumb2 = Yii::getAlias('@webroot').'/uploads/thumbs2/'.$storageImage->path;
            Image::thumbnail($path, $w2, $h2)->save($pathThumb2);            
        }
        
        if(!empty($images)) {
            return $id_view;
        } else {
            return 1;
        }        
    }
}
