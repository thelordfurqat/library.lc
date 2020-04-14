<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="row">
    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-body">



                <!-- Light table -->
                <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'code',
//                            'preview:ntext',
//                            'detail:html',
//            'book_id',
                            'created',
                            //'updated',
                            //'is_delete',
                            //'status',

                            [

                                'class' => 'yii\grid\ActionColumn',

                                'template' => '{download} {update} {delete} ',

                                'buttons' => [
                                    'delete' => function ($url,$model) {
                                        return Html::a(
                                            '<span class="fa fa-trash"></span>',
                                            \yii\helpers\Url::to(['/admin/files/delete','id'=>$model->id]),['data-confirm' => Yii::t('yii', 'Haqiqatdan ham o\'chirmoqchimisiz?'),
                                            'data-method' => 'post',]);
                                    },
                                    'download' => function ($url,$model) {
                                        return Html::a(
                                                '<span class="fa fa-download"></span>',
                                                \yii\helpers\Url::to(['/file-upload/'.$model->code]),['style'=>'margin-right:15px']);
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