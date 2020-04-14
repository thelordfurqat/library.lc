<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
?>

    <?php $form = ActiveForm::begin(); ?>

    <!--                --><?//= $form->field($model, 'alias') ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <label class="control-label" for="book-price">Muqova rasmi</label><br>
                <img src="/book-images/<?= $model->isNewRecord ? 'default.png' : $model->image?>" id="blah" style="height:200px; width:auto;">
            </div>
            <?= $form->field($model, 'image')->fileInput(['maxlength' => true])->label(false) ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <?= $form->field($model, 'subject_id')->widget(\kartik\select2\Select2::class,[
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Subject::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Fanni tanlang ...',
                ],
                'theme' => \kartik\select2\Select2::THEME_BOOTSTRAP,
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]) ?>
            <?= $form->field($model, 'price')->widget(\kartik\money\MaskMoney::class) ?>
            <?= $form->field($model, 'arenda')->widget(\kartik\switchinput\SwitchInput::class,[
                'pluginOptions' => [
                    'handleWidth' => 70,
                    'onText' => 'Beriladi',
                    'offText' => 'Berilmaydi'
                ],
            ]) ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <?= $form->field($model, 'authors_int')->widget(\kartik\select2\Select2::class,[
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Author::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Avtorlarni tanlang ...', 'prompt' => 'Avtorlarni tanlang', 'multiple' => true,
                ],
                'theme' => \kartik\select2\Select2::THEME_MATERIAL,
                'pluginOptions' => [
                    'allowClear' => true,
                    'tags' => true,
                    'tokenSeparators' => [','],

                ],
                'maintainOrder' => true,

            ])->label('Avtorlar') ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <?= $form->field($model, 'genres_int')->widget(\kartik\select2\Select2::class,[
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Genre::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Janrlarni tanlang ...', 'prompt' => 'Janrlarni tanlang', 'multiple' => true,
                ],
                'theme' => \kartik\select2\Select2::THEME_MATERIAL,
                'pluginOptions' => [
                    'allowClear' => true,
                    'tags' => true,
                    'tokenSeparators' => [','],

                ],
                'maintainOrder' => true,

            ])->label('Janrlar') ?>
        </div>
    </div>
    <div class="col-12 text-right">
        <?= Html::button('Qo\'shimcha ma\'lumotlar', ['class' => 'btn btn-sm btn-primary','id'=>'show-details']) ?>
    </div>
    <div class="row" style="display: none" id="mydetails">
        <div class="col-xs-12 col-sm-12 col-md-6">

            <!--                --><?//= $form->field($model, 'code') ?>
            <!--                --><?//= $form->field($model, 'user_id') ?>
            <!--                --><?//= $form->field($model, 'certificator_id') ?>
            <?= $form->field($model, 'publisher_id')->widget(\kartik\select2\Select2::class,[
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Publisher::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Nashriyotni tanlang ...',
                ],
                'theme' => \kartik\select2\Select2::THEME_BOOTSTRAP,
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]) ?>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-2">
            <!--                --><?//= $form->field($model, 'sales') ?>
            <!--                --><?//= $form->field($model, 'show_counter') ?>
            <!--                --><?//= $form->field($model, 'old_price') ?>
            <!--                --><?//= $form->field($model, 'like_counter') ?>
            <?= $form->field($model, 'page_size')->textInput(['type'=>'number']) ?>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-2">
            <!--                --><?//= $form->field($model, 'status') ?>
            <!--                --><?//= $form->field($model, 'is_delete') ?>
            <?= $form->field($model, 'size') ?>

        </div>

        <div class="col-xs-12 col-sm-6 col-md-2">
            <?= $form->field($model, 'muqova')->dropDownList(['Yumshoq'=>'Yumshoq','Qattiq'=>'Qattiq']) ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <?= $form->field($model, 'year')->textInput(['type'=>'number']) ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <?= $form->field($model, 'made_in')->textInput(['type'=>'number']) ?>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-4">
            <?= $form->field($model, 'made_date')->textInput(['type'=>'number']) ?>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <!--                --><?//= $form->field($model, 'genres_int') ?>
            <?= $form->field($model, 'certificate') ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4">
            <!--                --><?//= $form->field($model, 'authors') ?>
            <?= $form->field($model, 'shtrix_code') ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4">
            <?= $form->field($model, 'isbn_code') ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <!--                --><?//= $form->field($model, 'created') ?>
            <!--                --><?//= $form->field($model, 'updated') ?>
            <?= $form->field($model, 'detail')->widget(\dosamigos\tinymce\TinyMce::className(), [
                'options' => ['rows' => 8],
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
        </div>






    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::$app->controller->action->id=='create'?'Fayllarni kiritish':'Saqlash', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>




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
        
        $('#book-image').change(function() {
          readURL(this);
        });
         $('#blah').click(function() {
        $('#book-image').click();
    });
         $('#show-details').click(function() {
        $('#mydetails').toggle();
    });
");

?>

