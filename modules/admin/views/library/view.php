<?php

use app\models\Book;
use app\models\search\BookSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Library */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kutubxonalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">

    <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
            <div class="align-items-center">
                <img src="/library-images/<?=$model->image?>" alt="Image placeholder" class="card-img-top" style="max-height: 200px; width: auto!important;margin-left: auto;margin-right: auto;display: block;">
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center">
                            <div>
                                <span class="heading"><?=$model->booksCount?></span>
                                <span class="description">Kitoblar</span>
                            </div>
                            <div>
                                <span class="heading"><?=$model->balans?></span>
                                <span class="description">Balans</span>
                            </div>
                            <div>
                                <span class="heading">89</span>
                                <span class="description">Sotildi</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h5 class="h3">
                        <?=$model->name?>
                    </h5>
                    <div class="h5 mt-4 text-left">
                        Direktor: <?=$model->director?><br>
                        Buxgalter: <?=$model->buxgalter?><br>
                    </div>
                    <div class="h5 mt-4 text-left">
                        Manzil: <?=$model->district->name?>, <?=$model->region->name?>, <?=$model->address?>
                    </div>
                    <div class="h5 mt-4 text-left">
                        Email: <?=$model->eMail?><br>
                        Telefon: <?=$model->phone?><br>
                        Fax: <?=$model->fax?><br>
                        Telegram Username: <?=$model->telegramUsername?><br>
                        Telegram Kanal: <?=$model->telegramChannel?><br>
                        Instagram: <?=$model->instagramm?><br>
                    </div>
                    <div class="h5 mt-4 text-left">
                        Xisob ma'lumotlari <br>
                        Bank: <?=$model->bank->bank_name?><br>
                        Xisob raqam: <?=$model->bank_account_number?><br>
                        Oked: <?=$model->oked?><br>
                        INN(STIR): <?=$model->inn?><br>

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
        <!--        --><?//=$this->red('update')?>

        <!--        --><?//=$this->red('update')?>
        <?php
        $searchModel = new BookSearch();
        $query=Book::findBySql($model->booksQuery);
        //    if(!$query['BookSearch']['user_id'])
        //        $query['BookSearch']['user_id']=$model->id;
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query'=>$query,
        ]);;
        $dataProvider->setPagination(['pageSize'=>20]);

        //        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        echo $this->render(Yii::$app->urlManager->createUrl(['/book/index']), [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'user_id'=>$model->id,
        ]);
        ?>


    </div>
</div>
