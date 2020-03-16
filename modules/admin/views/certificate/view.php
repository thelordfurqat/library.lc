<?php

use app\models\Book;
use app\models\search\BookSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Certificate */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sertifikatlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
            <img src="/certificates/<?=$model->image?>" alt="Image placeholder" class="card-img-top">

            <div class="card-body pt-0">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center">
                            <div>
                                <span class="heading"><?=count($model->books)?></span>
                                <span class="description">Kitoblar</span>
                            </div>
                            <div>
                                <span class="heading">10 000</span>
                                <span class="description">Sotuvlar</span>
                            </div>
                            <div>
                                <span class="heading"><?=count($model->books)?></span>
                                <span class="description">Avtorlar</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h5 class="h3">
                        <?=$model->name?>
                    </h5>
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
        <!--        --><?//=$this->red('update')?>
        <?php
        $searchModel = new BookSearch();
        $query=Yii::$app->request->queryParams;
        if(!$query['BookSearch']['certificator_id'])
            $query['BookSearch']['certificator_id']=$model->id;
        $dataProvider = $searchModel->search($query);

        //        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        echo $this->render(Yii::$app->urlManager->createUrl(['/book/index']), [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'certificator_id'=>$model->id,
        ]);
        ?>

    </div>
</div>
