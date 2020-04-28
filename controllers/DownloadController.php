<?php

namespace app\controllers;

use app\models\Book;
use app\models\Files;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use ZipArchive;

class DownloadController extends Controller
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
                        'allow' => !Yii::$app->user->isGuest,
                        'roles' => ['@'],
                    ],
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
                'class' => 'yii\web\ErrorAction' ,
            ]
        ];
    }
    function actionDownload($code){
        $book=Book::find()->where(['code'=>$code])->one();
        $files=$book->files;
        $user=User::findOne(Yii::$app->user->id);
        if( $user->balans<$book->price)
            return $this->redirect(['/site/pay']);
        if (sizeof($files) && $user->balans>=$book->price) {
            $user->balans-=$book->price;
            $user->save();
            $this->createZip($files);
            $book->sales++;
            $book->save();
            return Yii::$app->response->sendFile('zip/zip.zip',$book->name.'.zip');
        }
        else
            throw new NotFoundHttpException('Ma\'lumotlar topilmadi');

    }
    private function createZip($files)
    {
        $file = 'zip/zip.zip';

        $zip = new ZipArchive();
        if ($zip->open($file, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE ) {
            throw new NotFoundHttpException('Ma\'lumotlar topilmadi');
        }

        foreach($files as $file){
            $zip->addFile('file-upload/'.$file->code);
        }
//        debug($zip);
        $zip->close();

    }


}
