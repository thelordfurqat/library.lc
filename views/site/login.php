<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Kirish</h4>
<!--                    <p class="">Ijtimoiy tarmoqlar orqali kirish.</p>-->
<!--                    <div class="social-sign-in outer-top-xs">-->
<!--                        <a href="#" class="facebook-sign-in" ><i class="fa fa-facebook"></i> Facebook</a>-->
<!--                        <a href="#" class="facebook-sign-in" style="background-color: #f8881f"><i class="fa fa-google"></i> Google</a>-->
<!--                        <a href="#" class="twitter-sign-in"><i class="fa fa-paper-plane"></i> Telegram</a>-->
<!--                    </div>-->
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'action'=>'/site/login',
                        'options'=>[
                            'class'=>'register-form outer-top-xs',
                        ],
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'info-title'],
                        ],
                    ]); ?>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true,'type'=>'email','class'=>'form-control unicase-form-control text-input'])->label('Email') ?>

                    <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control unicase-form-control text-input'])->label('Parol') ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                    ])->label('Eslab qolish') ?>


                    <?= Html::submitButton('Kirish', ['class' => 'btn-upper btn btn-primary checkout-page-button', 'name' => 'login-button']) ?>

                    <?php ActiveForm::end(); ?>


                </div>
                <!-- Sign-in -->

                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account">
                    <h4 class="checkout-subtitle">Ro'yxatdan o'tish</h4>
                    <p class="text title-tag-line">O'z profilingizni yarating.</p>
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'action'=>'/site/register',
                        'options'=>[
                            'class'=>'register-form outer-top-xs',
                        ],
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'info-title'],
                        ],
                    ]); ?>

                    <?= $form->field($newUser, 'email')->textInput(['type'=>'email','class'=>'form-control unicase-form-control text-input','required'=>'required']) ?>
                    <?= $form->field($newUser, 'name')->textInput(['class'=>'form-control unicase-form-control text-input','required'=>'required']) ?>
                    <?= $form->field($newUser, 'phone')->textInput(['class'=>'form-control unicase-form-control text-input']) ?>
                    <?= $form->field($newUser, 'password')->passwordInput(['class'=>'form-control unicase-form-control text-input','required'=>'required']) ?>
                    <?= $form->field($newUser, 'repeat_password')->passwordInput(['class'=>'form-control unicase-form-control text-input','required'=>'required'])->label('Parolni takrorlang') ?>
                    <?= Yii::$app->session->getFlash('error_validate_password')?'<span style="color: red">'. Yii::$app->session->getFlash('error_validate_password').'</span><br><br>':''?>
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Ro'yxatdan o'tish</button>
                    <?php ActiveForm::end(); ?>


                </div>
                <!-- create a new account -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

