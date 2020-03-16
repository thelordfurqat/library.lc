<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Certificate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="certificate-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="pl-lg-4">
        <div class="row">

            <div class="col-lg-6">

                <?= $form->field($model, 'name')->textInput(['maxlength' => true,'required'=>'required']) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'image')->fileInput(['maxlength' => true, ])->label('Rasm<br><br><br>') ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
