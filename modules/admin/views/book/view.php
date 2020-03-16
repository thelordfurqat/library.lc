<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kitoblar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
                                <span class="heading">10 000</span>
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
                        <i class="ni location_pin mr-2"></i><?=$model->detail?>
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
                    <div class="col-8">
                        <h3 class="mb-0"><?= Html::encode($this->title) ?></h3>
                    </div>
                    <div class="col-4 text-right">
                        <?= Html::a('Nomini o\'zgartirish', ['create'], ['class' => 'btn btn-sm btn-primary']) ?>
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
                            'detail:ntext',
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




