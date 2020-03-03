<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Genre */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="genre-form">

    <?php $form = ActiveForm::begin(['action'=>$model->isNewRecord? '' : Yii::$app->urlManager->createUrl(['/admin/genre/update','id'=>$model->id])]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'autofocus'=>true]) ?>

<!--    --><?//= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
