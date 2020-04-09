<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Восстановление пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">

    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
    <p align="center"><img src="/password_change.png" width="100%" /></p>
    <hr>
    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

    <div style="color:#999;margin:1em 0">
        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> <?= Html::a('Назад', ['/admin/default/login']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn-inverse']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
