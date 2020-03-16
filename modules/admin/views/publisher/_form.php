<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Publisher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publisher-form">

    <?php $form = ActiveForm::begin(); ?>
    <h6 class="heading-small text-muted mb-4">Asosiy ma'lumotlar</h6>
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
    <h6 class="heading-small text-muted mb-4">Manzil</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($model, 'country_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Country::find()->all(),'id','name'),[
                    'prompt'=>'-Mamlakatni tanlang-',
                    'onchange'=>'
				$.get( "'.Url::toRoute('/admin/user/getregion').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'region_id').'" ).html( data );
                            });
			'
                ]) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'region_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Region::find()->all(),'id','name'),[
                    'prompt'=>'-Viloyatni tanlang-',
                    'onchange'=>'
				$.get( "'.Url::toRoute('/admin/user/getdistrict').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'district_id').'" ).html( data );
                            });
			'
                ]) ?>
            </div>
            <div class="col-lg-6">
                <?php
                echo $form->field($model, 'district_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\District::find()->where(['region_id'=>$model->region_id])->all(),'id','name'),['prompt'=>'-Tumanni tanlang-']) ?>
            </div>
                <div class="col-lg-6">
                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                </div>

<!--            <div class="col-lg-6">-->
<!--                --><?//= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>
<!---->
<!--                --><?//= $form->field($model, 'lng')->textInput(['maxlength' => true]) ?>
<!--            </div>-->
                <div class="col-lg-12">
                <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>
                </div>
<!--            <div class="col-lg-6">-->
<!--                --><?//=$form->field($model, 'address')->widget(\kalyabin\maplocation\SelectMapLocationWidget::className(), [
//                    'attributeLatitude' => 'lat',
//                    'attributeLongitude' => 'lng',
//                    'googleMapApiKey' => 'AIzaSyAX4HK_ZZAukkM8rlxCgUoAZ_hGDm4DJyk',
//                    'draggable' => true,
//                ]); ?>
<!--            </div>-->
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
