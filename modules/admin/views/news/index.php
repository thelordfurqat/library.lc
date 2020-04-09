<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Postlar';
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div aria-live="polite" aria-atomic="true" style="position: relative; z-index: 10000001">
        <!-- Position it -->
        <div style="position: absolute; top: 0; right: 0;">
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h4 style="color: white" id="alert-text"><strong>Success! </strong> Product have added to your wishlist.</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0"><?= Html::encode($this->title) ?></h3>
                        </div>
                        <div class="col-4 text-right">
                            <?= Html::a('Post qo\'shish', ['create'], ['class' => 'btn btn-sm btn-primary']) ?>
                        </div>


                    </div>
                </div>
                <div class="card-body">


                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                   'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

            //            'id',
            //            'code'б
//                        'name',
                            [
                                'attribute'=>'name',
                                'headerOptions' => ['style' => ' '],
                            ],
            //            'image',
            //            'cat.name',
                        [
                            'attribute'=>'cat_id',
                            'value'=>'cat.name',
                            'filter'=>\app\components\ArrayMaps::categoryCustom()
                        ],
                        // 'preview:ntext',
                        // 'detail:ntext',
                        // 'sort',
            //             'show_counter',
                        // 'slider',
                        // 'vote',
                        // 'tags',
            //             'author_id',
                        [
                            'attribute'=>'author_id',
                            'value'=>'author.name',
                            'filter'=>\app\components\ArrayMaps::Authors()
                        ],
                        // 'modify_by',
                        // 'updated',

                        // 'status',
            //            'created',
                        [
                            'attribute'=>'status',
                            'value'=>function($d){
                                $ch = $d->status == 1 ? 'checked' : '';
                                return "
                                    <div class='checkboxcustom'>
                                        <input type='checkbox' {$ch}  onchange='statuschanger({$d->id})'>
                                    </div>
                                ";
                            },
                            'format'=>'raw',
                            'filter'=>[1=>'Aktiv',0=>'Deaktiv']
                        ],

                        // 'active',

                        ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}',
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


                        <?= \yii\widgets\LinkPager::widget(['pagination' => $dataProvider->pagination,

                            'options' => [
                                'class' => 'pagination justify-content-end mb-0',
                            ],

                            'linkContainerOptions' => ['class' => 'page-item'],
                            'linkOptions' => ['class' => 'page-link'],

                        ]); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>




<?php

$url = Yii::$app->urlManager->createUrl(['admin/news/status']);
$this->registerJs("
    statuschanger = function(id){
        $.get('{$url}?id='+id).done(function(data){
            if(data==1){
            $('#alert-text').empty();
            $('#alert-text').append('Muvoffaqqiyatli <strong>Aktivlashtirildi</strong>');
                 $('#success-alert').fadeTo(2000, 500) . slideUp(500, function () {
        $('#success-alert').slideUp(500);
    });
            }else if(data == 0){
             $('#alert-text').empty();
            $('#alert-text').append('Muvoffaqqiyatli <strong>Deaktivlashtirildi</strong>');
                 $('#success-alert').fadeTo(2000, 500) . slideUp(500, function () {
        $('#success-alert').slideUp(500);
         });
            }else{
            $('#alert-text').empty();
            $('#alert-text').append('Amalni bajarishdagi <strong>Xatolik</strong>');
                 $('#success-alert').fadeTo(2000, 500) . slideUp(500, function () {
        $('#success-alert').slideUp(500);
         });
            }
        });
   }
   
   
$('#success-alert').hide();
  $('#myWish').click(function showAlert() {
    $('#success-alert').fadeTo(2000, 500) . slideUp(500, function () {
        $('#success-alert').slideUp(500);
    });
  });

")

?>