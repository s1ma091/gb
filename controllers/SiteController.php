<?php
namespace app\controllers;
use Yii;
use yii\helpers\html;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\EmailForm;
use app\models\AddForm;
use app\models\Gb;
use app\models\Guestbook;
use yii\data\Pagination;
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex()
    {
        $good = '';
        $ipBlock = Yii::$app->request->userIP;
        $posts=Gb::find();
        $block =GuestBook::find()->where(['ip' => $ipBlock]);
         $pagination = new Pagination([
             'defaultPageSize' => 5,
             'totalCount' => $posts->count()
         ]); 
        $model = new AddForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $site = new Gb();
           
            if($model->www != '') {
               $site->www = Html::encode($model->www); 
            }
              $site->browser =  $_SERVER['HTTP_USER_AGENT'];
              $site->ip = $ipBlock;
             $site->name = Html::encode($model->name);
             $site->message = nl2br(Html::encode($model->message));
            $site->datetime = Html::encode(date('Y-m-d H:i:s'));
            $site->email = Html::encode($model->email);
         if( $model->img = UploadedFile::getInstance($model, 'img')){
            $model->img->saveAs('img/'.$model->img->baseName.'.'.$model->img->extension);
             $site->img = 'img/'.$model->img->baseName.'.'.$model->img->extension;  
        }
         $site->save();
         $good = "good_lan";
        }
        $request = Yii::$app->request;
       if($request->get('order') == 'name') {
          if($request->get('dir') == 'up') {
             $posts = $posts->offset($pagination->offset)
        ->limit($pagination->limit)
         ->orderBy(['name'=> SORT_DESC])
        ->all();
          }  else {
  $posts = $posts
        ->offset($pagination->offset)
        ->limit($pagination->limit)
         ->orderBy(['name'=> SORT_ASC])
        ->all();
          }
       } else if ($request->get('order') == 'date') {
              if($request->get('dir') == 'up') {
             $posts = $posts->offset($pagination->offset)
        ->limit($pagination->limit)
         ->orderBy(['datetime'=> SORT_DESC])
        ->all();
          }  else {
  $posts = $posts
        ->offset($pagination->offset)
        ->limit($pagination->limit)
         ->orderBy(['datetime'=> SORT_ASC])
        ->all();
          }
       } else if ($request->get('order') == 'email') {
              if($request->get('dir') == 'up') {
             $posts = $posts->offset($pagination->offset)
        ->limit($pagination->limit)
         ->orderBy(['email'=> SORT_DESC])
        ->all();
          }  else {
  $posts = $posts
        ->offset($pagination->offset)
        ->limit($pagination->limit)
         ->orderBy(['email'=> SORT_ASC])
        ->all();
          }  
          }else {
             $posts = $posts
        ->offset($pagination->offset)
        ->limit($pagination->limit)
         ->orderBy(['datetime'=> SORT_DESC])
        ->all();
       }
if($request->get('del')) {
    $id = $request->get('del');
    $del = Gb::findOne($id);
    $del->delete();
}
if($request->get('block')) {
 $blocks = new Guestbook(); 
 $ip = $request->get('block');
 $blocks->ip = $ip;
 $blocks->save();
}
        return $this->render('hello',
        ['posts' => $posts,
        'pagination' => $pagination,
        'name' => $name,
        'model' => $model,
        'block' =>$block,
        'good' => $good
        ]);
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    public function actionEmail() {
     $email = new EmailForm();
     $success = '';
     $err = '';
         if ($email->load(Yii::$app->request->post())) {
             if(!$email->contact($email->email)) {
                   $err = 'Please write correct admin Email ';
             } else {
           $success = 'Success. Please, check your email';
             }
        }
        return $this->render('email', [
            'email' => $email,
            'success' => $success,
            'err' => $err,
        ] );
    }
}
