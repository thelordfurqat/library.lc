<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Adds */

$this->title = $model->header;
$this->params['breadcrumbs'][] = ['label' => 'Reklamalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

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
<!--                        --><?//= Html::a('Reklama qo\'shish', ['create'], ['class' => 'btn btn-sm btn-primary']) ?>
                        <?= Html::a('Taxrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
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

                <!-- Light table -->
                <div class="table-responsive">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
//            'id',
                            'header',
                            'detail',
                            [
                                'attribute'=>'image',
                                'value'=>function($x){return '<img src="/adds/'.$x->image.'" style="height:200px">';},
                                'format'=>'raw',
                            ],
                            'type',
                            'url:url',
                            'oder',
//                            'trend_on',
                            ['attribute'=>'status',
                                'value'=>function($x){return status($x->status,$x->trend_down,$x->trend_on);},
                                'format'=>'raw'],
                            'created',
                            'updated',

                        ],
                    ]) ?>

                </div>
                <!-- Card footer -->
            </div>
        </div>
    </div>
</div>