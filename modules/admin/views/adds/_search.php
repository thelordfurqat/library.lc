<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\AddsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adds-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'header') ?>

    <?= $form->field($model, 'detail') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'oder') ?>

    <?php // echo $form->field($model, 'trend_on') ?>

    <?php // echo $form->field($model, 'trend_down') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
