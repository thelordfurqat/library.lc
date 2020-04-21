<?php

namespace app\controllers;

use app\models\Adds;
use app\models\Author;
use app\models\Book;
use app\models\Category;
use app\models\Genre;
use app\models\Library;
use app\models\News;
use app\models\Publisher;
use app\models\Region;
use app\models\search\BookSearch;
use app\models\search\GenreSearch;
use app\models\search\NewsSearch;
use app\models\search\SubjectSearch;
use app\models\search\UserSearch;
use app\models\Subject;
use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
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
        $latest_news=News::find()->where(['cat_id'=>30])->andwhere(['>','status',0])->andwhere(['>','active',0])->orderBy(['sort'=>SORT_DESC,'id'=>SORT_DESC])->limit(5)->all();

//        debug($_['products']);
//        exit();

        return $this->render('index',[
            'mostliked'=>$mostliked,
            'mostviewed'=>$mostviewed,
            'mostseled'=>$mostseled,
            'best3Authors'=>$best3Authors,
            'latest'=>$latest,
            'genres'=>$genres,
            'latest_news'=>$latest_news,
        ]);
    }

    public function actionBooks($author=null,$genre=null,$subject=null,$publisher=null,$region=null)
    {
        $query = Book::find()->where(['status' => 1]);
        if($author)
            $query = Book::find()->where(['status' => 1])->filterWhere(['like','authors','"'.$author.'"']);
        if($genre)
            $query = Book::find()->where(['status' => 1])->filterWhere(['like','genres','"'.$genre.'"']);
        if($subject)
            $query = Book::find()->where(['status' => 1])->andWhere(['subject_id'=>$subject]);
        if($publisher)
            $query = Book::find()->where(['status' => 1])->andWhere(['publisher_id'=>$publisher]);
        if($region!=null){
            $query = 'BU JOYINI KELAJAKDA QILAMIZ';
            debug($query);
            exit();
        }
        $defaultOrder = ['created'=>SORT_DESC];
        $searchModel = new BookSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => $defaultOrder,
            ],
        ]);

// returns an array of Post objects
        $model = $dataProvider->getModels();
        return $this->render('books',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBookview($code){
        if($code=null || !$model=Book::findOne(['code'=>$code]))
            throw new NotFoundHttpException('Kitob topilmadi');
        $model->show_counter++;
        $model->save();
        return $this->render('bookview',[
            'model'=>$model,
        ]);
    }
    public function actionGetBook($code){
        if($model=Book::findOne(['code'=>$code])){
            $this->layout='empty';
            echo $this->render('_modal',[
                'model'=>$model,
            ]);

        }
        else
            throw new NotFoundHttpException('Kitob topilmadi');
    }

    public function actionLibraries()
    {
        $query = Library::find()->where(['status' => 1]);

        $defaultOrder = ['created'=>SORT_DESC];
        $searchModel = new UserSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => $defaultOrder,
            ],
        ]);
        return $this->render('libraries',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionSubjects()
    {
        $query = Subject::find();

        $searchModel = new SubjectSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 5,
            ],

        ]);
        return $this->render('subjects',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionGenres()
    {
        foreach (Genre::find()->all() as $item) {
            $item->count=$item->booksCount;
            $item->save();
        }
        $query = Genre::find()->where(['>','count',0]);


        $searchModel = new GenreSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 5,
            ],

        ]);
        return $this->render('genres',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionAuthors()
    {
        $query = Author::find();


        $searchModel = new GenreSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 5,
            ],

        ]);
        return $this->render('authors',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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



    public function actionNews($code = null){

        if($category = Category::findOne(['code'=>$code])){
            $name=$category->name;
            $query = News::find()->where(['status' => 1])->andWhere(['cat_id'=>$category->id]);

            $defaultOrder = ['created'=>SORT_DESC];
            $searchModel = new NewsSearch();
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'defaultPageSize' => 10,
                ],
                'sort' => [
                    'defaultOrder' => $defaultOrder,
                ],
            ]);
            if(!$dataProvider->count)
                throw new NotFoundHttpException('Ma\'lumotlar topilmadi');
            return $this->render('news',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'name'=>$name,
            ]);
        }
    }

    public function actionPage($code = null){
        if($code == null){
            throw new NotFoundHttpException();
        }

        $c = Category::findOne(['code'=>$code]);
        $name=$c->name;
        if($m = News::findOne(['cat_id'=>$c->id])){
            return $this->render('page',[
                'model'=>$m,
                'code'=>$code,
                'name'=>$name
            ]);
        }else{
            throw new NotFoundHttpException();
        }


    }

    public function actionSitemap(){


        return $this->render('sitemap');

    }

    public function actionView($code){
        if($code == null){
            throw new NotFoundHttpException('Ma\'lumotlar topilmadi');
        }

        if($model = News::findOne(['code'=>$code])){
            $model->show_counter ++;
            $model->save();
            return $this->render('view',[
                'model'=>$model,
                'code'=>$code,
            ]);
        }else{
            throw new NotFoundHttpException('Ma\'lumotlar topilmadi');
        }

    }
}
