<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <?php if(\app\models\User::find()->count()!=0){?>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <p align="center"><img src="/profile.jpg" width="50%" /></p>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Еmail') ?>

    <?= $form->field($model, 'password')->passwordInput([])->label('Пароль') ?>

    <div style="color:#999;margin:1em 0">
        <?= Html::a('Забыли пароль?', ['/admin/default/reset']) ?>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <?= Html::submitButton('Вход', ['class' => 'btn-inverse', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <?php }else{?>

        <?= $this->render('_reg',['model'=>new \app\models\User()]) ?>



    <?php }?>
</div>
