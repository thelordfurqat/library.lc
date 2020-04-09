<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $certificator_id */
/* @var $user_id */
/* @var $publisher_id */
/* @var $genre_id */
/* @var $subject_id */
/* @var $author_id */
/* @var $searchModel app\models\search\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if(Yii::$app->controller->id=='book') {
    $this->title = 'Kitoblar';
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="row">
    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><?= Html::encode('Kitoblar') ?></h3>
                    </div>
                    <div class="col-4 text-right">
                        <?= Html::a('Kitob qo\'shish', ['/admin/book/create',
                            'certificator_id'=>$certificator_id,
                            'user_id'=>$user_id,
                            'publisher_id'=>$publisher_id,
                            'genre_id'=>$genre_id,
                            'subject_id'=>$subject_id,
                            'author_id'=>$author_id,
                        ], ['class' => 'btn btn-sm btn-primary']) ?>
                    </div>


                </div>
            </div>
            <div class="card-body">



                <!-- Light table -->
                <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'layout'=>'
                    {summary} {items}',
                        'tableOptions' => ['class' => 'table align-items-center table-flush'],


                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'alias',
                            [
                                'attribute'=>'name',
                                'value'=>function($x){return '<div class="media align-items-center">
                                <a href="'.Yii::$app->urlManager->createUrl(['/admin/book/view','id'=>$x->id]).'" class="avatar mr-3">
                                    <img alt="'.$x->name.'" src="'.Yii::$app->homeUrl.'book-images/'.$x->image.'">
                                </a>
                                <div class="media-body">
                                <h3 class="pt-2"><a href="'.Yii::$app->urlManager->createUrl(['/admin/book/view','id'=>$x->id]).'">
                                    '.$x->name.'
                                </a></h3>
                                    
                                </div>
                            </div>';},
                                'format'=>'raw'
                            ],
//            'certificate',
//            'certificator_id',

                            //'made_in',
                            //'publisher_id',
//                            'authors',
                            [
                                'attribute'=>'authors',
                                'value'=>function($x){
                                return getAuthors($x->authors);
                                },
                                'filter'=>false,
                            ],
                            //'sales',
                            //'code',
                            //'show_counter',
//                            'year',
                            [
                                'attribute'=>'price',
                                'value'=>'price',
                                'filter'=>false,
                            ],
//                            'price',
                            //'old_price',
                            //'arenda',
                            //'shtrix_code',
                            //'isbn_code',
                            //'made_date',
                            //'like_counter',
                            //'detail:ntext',
                            //'page_size',
                            //'size',
                            //'muqova',
                            //'status',
                            //'is_delete',
                            //'created',
                            //'updated',
                            //'genre',
                            //'subject',
                            //'user_id',
                            //'image',

                            [

                                'class' => 'yii\grid\ActionColumn',

                                'template' => '{view} {update} {delete} ',

                                'buttons' => [

                                    'view' => function ($url,$model) {
                                        return Html::a(
                                                '<span class="fa fa-eye"></span>',
                                                $url).'<br>';
                                    },
                                    'update' => function ($url,$model) {
                                        return Html::a(
                                                '<span class="fa fa-edit"></span>',
                                                $url).'<br>';
                                    },
                                    'delete' => function ($url,$model) {
                                        return Html::a(
                                            '<span class="fa fa-trash"></span>',
                                            $url,['data-confirm' => Yii::t('yii', 'Are you sure you want to delete?'),
                                            'data-method' => 'post',]);
                                    },

                                ],

                            ],
                        ],
                    ]); ?>

                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    <nav aria-label="...">


                        <?= \yii\widgets\LinkPager::widget(['pagination'=>$dataProvider->pagination,

                            'options'=>[
                                'class'=>'pagination justify-content-end mb-0',
                            ],

                            'linkContainerOptions'=>['class'=>'page-item'],
                            'linkOptions'=>['class'=>'page-link'],

                        ]);?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
