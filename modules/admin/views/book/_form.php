<?php

use buttflattery\formwizard\FormWizard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
$model->arenda = true;
?>
<style>
    .field-book-image {
        /*width: 35%;*/
    }
</style>
<?=
FormWizard::widget([
    'toolbarPosition' => 'bottom',
    'labelNext' => 'Keyingi',
    'labelPrev' => 'Oldingi',
    'labelFinish' => 'Yuklash',
    'labelRestore' => 'Tozalash',

//    'labelFinish'=>'Qo\'shish',
    'steps' => [
//            #step1
        [
            'model' => $model,
            'title' => 'Asosiy ma\'lumotlar',
            'description' => 'Kitob kiritish',
            'formInfoText' => false,
            'fieldConfig' => [
                'only' => ['name', 'image', 'price', 'authors_int', 'subject_id', 'arenda', 'genres_int'],
                'arenda' => [
                    'widget' => \kartik\switchinput\SwitchInput::class,
                    'value' => true,
                    'options' => [
                        'pluginOptions' => [
                            'handleWidth' => 70,
                            'onText' => 'Beriladi',
                            'offText' => 'Berilmaydi'
                        ]
                    ]
                ],
                'price' => [
                    'widget' => \kartik\money\MaskMoney::class,

                ],
                'authors_int' => [
                    'widget' => \kartik\select2\Select2::class,
                    'options' => [
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

                    ]
                ],
                'genres_int' => [
                    'widget' => \kartik\select2\Select2::class,
                    'options' => [
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

                    ]
                ],
                'subject_id' => [
                    'widget' => \kartik\select2\Select2::class,
                    'options' => [
                        'data' => \yii\helpers\ArrayHelper::map(\app\models\Subject::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'Fanni tanlang ...',
                        ],
                        'theme' => \kartik\select2\Select2::THEME_BOOTSTRAP,
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],

                    ]
                ],
                'image' => [
                    'widget' => \kartik\file\FileInput::class,
                    'multifield' => false,

                    'options' => [

                        'options' => [

                            'multiple' => false,
                            'accept' => 'image/*',
                            'pluginOptions' => [
                                'showCaption' => false,
                                'showRemove' => false,
                                'showUpload' => false,
                                'theme' => 'fa',
                                'allowedFileExtensions' => ['jpg', 'gif', 'png'],
                                'overwriteInitial' => false
                            ],
                        ],
                    ],
                ],
            ],
            'fieldOrder' => ['name', 'image', 'price', 'authors_int', 'subject', 'genres_int', 'arenda'],
        ],
//        step2
        [
            'model' => new \app\models\Files(),
            'title' => 'Fayllarni kiriting',
            'description' => 'Kitobning elektron shakli',
            'formInfoText' => false,
            'fieldConfig' => [
                'only' => ['files', 'preview', 'detail'], // only these field will be added in the step, rest all will be hidden/ignored.
                'files' => [
                    'widget' => \kartik\file\FileInput::class,
                    'multiple' => false,
                    'options'=>[
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
                    ],
                ],
                'preview'=>[
                        'options'=>[
                                'type'=>'textarea',
                            'rows'=>6,
                        ],
                ],
                'detail'=>[
                        'options'=>[
                            'type'=>'textarea',
                            'rows'=>6,
                        ],
                ],

            ],
            'fieldOrder' => ['files', 'preview', 'detail'],
        ],
        [
            'model' => $model,
            'title' => 'Qo\'shimcha ma\'lumotlar',
            'description' => 'Majburiy emas',
            'formInfoText' => false,
            'fieldConfig' => [
                'only' => ['publisher_id','certificate', 'made_in', 'made_date', 'page_size', 'shtrix_code', 'isbn_code', 'muqova', 'size', 'detail'], // only these field will be added in the step, rest all will be hidden/ignored.
                'publisher_id'=>[
                    'widget' => \kartik\select2\Select2::class,
                    'options' => [
                        'data' => \yii\helpers\ArrayHelper::map(\app\models\Publisher::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'Nashriyotni tanlang ...',
                        ],
                        'theme' => \kartik\select2\Select2::THEME_BOOTSTRAP,
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]
                ],
                'made_in'=>[
                        'options'=>[
                                'type'=>'number',
                        ]
                ],
                'made_date'=>[
                        'options'=>[
                                'type'=>'number',
                        ]
                ],
                'page_size'=>[
                        'options'=>[
                                'type'=>'number',
                        ]
                ],
                'muqova'=>[
                    'widget' => \kartik\select2\Select2::class,
                    'options' => [
                        'data' => ['Yumshoq'=>'Yumshoq','Qattiq'=>'Qattiq'],
                        'options' => ['placeholder' => 'Muqova turini tanlang ...',
                        ],
                        'theme' => \kartik\select2\Select2::THEME_BOOTSTRAP,
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]
                ],
                'detail'=>[
                    'options'=>[
                        'type'=>'textarea',
                        'rows'=>6,
                    ],
                ],
            ],
            'fieldOrder' => ['publisher_id', 'certificate','made_in', 'made_date', 'page_size', 'shtrix_code', 'isbn_code', 'muqova', 'size', 'detail'],
        ],

    ]
]);
?>