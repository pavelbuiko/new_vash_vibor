<?php

namespace app\modules\main\controllers;

use app\modules\backend\models\Objects;
use app\modules\backend\models\Realtors;
use app\modules\main\models\ContactForm;
use Yii;
use yii\web\Controller;
use app\modules\backend\models\StaticBlocks;
use app\modules\main\models\OrderForm;
use yii\data\ActiveDataProvider;
use app\modules\backend\models\StorageImages;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    public $her = '';

    public $contact ;
    public $under_photos;


    public function actions()
    {


       /* return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];*/
    }




    public function actionIndex()
    {

//        die('fdsaf');
//        $this->enableCsrfValidation = false;
        $orderForm = new OrderForm();
        $feedbackForm = new \app\modules\main\models\FeedbackForm();
        $contactForm = new \app\modules\main\models\ContactForm();

        //// in newvibor uses

        $modelcontact = StaticBlocks::findOne(['type' => 2]);
        $this->contact = $modelcontact;
        $min_price_1= Objects::findMinPriceOneRoom();
        $min_price_2= Objects::findMinPriceTwoRoom();
        $min_price_3= Objects::findMinPriceThirdRoom();
        $active_objects = Objects::findActiveObjects();







        $requestPriceListForm = new \app\modules\main\models\RequestPriceListForm();
        $texts = StaticBlocks::findOne(['type' => 7]);  // mapppp


        $clients = StaticBlocks::findAll(['type' => 10]);
        $reviews = StaticBlocks::findOne(['type' => 9]);
        $contacts = StaticBlocks::findOne(['type' => 8]);

        $slider = StaticBlocks::findAll(['type' => 11]);
        $this->under_photos = $slider;

        $this->her="444";

        $otziv = StaticBlocks::findAll(['type' => 20]);
        $block4_slider = StaticBlocks::findAll(['type' => 25]);
        $block6_slider = StaticBlocks::findAll(['type' => 21]);
        $block7_slider = StaticBlocks::findAll(['type' => 22]);

        $block1_slider = StaticBlocks::findAll(['type' => 26]);

        $block5_slider = StaticBlocks::findAll(['type' => 27]);


        $images_slider = array();

        foreach($block5_slider as $key =>$value){
            $images_slider[$key]['images'] = $value->getStorageimages($value->id);

        }
        $images_slider[0]['images'];


        $examplesbanner = StaticBlocks::findAll(['type' => 13]);
        $block8_slider = StaticBlocks::findAll(['type' => 30]);
        $news = StaticBlocks::findAll(['type' => 25]);



        foreach($news as $key => $new ){
            $date = $new->text5;
            $str=strpos($date, ".");
            $day=substr($date, 0, $str);

            $news[$key]->text6 = $day;
            $month=substr($date, 3, 2);
         switch($month){
                case '01': $news[$key]->text7 = 'ЯНВАРЯ';break;
                case '02': $news[$key]->text7 = 'ФЕВРАЛЯ';break;
                case '03': $news[$key]->text7 = 'МАРТА';break;
                case '04': $news[$key]->text7 = 'АПРЕЛЯ';break;
                case '05': $news[$key]->text7 = 'МАЯ';break;
                case '06': $news[$key]->text7 = 'ИЮНЯ';break;
                case '07': $news[$key]->text7 = 'ИЮЛЯ';break;
                case '08': $news[$key]->text7 = 'АВГУСТА';break;
                case '09': $news[$key]->text7 = 'СЕНТЯБРЯ';break;
                case '10': $news[$key]->text7 = 'ОКТЯБРЯ';break;
                case '11': $news[$key]->text7 = 'НОЯБРЯ';break;
                case '12': $news[$key]->text7 = 'ДЕКАБРЯ';break;
            }
        }


        $contactForm->name ='';
        $contactForm->phone='';
        $contactForm->email = '';
       /* $contactForm->floor='';
        $contactForm->square='';
        $contactForm->material='';
        $contactForm->type='';*/
        $name = $contactForm->name ='';
        $phone =$contactForm->phone ='';
        $email = $contactForm->email = '';
     /*   $floor = $contactForm->floor= '';
        $square = $contactForm->square= '';
        $material = $contactForm->material= '';
        $type= $contactForm->type= '';*/

        if ($contactForm->load(Yii::$app->request->post()) ) {

           $name = $contactForm->name;
           $phone =$contactForm->phone;
           $email = $contactForm->email;
           $message = $_POST['ContactForm']['body'];
           $model = StaticBlocks::findOne(['id' => 2]);

           $headers = "From: 'pasha.buiko@mail.ru'\r\n".
                "MIME-Version: 1.0" . "\r\n" .
                "Content-type: text/html; charset=UTF-8" . "\r\n";

            $body = '<b>Имя: </b>'.$name.'<br>'.
                    'Телефон: </b>'.$phone.'<br>';
            if ($email != ''){
                $body = $body.'<br>'.
               'Email: </b>'.$email.'<br>'.
                    'Текст сообщения: </b>'.$message.'<br>'

                ;

            };
           (mail($modelcontact->text5 , 'Обратная связь', $body, $headers));


            $name = $contactForm->name ='';
            $phone =$contactForm->phone ='';
            $email = $contactForm->email = '';
            $floor = $contactForm->floor= '';
            $square = $contactForm->area= '';
            $material = $contactForm->material= '';
            $type= $contactForm->type= '';


            // делаем что-то полезное с $model ...

            return $this->render('index', [
                'orderForm' => $orderForm,
                'feedbackForm' => $feedbackForm,
                'requestPriceListForm' => $requestPriceListForm,
                'texts' => $texts,
                'clients' => $clients,
                'reviews' => $reviews,
                'contacts' => $contacts,
                'sliders' => $slider,
                'examplesbanner' => $examplesbanner,
                'otziv'=>$otziv,
                'block4_slider'=>$block4_slider,
                'block6_slider'=>$block6_slider,
                'block7_slider'=>$block7_slider,
                'block1_slider'=>$block1_slider,
                'block5_slider'=>$block5_slider,
                'images_slider' => $images_slider,
                'block8_slider'=>$block8_slider,
                'contactForm' => $contactForm,
                'modelcontact'=>$modelcontact,
                'news'=>$news,
            ]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
           // return $this->render('entry', ['model' => $contactForm]);
        }


        return $this->render('index', [
            'orderForm' => $orderForm,
            'feedbackForm' => $feedbackForm,
            'requestPriceListForm' => $requestPriceListForm,
            'texts' => $texts,
            'clients' => $clients,
            'reviews' => $reviews,
            'contacts' => $contacts,
            'sliders' => $slider,
            'examplesbanner' => $examplesbanner,
            'otziv'=>$otziv,
            'block4_slider'=>$block4_slider,
            'block6_slider'=>$block6_slider,
            'block7_slider'=>$block7_slider,
            'block1_slider'=>$block1_slider,
            'block5_slider'=>$block5_slider,
            'contactForm' => $contactForm,
            'block8_slider'=>$block8_slider,
            'modelcontact'=>$modelcontact,
            'images_slider' => $images_slider,
            'news'=>$news,
            'minprice1'=>$min_price_1,
            'minprice2'=>$min_price_2,
            'minprice3'=>$min_price_3,
            'active_objects'=>$active_objects,

        ]);
    }

    public function actionCommand(){
        $slider = StaticBlocks::findAll(['type' => 11]);
        $modelcontact = StaticBlocks::findOne(['type' => 2]);
        $this->contact = $modelcontact;
        $this->under_photos = $slider;
        $realtors = Realtors::find()->all();

        return $this->render('command',[
            'realtors'=> $realtors,
        ]);
    }

    public function actionContacts(){
        $slider = StaticBlocks::findAll(['type' => 11]);
        $modelcontact = StaticBlocks::findOne(['type' => 2]);
        $this->contact = $modelcontact;
        $this->under_photos = $slider;
        $texts = StaticBlocks::findOne(['type' => 7]);  // mapppp
        $modelcontact = StaticBlocks::findOne(['type' => 2]);
        return $this->render('contacts',[
            'texts'=>$texts,
            'modelcontact'=>$modelcontact,

        ]);
    }






    public function actionSendEmail(){
        die('111');
    }

    public function actionGetOneProduct()
    {
        Yii::$app->request->get();
        //var_dump(Yii::$app->request->get()['id']);
        $pr = StaticBlocks::findOne(['type' => 8,'id' => Yii::$app->request->get()['id'] ]);
       // var_dump($pr->text2);

        return json_encode(array('string1'=> $pr->string1, 'text2' => $pr->text2));
//        $post = Yii::$app->request->post();
//        if(Yii::$app->request->post())
//        {
//            $pr = StaticBlocks::findOne(['type' => 8,'id' => $post['id'] ]);
//
//            return json_encode($pr);
//        }
//        if (Yii::$app->request->isAjax) {
//            Yii::$app->response->format = Response::FORMAT_JSON;
//
////            $post = Yii::$app->request->post();
////            return json_encode('fff');
//            $res = array(
//                'body'    => date('Y-m-d H:i:s'),
//                'success' => true,
//            );
//            $pr = StaticBlocks::findOne(['type' => 8,'id' => $get['id'] ]);
//            return $res;
//        }
//        $mail = \app\modules\backend\models\StaticBlocks::findOne(['type' => 2]);
//        $model = new FeedbackForm();
//        if($model->load(Yii::$app->request->post()) && $model->contact($mail->string1))
//        {
//            $success = true;
//            return json_encode($success);
//        } else {
//            return (new \yii\widgets\ActiveForm)->errorSummary($model);
//        }
    }
}