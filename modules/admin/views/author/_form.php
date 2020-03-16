<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Author */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="author-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="pl-lg-4">
        <div class="row">

            <div class="col-lg-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-6">
                <br>
                <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-12">
                <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>
            </div>

        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
