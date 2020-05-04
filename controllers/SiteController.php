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
use Codeception\Lib\Generator\Shared\Classname;
use Yii;
use yii\base\Model;
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

    public function actionBooks($author=null,$genre=null,$subject=null,$publisher=null,$region=null,$library=null)
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

        if($library){
            $query = Book::findBySql(Library::findOne($library)->booksQuery);
            if(!Book::findBySql(Library::findOne($library)->booksQuery)->count())
                throw new NotFoundHttpException('Kitoblar topilmadi');
        }
        if($region!=null){
            throw new NotFoundHttpException('Ma\'lumotlar topilmadi');
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
        foreach (Subject::find()->all() as $item) {
            $item->count=$item->booksCount;
            $item->save();
        }
        $query = Subject::find()->where(['>','count',0]);

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
        $newUser=new User();
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $m=User::findOne(Yii::$app->user->identity->id);
            $m->active=1;
            $m->save();
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
            'newUser'=>$newUser,
        ]);
    }

    public function actionRegister()
    {
        $model=new User();
        if($model->load(Yii::$app->request->post()) && $model->password==$model->repeat_password){
            if($model->password!=$model->repeat_password){
                Yii::$app->session->setFlash('error_validate_password','Parolni takrorlashda xatolik!');
                $model->password='';
                $model->repeat_password='';
                return $this->render('login', [
                    'model' => new LoginForm(),
                    'newUser'=>$model,
                ]);
            }

            $model->role_id=3;
            $model->username=$model->email;
            $model->encrypt();
            $model->active=1;
            $model->save();
            $log=new LoginForm();
            $log->username=$model->username;
            $log->password=$model->repeat_password;
            $log->rememberMe=true;
            if($log->login() && $model->save())
            return $this->goBack();
            else
                Yii::$app->session->setFlash('error_validate_password','Parolni takrorlashda xatolik!');
        }

        $model->password='';
        $model->repeat_password='';
        return $this->render('login', [
            'model' => new LoginForm(),
            'newUser'=>$model,
        ]);
    }
    public function actionMyAccount()
    {
        return $this->render('my-account',[
            'model'=>User::findOne(Yii::$app->user->id),
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $m=User::findOne(Yii::$app->user->identity->id);
        $m->active=0;
        $m->save();
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
    public function actionSearch($search_text=null)
    {
//        debug($search_text);
//        exit();
        if(!$search_text || ctype_space($search_text)){
            return $this->render('search-not-found',[
                'message'=>'Tezkor ma\'lumot qidirish tizimi! Iltimos kalit so\'zni kiriting!'
            ]);
        }
        $have=false;
        $BookDP=null;
        $LibraryDP=null;
        $SubjectDP=null;
        $GenreDP=null;
        $AuthorDP=null;
        $NewDP=null;
        if(Book::find()->filterWhere(['like','name',$search_text])->andWhere(['status' => 1])->count()){
            $have=true;
            $query = Book::find()->filterWhere(['like','name',$search_text])->andWhere(['status' => 1]);

            $defaultOrder = ['created'=>SORT_DESC];
            $BookDP = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'defaultPageSize' => 20,
                ],
                'sort' => [
                    'defaultOrder' => $defaultOrder,
                ],
            ]);
        }
        if(Library::find()->filterWhere(['like','name',$search_text])->andWhere(['status' => 1])->count()){
            $have=true;
            $query = Library::find()->filterWhere(['like','name',$search_text])->andWhere(['status' => 1]);

            $defaultOrder = ['created'=>SORT_DESC];
            $LibraryDP = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'defaultPageSize' => 10,
                ],
                'sort' => [
                    'defaultOrder' => $defaultOrder,
                ],
            ]);

        }

        if(Subject::find()->filterWhere(['like','name',$search_text])->andWhere(['>','count',0])->count()){
            $have=true;
            $query = Subject::find()->filterWhere(['like','name',$search_text])->andWhere(['>','count',0]);

            $defaultOrder = ['id'=>SORT_DESC];
            $SubjectDP = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'defaultPageSize' => 5,
                ],
                'sort' => [
                    'defaultOrder' => $defaultOrder,
                ],
            ]);

        }

        if(Genre::find()->filterWhere(['like','name',$search_text])->andWhere(['>','count',0])->count()){
            $have=true;
            $query = Genre::find()->filterWhere(['like','name',$search_text])->andWhere(['>','count',0]);

            $defaultOrder = ['id'=>SORT_DESC];
            $GenreDP = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'defaultPageSize' => 5,
                ],
                'sort' => [
                    'defaultOrder' => $defaultOrder,
                ],
            ]);

        }

        if(Author::find()->filterWhere(['like','name',$search_text])->count()){
            $have=true;
            $query = Author::find()->filterWhere(['like','name',$search_text]);

            $defaultOrder = ['id'=>SORT_DESC];
            $AuthorDP = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'defaultPageSize' => 5,
                ],
                'sort' => [
                    'defaultOrder' => $defaultOrder,
                ],
            ]);

        }

        if(News::find()->filterWhere(['like','name',$search_text])->andWhere(['status' => 1])->count()){
            $have=true;
            $query = News::find()->filterWhere(['like','name',$search_text])->andWhere(['status' => 1]);

            $defaultOrder = ['created'=>SORT_DESC];
            $NewDP = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'defaultPageSize' => 10,
                ],
                'sort' => [
                    'defaultOrder' => $defaultOrder,
                ],
            ]);

        }

        if(!$have){
            return $this->render('search-not-found',[
                'message'=>'Siz kiritgan kalit so\'z <b>"'.$search_text.'"</b> bo\'yicha ma\'lumotlar topilmadi.<br> Qaytadan urinib ko\'ring.'
            ]);
        }
        return $this->render('search',[
            'BookDP'=>$BookDP,
            'LibraryDP'=>$LibraryDP,
            'SubjectDP'=>$SubjectDP,
            'GenreDP'=>$GenreDP,
            'AuthorDP'=>$AuthorDP,
            'NewDP'=>$NewDP,
        ]);
    }

    public function actionAddToCard($code){
        $book=Book::find()->where(['code'=>$code])->one();
        $book->count = 1;

        if($book->arenda && !$book->price){
            if(Yii::$app->user->isGuest)
                return $this->redirect(['/site/login']);
        }

        $session=Yii::$app->session;
//        $session->destroy();
        if(!$session->get('books')){
            $books = Book::find()->where(['user_id' => -1])->all();
            $session->set('books',$books);
        }
        $books=$session->get('books');
//        return debug($books);
        if(!sizeof($books)){
            array_push($books,$book);
        }
        else{
            $have_not=true;
            foreach ($books as $item) {
                if($item->code==$code){
                    $item->count++;
                    $have_not=false;
                    break;
                }
            }
            if($have_not)
                array_push($books,$book);
        }
//        return debug($books);


        $session->set('books',$books);
//                $session->set('books',Book::find()->where(['user_id'=>-1])->all());

        $this->layout='empty.php';

        $total_price=0;
        $total_count=0;
        foreach ($books as $item) {
            $total_price+=$item->price*$item->count;
            $total_count+=$item->count;
        }

        return $this->render('_card_form');
    }
    public function actionDeleteFromCard($code){
        $session=Yii::$app->session;
        $books=$session->get('books');
        foreach ($books as $k=>$item) {
            if($item->code==$code){
//                    $session->remove('books['.$k.']');
                unset($books[$k]);
                break;
            }
        }
        $session->set('books',$books);
        $this->layout='empty.php';
        return $this->render('_card_form');
    }
}
