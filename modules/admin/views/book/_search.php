<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'alias') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'certificate') ?>

    <?= $form->field($model, 'certificator_id') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'made_in') ?>

    <?php // echo $form->field($model, 'publisher_id') ?>

    <?php // echo $form->field($model, 'authors') ?>

    <?php // echo $form->field($model, 'sales') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'show_counter') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'old_price') ?>

    <?php // echo $form->field($model, 'arenda') ?>

    <?php // echo $form->field($model, 'shtrix_code') ?>

    <?php // echo $form->field($model, 'isbn_code') ?>

    <?php // echo $form->field($model, 'made_date') ?>

    <?php // echo $form->field($model, 'like_counter') ?>

    <?php // echo $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'page_size') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'muqova') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'is_delete') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <?php // echo $form->field($model, 'genre') ?>

    <?php // echo $form->field($model, 'subject') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
