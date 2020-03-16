<?php

use app\models\search\BookSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Author */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Avtorlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>


<div class="row">
    <div class="col-xl-4 order-xl-2">
<?//=debug($model->books)?>
        <div class="card card-profile">
            <img src="/theme/assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                            <img src="/authorspic/<?=$model->image?>" class="rounded-circle">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">

                </div>
            </div>
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
                                <?php
                                $like=0;
                                foreach ($model->books as $book) {
                                    $like+=$book->like_counter;
                                }
                                ?>
                                <span class="heading"><?=$like?></span>
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
        <!--        --><?//=$this->red('update')?>
        <?php
        $searchModel = new BookSearch();
        $query=Yii::$app->request->queryParams;
        if(!$query['BookSearch']['authors'])
            $query['BookSearch']['authors']='"'.$model->id.'"';
        $dataProvider = $searchModel->search($query);

        //        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        echo $this->render(Yii::$app->urlManager->createUrl(['/book/index']), [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'author_id'=>$model->id,
        ]);
        ?>

    </div>
</div>
