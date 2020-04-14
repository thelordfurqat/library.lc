<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = 'Kitob qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Kitoblar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><?= $this->title ?></h3>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'files')->widget(\kartik\file\FileInput::class,[

                    'options'=>[
                        'multiple'=>true,
//                            'enctype' => 'multipart/form-data',
                    ],
                    'pluginOptions' => [
                        'uploadUrl' => Url::to(['/file-upload']),
                        'uploadExtraData' => [
                            'album_id' => 20,
                            'cat_id' => 'Nature'
                        ],
                        'maxFileCount' => 10
                    ],
                ]) ?>

<!--                --><?//= $form->field($model, 'preview')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'detail')->widget(\dosamigos\tinymce\TinyMce::className(), [
                    'options' => ['rows' => 20],
                    'language' => 'ru',

                    'clientOptions' => [
                        'plugins' => [
                            'image',
                            "advlist autolink lists link charmap print preview anchor",
                            "searchreplace visualblocks code fullscreen",
                            "insertdatetime media table contextmenu paste",
                            //'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker ',
                            'advcode',
                        ],
                        'relative_urls'=>false,
                        'image_advtab' => true,
                        'images_upload_url'=> Yii::$app->urlManager->createUrl(['admin/photo/upload']),
                        'file_picker_types'=>'file image media',
                        'file_browser_callback_types'=>'file image media',
                        'content_css'=> [
                            '//fonts.googleapis.com/css?family=Roboto',
                            '//www.tinymce.com/css/codepen.min.css'],

                        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link  image | print preview media | file | forecolor backcolor emoticons | code",
                        'external_filemanager_path'=>'/backend/filemanager/filemanager/',
                        'filemanager_title'=>'File manager',
                        "external_plugins"=>[
                            'filemanager'=>'/backend/filemanager/filemanager/plugin.min.js'
                        ],

                    ]
                ]); ?>

<!--                --><?//= $form->field($model, 'book_id')->textInput() ?>

<!--                --><?//= $form->field($model, 'created')->textInput() ?>

<!--                --><?//= $form->field($model, 'updated')->textInput() ?>

<!--                --><?//= $form->field($model, 'is_delete')->textInput() ?>

<!--                --><?//= $form->field($model, 'status')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>