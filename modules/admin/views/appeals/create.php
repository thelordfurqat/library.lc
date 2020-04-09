<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Appeals */

$this->title = 'Create Appeals';
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => 'Appeals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper border-bottom white-bg mptop">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
