<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0"><?= Html::encode($this->title) ?></h3>
                <p>
                    <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table align-items-center table-flush'],

                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//            'id',
//                        'name',
                        [
                            'attribute'=>'name',
                            'value'=>function($x){ return '<div class="media align-items-center">
                                <a href="#" class="avatar rounded-circle mr-3">
                                    <img alt="'.$x->name.'" src="'.Yii::$app->homeUrl.'admin/image/'.$x->image.'">
                                </a>
                                <div class="media-body">
                                    <span class="name mb-0 text-sm">'.$x->name.'</span>
                                </div>
                            </div>';},
                            'format'=>'raw',
                            'headerOptions' => ['class'=>'thead-light',],
                        ],
                        'role_id',
//                        'image',
//                        'username',
                        //'password',
                        //'email:email',
                        'phone',
                        //'country_id',
                        //'region_id',
                        //'district_id',
                        //'address',
                        //'created',
                        //'updated',
                        //'status',
                        'active',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
                <nav aria-label="...">
                    <ul class="pagination justify-content-end mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="fas fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-angle-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
