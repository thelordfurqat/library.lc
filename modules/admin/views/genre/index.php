<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GenreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Janrlar';
$this->params['breadcrumbs'][] = $this->title;
?>

<script>
    var ganreapdate = function(){}
</script>

<?php
Modal::begin([

    'id'=>'addgenre',
    'size'=>'modal-dialog-centered',
    'options'=>['class'=>'modal fade'],
//    'diologOptions'=>['class'=>'modal-dialog modal-dialog-centered'],
    'bodyOptions' => ['class' => 'modal-body'],
    'headerOptions' => ['class' => 'modal-header','style'=>'display:none'],
    'closeButton' => [
        'id'=>'close-button',
        'class'=>'close',
        'data-dismiss' =>'modal',
    ],

]);

echo $this->render('_form',['model'=>new \app\models\Genre()]);
Modal::end();
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
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addgenre">
                           Janr qo'shish
                        </button>
<!--                        --><?//= Html::a('Janr qo\'shish', ['create'], ['class' => 'btn btn-sm btn-primary']) ?>
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

                                'name',
                                'count',

                            [

                                'class' => 'yii\grid\ActionColumn',

                                'template' => '{update} {delete} ',

                                'buttons' => [

                                    'view' => function ($url,$model) {
                                        return Html::a(
                                                '<span class="fa fa-eye"></span>',
                                                $url).'<br>';
                                    },
                                    'update' => function ($url,$model) {
                                        return Html::button(
                                                '<span class="fa fa-edit"></span>',
                                                ['onclick'=>'ganreapdate('.$model->id.')', 'class'=>'btn btn-link']);
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

<?php
Modal::begin([

    'id'=>'updategenre',
    'size'=>'modal-dialog-centered',
    'options'=>['class'=>'modal fade'],
//    'diologOptions'=>['class'=>'modal-dialog modal-dialog-centered'],
    'bodyOptions' => ['class' => 'modal-body','id'=>'updategenrebody'],
    'headerOptions' => ['class' => 'modal-header','style'=>'display:none'],
    'closeButton' => [
        'id'=>'close-button',
        'class'=>'close',
        'data-dismiss' =>'modal',
    ],

]);

Modal::end();
?>


<?php
  $url = Yii::$app->urlManager->createUrl(['admin/genre/update']);

  $this->registerJs("
  ganreapdate = function(id){
    $.get('{$url}?id='+id).done(function(data){
        
        $('#updategenrebody').empty();
        $('#updategenrebody').append(data);
        $('#updategenre').modal();
    })
  }
    
  ")
?>