<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PublisherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nashriyotlar';
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
                        <?= Html::a('Nashriyotchi qo\'shish', ['create'], ['class' => 'btn btn-sm btn-primary']) ?>
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
//                            'name',
                            [
                                'attribute'=>'name',
                                'value'=>function($x){return '<div class="media align-items-center">
                                <a href="'.Yii::$app->urlManager->createUrl(['/admin/publisher/view','id'=>$x->id]).'" class="avatar rounded-circle mr-3">
                                    <img alt="'.$x->name.'" src="'.Yii::$app->homeUrl.'publisher/'.$x->image.'">
                                </a>
                                <div class="media-body">
                                <h3 class="pt-2"><a href="'.Yii::$app->urlManager->createUrl(['/admin/publisher/view','id'=>$x->id]).'">
                                    '.$x->name.'
                                </a></h3>
                                    
                                </div>
                            </div>';},
                                'format'=>'raw'
                            ],
                            [
                                'attribute'=>'country_id',
                                'value'=>function($x){return $x->country->name;},
                                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Country::find()->all(),'id','name'),
                                'format'=>'raw'
                            ],
//                            'region_id',
//                            'district_id',
                            //'lat',
                            //'lng',
                            //'detail:ntext',
                            //'created',
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

