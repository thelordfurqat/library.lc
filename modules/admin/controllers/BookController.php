<?php

namespace app\modules\admin\controllers;

use app\models\Author;
use app\models\Certificate;
use app\models\Files;
use app\models\Genre;
use app\models\Subject;
use Faker\Provider\File;
use Yii;
use app\models\Book;
use app\models\search\BookSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => !Yii::$app->user->isGuest && (Yii::$app->user->identity->role->role=='Admin' || Yii::$app->user->identity->role->role=='Muharrir'),
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
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setPagination(['pageSize' => 20]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($user_id = null, $certificator_id = null, $publisher_id = null, $subject_id = null, $author_id = null, $genre_id = null)
    {
        $model = new Book();

//        load book default values and prepare to create
        $model->user_id = $user_id;
        if (!$model->user_id && Yii::$app->user->id) {
            $model->user_id = Yii::$app->user->id;
        }
        $a = [];
        if (strlen($model->authors)) {
            $a = json_decode($model->authors, true);
        }

        array_push($a, $author_id);
        $model->authors = json_encode($a);
        $model->authors_int = $a;

        $b = [];
        if (strlen($model->genres)) {
            $a = json_decode($model->genres, true);
        }

        array_push($b, $genre_id);
        $model->genres = json_encode($b);
        $model->genres_int = $b;

        $model->subject_id = $subject_id;
        $model->publisher_id = $publisher_id;
        $model->certificator_id = $certificator_id;
        $model->price = 0;
//        edn preparing

//        request post
        if ($r = Yii::$app->request->post() && $model->load(Yii::$app->request->post())) {
//            debug($model);
//            exit();
//           save image
            $model->upload();

//            save authors
            $authors_ids = [];
            if ($model->authors_int) {
                foreach ($model->authors_int as $item) {
                    $userHave = false;
                    if (intval($item) == $item) {
                        if (Author::findOne($item)) {
                            array_push($authors_ids, $item);
                            $userHave = true;
                        }
                    }
                    if (!$userHave) {
                        $author = new Author();
                        $author->name = $item;
                        $author->upload();
                        $author->code = GenerateRandomUnicalString(Author::find());
                        $author->save();
                        array_push($authors_ids, "{$author->id}");
                    }
                }
            }

            $model->authors = json_encode($authors_ids);

//            save genres
            $genres_ids = [];
            if ($model->genres_int) {
                foreach ($model->genres_int as $item) {
                    $genreHave = false;
                    if (intval($item) == $item) {
                        if ($dddd = Genre::findOne($item)) {
                            $dddd->count += 1;
                            $dddd->save();
                            array_push($genres_ids, $item);
                            $genreHave = true;
                        }
                    }
                    if (!$genreHave) {
                        $genre = new Genre();
                        $genre->name = $item;
                        $genre->count = 1;
                        $genre->save();
                        array_push($genres_ids, "{$genre->id}");
                    }
                }
            }
            $model->genres = json_encode($genres_ids);
            $model->code = GenerateRandomUnicalString(Book::find());
            if (Yii::$app->user->isGuest)
                $model->user_id = 0;
            $model->alias = GenerateRandomUnicalAlias(Book::find());
            if (!$model->subject_id)
                $model->subject_id = 2;
            $subject = Subject::findOne($model->subject_id);
            $subject->count++;

//            debug($model);
//            exit();

//          upload and save files
//            $m = new Files();
//            $m->load(Yii::$app->request->post());
//            $i = UploadedFile::getInstances($m,'files');
//            foreach ($i as $item){
//                $n = new Files();
//                $name = date('Y-m-d-h-i-s').'.'.$item->extension;
//                $item->saveAs(Yii::$app->basePath.'/web/file-upload/'.$name);
//                $n->code = $name;
//                $n->preview=$m->preview;
//                $n->detail=$m->detail;
////                need to add book _id to save
//                $n->book_id=$model->id;
//                $n->save();
//            }
            if ($subject->save() && $model->save())
                return $this->redirect(['create-files', 'id' => $model->id]);

        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreateFiles($id)
    {
        $model = new Files();
        $book = Book::findOne($id);
        $model->detail = $book->detail;
        if ($request = Yii::$app->request->post() && $model->load(Yii::$app->request->post())) {
            $i = UploadedFile::getInstances($model, 'files');
            $allSaved = true;
            foreach ($i as $item) {
                $n = new Files();
                $name = $item->baseName . date('Y-m-d-h-i-s') . '.' . $item->extension;
                $item->saveAs(Yii::$app->basePath . '/web/file-upload/' . $name);
                $n->code = $name;
//                $n->preview=$model->preview;
//                $n->detail=$model->detail;
//                need to add book _id to save
                $n->book_id = $id;
                if (!$n->save())
                    $allSaved = false;
            }
            if (!$book->detail)
                $book->detail = $model->detail;
            if ($n)
                return $this->redirect(['view', 'id' => $id]);
        }
        return $this->render('create-files', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->genres_int = json_decode($model->genres);
        $model->authors_int = json_decode($model->authors);
        $oldImage=$model->image;
        $oldPrice=$model->price;
        if ($model->load(Yii::$app->request->post())) {
            $model->upload($oldImage);
            $authors_ids = [];
            if ($model->authors_int) {
                foreach ($model->authors_int as $item) {
                    $userHave = false;
                    if (intval($item) == $item) {
                        if (Author::findOne($item)) {
                            array_push($authors_ids, $item);
                            $userHave = true;
                        }
                    }
                    if (!$userHave) {
                        $author = new Author();
                        $author->name = $item;
                        $author->upload();
                        $author->code = GenerateRandomUnicalString(Author::find());
                        $author->save();
                        array_push($authors_ids, "{$author->id}");
                    }
                }
            }

            $model->authors = json_encode($authors_ids);

//            save genres
            $genres_ids = [];
            if ($model->genres_int) {
                foreach ($model->genres_int as $item) {
                    $genreHave = false;
                    if (intval($item) == $item) {
                        if ($dddd = Genre::findOne($item)) {
                            $dddd->count += 1;
                            $dddd->save();
                            array_push($genres_ids, $item);
                            $genreHave = true;
                        }
                    }
                    if (!$genreHave) {
                        $genre = new Genre();
                        $genre->name = $item;
                        $genre->count = 1;
                        $genre->save();
                        array_push($genres_ids, "{$genre->id}");
                    }
                }
            }
            $model->genres = json_encode($genres_ids);

            if (!$model->subject_id)
                $model->subject_id = 2;
            if($oldPrice!=$model->price)
                $model->old_price=$oldPrice;
//            debug($model);
//            exit();
            if($model->save())
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = -1;
        $model->save();
        $subject = Subject::findOne($model->subject_id);
        $subject->count--;
        $subject->save();
//        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionExDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = -1;
        $subject = Subject::findOne($model->subject_id);
        $subject->count--;
        $subject->save();
        $model->delete();
//        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
