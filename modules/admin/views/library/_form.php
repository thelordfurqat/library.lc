<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Library */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <!--    --><? //= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

        <div class="col-xs-12 col-sm-12 col-md-6">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2">
            <?= $form->field($model, 'balans')->textInput() ?>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <label class="control-label" for="book-price">Kutubxona logotipi</label><br>
                <img src="/library-images/<?= $model->isNewRecord ? 'default.png' : $model->image ?>" id="blah"
                     style="height:200px; width:auto;">
            </div>
            <?= $form->field($model, 'image')->fileInput(['maxlength' => true])->label(false) ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <h6 class="heading-small text-muted mb-4">Manzil</h6>
            <div class="row">

                <div class="col-lg-6">
                    <?= $form->field($model, 'country_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Country::find()->all(), 'id', 'name'), [
                        'prompt' => '-Mamlakatni tanlang-',
                        'onchange' => '
				$.get( "' . Url::toRoute('/admin/user/getregion') . '", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#' . Html::getInputId($model, 'region_id') . '" ).html( data );
                            });
			'
                    ]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'region_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Region::find()->all(), 'id', 'name'), [
                        'prompt' => '-Viloyatni tanlang-',
                        'onchange' => '
				$.get( "' . Url::toRoute('/admin/user/getdistrict') . '", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#' . Html::getInputId($model, 'district_id') . '" ).html( data );
                            });
			'
                    ]) ?>
                </div>
                <div class="col-lg-6">
                    <?php
                    echo $form->field($model, 'district_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\District::find()->where(['region_id' => $model->region_id])->all(), 'id', 'name'), ['prompt' => '-Tumanni tanlang-']) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

        </div>
        <div class="col-12 text-right">
            <?= Html::button('Qo\'shimcha ma\'lumotlar', ['class' => 'btn btn-sm btn-primary', 'id' => 'show-details']) ?>
        </div>
        <div class="row" style="display: none" id="mydetails">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($model, 'director')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($model, 'buxgalter')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h6 class="heading-small text-muted mb-4">Email va ijtimoy tarmoqlar </h6>
                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?= $form->field($model, 'telegram_username')->textInput(['maxlength' => true]) ?>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?= $form->field($model, 'telegram_channel')->textInput(['maxlength' => true]) ?>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?= $form->field($model, 'instagram')->textInput() ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h6 class="heading-small text-muted mb-4">Xisob ma'lumotlari </h6>
                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?= $form->field($model, 'bank_id')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\Bank::find()->all(),'bank_id','bank_name')) ?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?= $form->field($model, 'bank_account_number')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?= $form->field($model, 'oked')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
        </div>


            <!--    --><? //= $form->field($model, 'chat_id')->textInput(['maxlength' => true]) ?>


            <!--    --><? //= $form->field($model, 'created')->textInput() ?>
            <!---->
            <!--    --><? //= $form->field($model, 'updated')->textInput() ?>

            <!--    --><? //= $form->field($model, 'status')->textInput() ?>

            <!--    --><? //= $form->field($model, 'setting')->textarea(['rows' => 6]) ?>

            <!--    --><? //= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>


            <div class="form-group pull-right">
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
        
        $('#library-image').change(function() {
          readURL(this);
        });
         $('#blah').click(function() {
        $('#library-image').click();
    });
         $('#show-details').click(function() {
        $('#mydetails').toggle();
    });
");

        ?>

