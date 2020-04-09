<?php

namespace app\controllers;

use app\models\Adds;
use app\models\Author;
use app\models\Book;
use app\models\Genre;
use app\models\News;
use app\models\Publisher;
use app\models\Region;
use app\models\Subject;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        updatestatus();
        $mostliked=Book::find()->where(['>','status',0])->orderBy(['like_counter'=>SORT_DESC])->limit(4*8)->all();
        $mostviewed=Book::find()->where(['>','status',0])->orderBy(['show_counter'=>SORT_DESC])->limit(4*8)->all();
        $mostseled=Book::find()->where(['>','status',0])->orderBy(['sales'=>SORT_DESC])->limit(6)->all();
        $latest=Book::find()->where(['>','status',0])->orderBy(['id'=>SORT_DESC])->limit(8*4)->all();
        $bestAuthors=Author::find()->all();
        ArrayHelper::multisort($bestAuthors,function ($x){return $x->likecounter;},[SORT_DESC]);
//debug($bestAuthors);
        $best3Authors=array_slice($bestAuthors,0,4*8);
        $genres=Genre::find()->orderBy(['count'=>SORT_DESC])->limit(4*8)->all();
        $subjects=Subject::find()->orderBy(['count'=>SORT_DESC])->limit(4*8)->all();
        $publishers=Publisher::find()->limit(4*8)->all();
        $regions=Region::find()->all();
        $latest_news=News::find()->where(['cat_id'=>30])->andwhere(['>','status',0])->andwhere(['>','active',0])->orderBy(['sort'=>SORT_DESC,'id'=>SORT_DESC])->limit(5)->all();
        $partners=News::find()->where(['cat_id'=>37])->andwhere(['>','status',0])->andwhere(['>','active',0])->orderBy(['sort'=>SORT_DESC,'id'=>SORT_DESC])->limit(10)->all();

//        debug($_['products']);
//        exit();

        return $this->render('index',[
            'mostliked'=>$mostliked,
            'mostviewed'=>$mostviewed,
            'mostseled'=>$mostseled,
            'best3Authors'=>$best3Authors,
            'latest'=>$latest,
            'genres'=>$genres,
            'subjects'=>$subjects,
            'publishers'=>$publishers,
            'regions'=>$regions,
            'latest_news'=>$latest_news,
            'partners'=>$partners,
        ]);
    }
    public function actionGetBook($code){
        if($model=Book::find()->where(['code'=>$code])->one()){
            $this->layout='empty';
            echo $this->render('_modal',[
                'model'=>$model,
            ]);

        }
        else
            throw new NotFoundHttpException('Gashir soki.');
        exit();
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        if(Yii::$app->request->post()){
            echo 'ok';
            exit();
        }
        return $this->render('about');
    }
}
