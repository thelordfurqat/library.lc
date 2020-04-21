<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\LibrarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'bank_id') ?>

    <?= $form->field($model, 'bank_account_number') ?>

    <?php // echo $form->field($model, 'oked') ?>

    <?php // echo $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'country_id') ?>

    <?php // echo $form->field($model, 'region_id') ?>

    <?php // echo $form->field($model, 'district_id') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'telegram_channel') ?>

    <?php // echo $form->field($model, 'chat_id') ?>

    <?php // echo $form->field($model, 'director') ?>

    <?php // echo $form->field($model, 'buxgalter') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'setting') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'balans') ?>

    <?php // echo $form->field($model, 'telegram_username') ?>

    <?php // echo $form->field($model, 'instagram') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
