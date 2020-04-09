<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(['action'=>$model->isNewRecord ? Yii::$app->urlManager->createUrl(['/admin/category/create']) : Yii::$app->urlManager->createUrl(['/admin/category/update','id'=>$model->id])]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'lang_id')->dropDownList(\app\components\ArrayMaps::language()) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(),'id','name'),[
            'class'=>'select2-list form-control'
    ]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Saqlash' : 'Yangilash', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
