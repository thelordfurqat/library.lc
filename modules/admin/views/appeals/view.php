<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Appeals */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => 'Murojaatlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper border-bottom white-bg mptop">



    <h2><?=$model->name?></h2>
    <a href="<?= \yii\helpers\Url::to(['returned', 'id' => $model->id]) ?>" class="btn btn-success">Javob qaytarildi</a><br>

    <?= DetailView::widget([
        'model' => $model,
        'options'=>['class'=>'table table-responsive','style'=>'width:100%'],
        'attributes' => [
//            'id',
            'name',
            'phone',
            ['attribute'=>'status',
                'value'=>function($x){
        switch ($x->status){
            case 1: return '<p class="btn btn-danger">Yangi</p>';
            case 2: return '<p class="btn btn-success">Javob qaytarilgan</p>';
        }
        return '';},
                'format'=>'raw',
                ],
            'email:email',
            'subject',
            'body:ntext',
            'file',
            'created',
        ],
    ]) ?>

</div>
