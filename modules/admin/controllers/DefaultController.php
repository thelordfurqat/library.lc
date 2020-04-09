<?php

namespace app\modules\admin\controllers;

use app\models\LoginForm;
use app\models\Resettoken;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'=>['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['/admin/default/login','create'],
                        'allow' => true,
                        'roles' => ['?'],
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
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        return $this->render('index');
    }


    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = "login.php";
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $m=User::findOne(Yii::$app->user->identity->id);
            $m->active=1;
            $m->save();
            return $this->redirect('index');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        $m=User::findOne(Yii::$app->user->identity->id);
        $m->active=0;
        $m->save();
        Yii::$app->user->logout();

        return $this->redirect('login');
    }


    public function actionCreate(){
        $model = new User();
        if($model->load(Yii::$app->request->post())){
            $model->role_id = 1;
            $model->encrypt();
            $model->save();
        }
        return $this->redirect(['login']);
    }

    public function actionUpdate()
    {
        $id = Yii::$app->user->getId();
        $model = User::findOne($id);
        $img = $model->image;
        $pas = $model->password;
        $model->password = "";
        if ($model->load(Yii::$app->request->post())) {
            $model->email = $model->username;
            $model->upload($img);

            if(!$model->password){
                $model->password = $pas;
            }else{
                $model->encrypt();
            }
            $model->save();

        }
        return $this->render('update', [
            'model' => $model,
        ]);

    }


    public function actionReset(){
        if(!Yii::$app->user->isGuest){
            return $this->redirect(['index']);
        }
        $this->layout = "login.php";
        $model = new Resettoken();
        $model->token = $model->getToken();

        if($model->load(Yii::$app->request->post())){
            if($us = User::findOne(['username'=>$model->email])){
                $model->user_id = $us->id;
            }else{
                return $this->render('_reset',['model'=>$model,'error'=>'Bunday email mavjud emas']);
            }

            $model->save();
            $url = \yii\helpers\Url::base('');
            $body = $this->render('_bodyToken',[
                'token'=>$model->token,
            ]);
            Yii::$app->mailer->compose()
                ->setTo($model->email)
                ->setFrom(['info@'.substr($url,2,strlen($url)) => 'Admin CMS '.substr($url,2,strlen($url))])
                ->setSubject('Qayta tiklash uchun so\'rov')
                ->setTextBody($body)
                ->send();
            return $this->redirect(['login']);
        }
        return $this->render('_reset',['model'=>$model]);
    }


    public function actionToken($token){

        $this->layout = "login.php";

        if($t = Resettoken::findOne(['token'=>$token])){

            $model = User::findOne($t->user_id);
            $model->password = "";
            if($model->load(Yii::$app->request->post())){

                $body = $this->render('_bodyPasswordSend',[
                    'parol'=>$model->password,
                ]);

                $model->encrypt();
                $model->save();
                $url = \yii\helpers\Url::base('');

                Yii::$app->mailer->compose()
                    ->setTo($model->email)
                    ->setFrom(['info@'.substr($url,2,strlen($url)) => 'Admin CMS '.substr($url,2,strlen($url))])
                    ->setSubject('Sizning yangi parolingiz!')
                    ->setTextBody($body)
                    ->send();
                $this->redirect(['login']);
                return $this->redirect(['login']);
            }

            return $this->render('_resetPassword',['model'=>$model]);

        }else{
            throw new NotFoundHttpException();
        }
    }

    public function actionPro(){
        $this->layout = "login.php";
        return $this->render('_bodyToken',[
            'token'=>"token nichikdir",
        ]);
    }


}
