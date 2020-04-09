<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Adds */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="adds-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->widget(\kartik\select2\Select2::class,[

        'data' => [
            'carusel1'=>'Bosh sahifa birinchi karusel (1053x520)',
            'carusel2'=>'Bosh sahifa ikkinchi karusel (1053x520)',
            'home1'=>'Bosh sahifa birinchi uchtalik (330x180)',
            'home2'=>'Bosh sahifa ikkinchi uchtalik (330x180)',
            'oncategory'=>'Kategoriyalar yuqoridagi (1053x313)',
            'onslider'=>'Sliderdagi 262x265',
        ],
        'options' => ['placeholder' => 'Joylashuvni tanlang ...',
        ],
        'theme' => \kartik\select2\Select2::THEME_BOOTSTRAP,
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]) ?>


    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <img src="/adds/<?= $model->isNewRecord ? 'default.png' : $model->image?>" id="blah" style="height:200px; width:auto;">
    </div>
    <?= $form->field($model, 'image')->fileInput(['maxlength' => true,'accept' => 'image/*']) ?>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'book_code')->widget(\kartik\select2\Select2::class,[

                'data' => \yii\helpers\ArrayHelper::map(\app\models\Book::find()->all(), 'code', 'name',function ($item){return $item->user->name;}),
                'options' => ['placeholder' => 'Kitobni tanlang ...',
                ],
                'theme' => \kartik\select2\Select2::THEME_BOOTSTRAP,
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]) ?>
        </div>
        <div class="col-lg-1 text-center" >
            <h3> &nbsp;</h3>
            <h3 >Yoki</h3>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'oder')->textInput(['type'=>'number']) ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'trend_on_date')->textInput(['type'=>'date']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'trend_on_time')->textInput(['type'=>'time']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'trend_on_length')->textInput(['type'=>'number']) ?>
        </div>
    </div>

<!--    --><?//= $form->field($model, 'trend_down')->textInput() ?>

<!--    --><?//= $form->field($model, 'created')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php


$this->registerJs("

        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        $('#adds-image').change(function() {
          readURL(this);
        });
         $('#blah').click(function () {
                $('#adds-image').click();
            });
");

?>
