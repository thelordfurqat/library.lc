<?php

namespace app\modules\admin\controllers;

use DateTime;
use Yii;
use app\models\Adds;
use app\models\search\AddsSearch;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AddsController implements the CRUD actions for Adds model.
 */
class AddsController extends Controller
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
     * Lists all Adds models.
     * @return mixed
     */
    public function actionIndex()
    {
        updatestatus();
        $searchModel = new AddsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setPagination(['pageSize'=>20]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Adds model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        updatestatus();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Adds model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \Exception
     */
    public function actionCreate()
    {
        $model = new Adds();
        $model->oder=1;
        $model->trend_on_date=date('Y-m-d');
        $model->trend_on_time=date('H:i');
        $model->trend_on_length=0;
        if ($model->load(Yii::$app->request->post())){
            $dt=$model->trend_on_date.' '.$model->trend_on_time;
            $dat=new DateTime($dt);
            $dat = date_modify($dat, "+".$model->trend_on_length." hour");
            $model->trend_on=$dt;
            $model->trend_down=$dat->format('Y-m-d H:i:s');
            $url='#';
            if($model->book_code){
                $url=Url::base(true).Yii::$app->urlManager->createUrl(['/site/bookview','code'=>$model->book_code]);
            }
            else{
                $url=$model->url;
            }
            $model->url=$url;
            $model->upload();
            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Adds model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dt=new DateTime($model->trend_on);
        $model->trend_on_date=$dt->format('Y-m-d');
        $model->trend_on_time=$dt->format('H:i');
        $date1 = new DateTime($model->trend_on);
        $date2 = new DateTime($model->trend_down);
        $diff = $date2->diff($date1);

        $hours = $diff->h;
        $hours = $hours + ($diff->days*24);
        $model->trend_on_length= $hours;
        if (strpos($model->url, Url::base(true).Yii::$app->urlManager->createUrl(['/site/bookview','code'=>''])) !== false) {
            $model->book_code=substr($model->url, -12);
        }
        $old=$model->image;
        $model->status=2;
        if ($model->load(Yii::$app->request->post())){
            $dt=$model->trend_on_date.' '.$model->trend_on_time;
            $dat=new DateTime($dt);
            $dat = date_modify($dat, "+".$model->trend_on_length." hour");
            $model->trend_on=$dt;
            $model->trend_down=$dat->format('Y-m-d H:i:s');
            $url='#';
            if($model->book_code){
                $url=Url::base(true).Yii::$app->urlManager->createUrl(['/site/bookview','code'=>$model->book_code]);
            }
            else{
                $url=$model->url;
            }
            $model->url=$url;
            $model->upload($old);
            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Adds model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Adds model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Adds the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Adds::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
