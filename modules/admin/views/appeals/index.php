<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AppealsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Murojaatlar';
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper border-bottom white-bg mptop">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<h2>Murojaatlar</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'name',
            ['attribute'=>'name',
                'value'=>function($x){return '<a href="'.\yii\helpers\Url::to(['/admin/appeals/view','id'=>$x->id]).'">'.$x->name.'</a>';},
                'format'=>'raw'],

            'phone',
//            'email:email',
            'subject',
            // 'body:ntext',
            // 'file',
             'created',
            ['attribute'=>'status',
                'value'=>function($x){switch ($x->status) {
                    case 1: return '<a href="'.\yii\helpers\Url::to(['/admin/appeals/view','id'=>$x->id]).'" style="color:red;">Yangi</a>';
                    case 2: return '<a href="'.\yii\helpers\Url::to(['/admin/appeals/view','id'=>$x->id]).'" style="color:green;">Ko\'rilgan</a>';
                }
                    return '<a href="'.\yii\helpers\Url::to(['/admin/appeals/view','id'=>$x->id]).'" style="color:red;">Yangi</a>';
                },
                'format'=>'raw'],
            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}'],
        ],
    ]); ?>
</div>
