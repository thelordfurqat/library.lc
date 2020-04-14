<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kitoblar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$this->registerCss('
.tox tox-tinymce{
        height:80vh!important;
    }');
Modal::begin([

    'id'=>'addsubject',
    'size'=>'modal-lg',
    'options'=>['class'=>'modal fade'],
//    'diologOptions'=>['class'=>'modal-dialog modal-dialog-centered'],
    'bodyOptions' => ['class' => 'modal-body','style'=>'height:95vh'],
    'headerOptions' => ['class' => 'modal-header','style'=>'display:none'],
    'closeButton' => [
        'id'=>'close-button',
        'class'=>'close',
        'data-dismiss' =>'modal',
    ],

]);
$form = ActiveForm::begin();
echo $form->field($model, 'detail')->widget(\dosamigos\tinymce\TinyMce::className(), [
    'options' => ['rows' => 20],
    'language' => 'ru',

    'clientOptions' => [
        'plugins' => [
            'image',
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste",
            //'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker ',
            'advcode',
        ],
        'relative_urls' => false,
        'image_advtab' => true,
        'images_upload_url' => Yii::$app->urlManager->createUrl(['admin/photo/upload']),
        'file_picker_types' => 'file image media',
        'file_browser_callback_types' => 'file image media',
        'content_css' => [
            '//fonts.googleapis.com/css?family=Roboto',
            '//www.tinymce.com/css/codepen.min.css'],

        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link  image | print preview media | file | forecolor backcolor emoticons | code",
        'external_filemanager_path' => '/backend/filemanager/filemanager/',
        'filemanager_title' => 'File manager',
        "external_plugins" => [
            'filemanager' => '/backend/filemanager/filemanager/plugin.min.js'
        ],

    ]
]);
echo Html::submitButton(Yii::$app->controller->action->id == 'create' ? 'Fayllarni kiritish' : 'Saqlash', ['class' => 'btn btn-primary']) ;

ActiveForm::end();
Modal::end();

?>
<div class="row">
    <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
            <img src="/book-images/<?=$model->image?>"  alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">

                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                    <a href="#" class="btn btn-sm btn-warning  mr-4 "><?=$model->subject->name?></a>
                    <a href="#" class="btn btn-sm btn-default float-right">Narxi: <?=$model->price?> sum</a>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center">
                            <div>
                                <span class="heading"><?=$model->show_counter?></span>
                                <span class="description">Ko'rishlar</span>
                            </div>
                            <div>
                                <span class="heading"><?=$model->sales?></span>
                                <span class="description">Sotuvlar</span>
                            </div>
                            <div>
                                <span class="heading"><?=$model->like_counter?></span>
                                <span class="description">Like</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h5 class="h3">
                        <?=$model->name?>
                    </h5>
                    <div class="h5 font-weight-300">
                        <i class="ni location_pin mr-2"></i><?=getAuthors($model->authors)?>
                    </div>
                    <div class="h5 font-weight-300">
                        <i class="ni location_pin mr-2"></i><p>
                            <?= Html::a('Taxrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>

                            <? if(Yii::$app->user->identity->role->role=='Admin') echo Html::a('To\'liq o\'chirish', ['ex-delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger mt-10',
                                'style'=>'margin-top: 1rem;',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h3 class="mb-0"><?= Html::encode($this->title) ?></h3>

                    </div>
                    <div class="col-3 text-right">
                        <?= Html::a('Taxrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    </div>



                </div>
            </div>
            <div class="card-body">
                <div class="book-view">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
//            'id',
//            'alias',
//                            'name',
                            'price',
                            'old_price',
//                            'authors',
                            [
                                'attribute'=>'authors',
                                'value'=>function($x){return getAuthors($x->authors);}
                            ],
                            [
                                'attribute'=>'genres',
                                'value'=>function($x){return getGenres($x->genres);}
                            ],
//                            'genres',
//                            'subject_id',
                            [
                                'attribute'=>'subject_id',
                                'value'=>function($x){return $x->subject->name;}
                            ],
                            'made_in',
//                            'publisher_id',
                            [
                                'attribute'=>'publisher_id',
                                'value'=>function($x){return $x->publisher->name;}
                            ],
//                            'sales',
//                            'code',
//                            'show_counter',
//                            'arenda',
                            [
                                'attribute'=>'arenda',
                                'value'=>function($x){
                                    if($x->arenda)
                                        return 'Ha';
                                    return 'Yo\'q';
                                }
                            ],
                            'shtrix_code',
                            'isbn_code',
                            'made_date',
//                            'like_counter',
                            [
                                'attribute'=>'detail',
                                'value'=>function ($x){return '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addsubject">
                            Ochish
                        </button>';},
                        'format'=>'raw'
                            ],
                            'page_size',
                            'size',
                            'muqova',
                            'status',
//                            'is_delete',
                            'created',
                            'updated',
                            'certificate',
//                            'user_id',
//                            'image',
                        ],
                    ]) ?>

                </div>


            </div>
        </div>

    </div>
</div>


<div class="row">
    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-10">
                        <h3 class="mb-0">Fayllar</h3>
                    </div>
                    <div class="col-2 text-right pull-right">
                        <?= Html::a('Fayl qo\'shish', ['create-files', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <?php
                $searchModel = new \app\models\search\FilesSearch();
                $query=Yii::$app->request->queryParams;
                if(!$query['FilesSearch']['book_id'])
                    $query['FilesSearch']['book_id']=$model->id;
                $dataProvider = $searchModel->search($query);

                //        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                echo $this->render(Yii::$app->urlManager->createUrl(['/files/index']), [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
                ?>
            </div>
        </div>
    </div>
</div>


