<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Foydalanuvchilar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
            <img src="/theme/assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                            <img src="/profile/<?=$model->image?>" class="rounded-circle">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                    <?=$model->active? '<a href="#" class="btn btn-sm btn-info  mr-4 ">Aktiv</a>': '<a href="#" class="btn btn-sm btn-warning  mr-4 ">Deaktiv</a>'?>
                    <a href="#" class="btn btn-sm btn-default float-right"><?=$model->role->role?></a>
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
                    <div class="h5 font-weight-300">
                        <i class="ni location_pin mr-2"></i><?=$model->district->name?>, <?=$model->region->name?>
                    </div>
                    <div class="h5 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i><?=$model->email?> - <?=$model->phone?>
                    </div>
                    <div>
                        <i class="ni education_hat mr-2"></i><?=$model->address?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 order-xl-1">
<!--        --><?//=$this->red('update')?>
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?=$this->title?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-sm btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
