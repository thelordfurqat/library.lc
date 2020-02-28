<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'alias',
            'name',
            'certificate',
            'certificator_id',
            //'year',
            //'made_in',
            //'publisher_id',
            //'authors',
            //'sales',
            //'code',
            //'show_counter',
            //'price',
            //'old_price',
            //'arenda',
            //'shtrix_code',
            //'isbn_code',
            //'made_date',
            //'like_counter',
            //'detail:ntext',
            //'page_size',
            //'size',
            //'muqova',
            //'status',
            //'is_delete',
            //'created',
            //'updated',
            //'genre',
            //'subject',
            //'user_id',
            //'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
