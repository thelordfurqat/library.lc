<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
$country=\yii\helpers\ArrayHelper::map(\app\models\Country::find()->all(),'id','name');
//$country=\app\models\Country::find()->asArray()->all();
?>
    <script>
        var buttonclick = function(){}
    </script>

    <?php $form = ActiveForm::begin(); ?>


<h6 class="heading-small text-muted mb-4">Asosiy ma'lumotlar</h6>
<div class="pl-lg-4">
    <div class="row">

        <div class="col-lg-6">
        <?= $form->field($model, 'role_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Role::find()->all(),'id','role')) ?>
        </div>
        <div class="col-lg-6">

            <?= $form->field($model, 'username')->textInput(['maxlength' => true,'required'=>'required']) ?>
        </div>
        <div class="col-lg-6">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'required'=>'required']) ?>
        </div>
        <div class="col-lg-6">

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'type'=>'email']) ?>
        </div>
        <div class="col-lg-6">
        <?= $form->field($model, 'phone')->textInput(['maxlength'=>true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'image')->fileInput(['maxlength' => true, ]) ?>
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

        <div class="form-group pull-right">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>



    <?php ActiveForm::end(); ?>

<?php
$script= <<< JS
buttonclick = function() {
 
                            alert('gagagagagaga');
                            
}
JS;
$this->registerJs($script);