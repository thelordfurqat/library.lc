<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LibrarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kutubxonalar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><?= Html::encode($this->title) ?></h3>
                    </div>
                    <div class="col-4 text-right">
                        <?= Html::a('Kutubxona qo\'shish', ['create'], ['class' => 'btn btn-sm btn-primary']) ?>
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
//                            'id',
//                            'code',
//                            'name',
//                            'bank_id',
//                            'bank_account_number',
                            //'oked',
                            //'inn',
                            //'country_id',
                            //'region_id',
                            //'district_id',
                            //'phone',
                            //'fax',
                            //'telegram_channel',
                            //'chat_id',
                            //'director',
                            //'buxgalter',
                            //'email:email',
                            //'created',
                            //'updated',
                            //'status',
                            //'setting:ntext',
                            //'image',
                            //'telegram_username',
                            //'instagram',
//            'id',
//                        'name',
                            [
                                'attribute'=>'name',
                                'value'=>function($x){return '<div class="media align-items-center">
                                <a href="'.Yii::$app->urlManager->createUrl(['/admin/library/view','id'=>$x->id]).'" class="avatar mr-3">
                                    <img alt="'.$x->name.'" src="'.Yii::$app->homeUrl.'library-images/'.$x->image.'">
                                </a>
                                <div class="media-body">
                                <h3 class="pt-2"><a href="'.Yii::$app->urlManager->createUrl(['/admin/library/view','id'=>$x->id]).'">
                                    '.$x->name.'
                                </a></h3>
                                    
                                </div>
                            </div>';},
                                'format'=>'raw'
                            ],
//                        'image',
//                        'username',
                            //'password',
                            //'email:email',
                            'phone',
//                            'address',
                            'balans',

                            //'country_id',
                            //'region_id',
                            //'district_id',
                            //'address',
                            //'created',
                            //'updated',
                            //'status',
//                        'active',
                            [
                                'label'=>'Kitoblar',
                                'value'=>'booksCount'
                            ],
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
