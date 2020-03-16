<?php

use app\models\search\BookSearch;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Genre */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Janrlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
    <script>
        var ganreapdate = function(){}
    </script>
<div class="row">
    <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
            <img src="/theme/assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
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
                        <i class="ni location_pin mr-2"></i><p>
                            <?= Html::button('Taxrirlash',  ['class' => 'btn btn-primary','onclick'=>'ganreapdate('.$model->id.')']) ?>
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
        if(!$query['BookSearch']['genres'])
            $query['BookSearch']['genres']='"'.$model->id.'"';
        $dataProvider = $searchModel->search($query);

        //        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        echo $this->render(Yii::$app->urlManager->createUrl(['/book/index']), [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'genre_id'=>$model->id,
        ]);
        ?>
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