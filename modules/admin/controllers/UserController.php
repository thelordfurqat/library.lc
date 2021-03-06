<?php

namespace app\modules\admin\controllers;

use Symfony\Component\Finder\Exception\AccessDeniedException;
use Yii;
use app\models\User;
use app\models\search\UserSearch;
use yii\filters\AccessControl;
use yii\helpers\Console;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
//                    [
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
                    [
                        'allow'=>(!Yii::$app->user->isGuest && Yii::$app->user->identity->role->role=='Muharrir') || (!Yii::$app->user->isGuest && Yii::$app->user->identity->role->role=='Admin'),
                        'actions'=>['view','update','delete','getregion','getdistrict',],
                        'roles' => ['@'],
                    ],
                    [
                        'allow'=>!Yii::$app->user->isGuest && Yii::$app->user->identity->role->role=='Admin',
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setPagination(['pageSize'=>20]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->identity->role->role=='Muharrir' && Yii::$app->user->identity->id!=$id) {
            throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
        $model = $this->findModel($id);
        $oldPass=$model->password;
        $oldImage=$model->image;
        if ($model->load(Yii::$app->request->post())) {
            if($model->password)
                $model->encrypt();
            else $model->password=$oldPass;
            $model->upload($oldImage);
            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->password='';
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->password)
                $model->encrypt();
            $model->upload();
            if($model->password && $model->save())
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->identity->role->role=='Muharrir' && Yii::$app->user->identity->id!=$id) {
            throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
        $model = $this->findModel($id);
        $oldPass=$model->password;
        $oldImage=$model->image;
        if ($model->load(Yii::$app->request->post())) {
            if($model->password)
                $model->encrypt();
            else $model->password=$oldPass;
            $model->upload($oldImage);
            if($model->save())
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->password='';
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->identity->role->role=='Muharrir' && Yii::$app->user->identity->id!=$id) {
            throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetregion($id){
            $rows = \app\models\Region::find()->where(['country_id' => $id])->all();

            echo "<option value='0'>-Viloyatni tanlang-</option>";

            if(count($rows)>0){
                foreach($rows as $row){
                    echo "<option value='".$row->id."'>".$row->name."</option>";
                }
            }
            else{
                echo "<option value='0'>-Viloyat topilmadi-</option>";
            }


    }
    public function actionGetdistrict($id){
        $rows = \app\models\District::find()->where(['region_id' => $id])->all();

        echo "<option value='0'>-Tumanni tanlang-</option>";

        if(count($rows)>0){
            foreach($rows as $row){
                echo "<option value='".$row->id."'>".$row->name."</option>";
            }
        }
        else{
            echo "<option value='0'>-Tumanlar topilmadi-</option>";
        }

    }

    public function actionStatus($id){

        $model = $this->findModel($id);
        $model->status = $model->status == 0 ? 1 : 0;
        if($model->save()){
            return $model->status;
        }else{
            return 2;
        }
    }
}
