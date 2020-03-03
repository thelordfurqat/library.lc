<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Genre */

$this->title = 'Taxrirlash: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Janrlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Taxrirlash';
?>
<div class="row">
    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><?=$this->title?></h3>
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
