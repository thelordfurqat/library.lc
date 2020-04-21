<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Library;
use app\models\search\LibrarySearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibraryController implements the CRUD actions for Library model.
 */
class LibraryController extends Controller
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
                        'allow' => !Yii::$app->user->isGuest && Yii::$app->user->identity->role->role=='Admin',
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
     * Lists all Library models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LibrarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Library model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
//        debug($this->findModel($id)->booksCount);
//        exit();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Library model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Library();

        if ($model->load(Yii::$app->request->post())) {
            $model->upload();
            $model->region_id=$model->region_id?$model->region_id:0;
            $model->country_id=$model->country_id?$model->country_id:0;
            $model->district_id=$model->district_id?$model->district_id:0;
            $model->balans=$model->balans?$model->balans:0;
            $model->bank_id=$model->bank_id?$model->bank_id:0;
            $model->code=GenerateRandomUnicalString(Library::find());
//            debug($model);
//            exit();
            if($model->save())
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Library model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old=$model->image;
        if ($model->load(Yii::$app->request->post())) {
            $model->upload($old);
            $model->region_id=$model->region_id?$model->region_id:0;
            $model->country_id=$model->country_id?$model->country_id:0;
            $model->district_id=$model->district_id?$model->district_id:0;
            $model->balans=$model->balans?$model->balans:0;
            $model->bank_id=$model->bank_id?$model->bank_id:0;
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
     * Deletes an existing Library model.
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
        return $this->redirect(['index']);
    }

    public function actionExDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Library model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Library the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Library::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
