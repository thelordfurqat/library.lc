<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/** @var \app\models\Language $langs */

$this->title = 'Bo\'limlar';
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div aria-live="polite" aria-atomic="true" style="position: relative; z-index: 10000001">
    <!-- Position it -->
    <div style="position: absolute; top: 0; right: 0;">
<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <h4 style="color: white" id="alert-text"><strong>Success! </strong> Product have added to your wishlist.</h4>
</div>
    </div>
</div>

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

                <?php foreach (\app\models\Category::find()->where(['lang_id' => 1])->orderBy(['sort' => SORT_ASC])->andWhere(['parent_id' => 1])->all() as $cat): ?>
                    <div class="accordion" id="accordion<?= $cat->id ?>" style="">
                        <div class="card" style="margin-bottom: 5px">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <button class="btn" id="heading<?= $cat->id ?>" data-toggle="collapse"
                                            data-target="#collapse<?= $cat->id ?>" aria-expanded="false"
                                            aria-controls="collapse<?= $cat->id ?>">
                                        <span class="<?= $cat->icon ?>"></span> <?= $cat->name ?>
                                    </button>

                                    <a href="<?= Yii::$app->urlManager->createUrl(['/admin/category/delete', 'id' => $cat->id]) ?>"
                                       class="btn pull-right" title="O`chirish" aria-label="O`chirish"
                                       style="margin-right: 4rem"
                                       data-pjax="0"
                                       data-confirm="Sizni ushbu elementni o`chirishga ishonchngiz komilmi?"
                                       data-method="post"><span
                                                class="fa fa-trash fa-2x"></span></a>
                                    <button type="button" class="btn pull-right"
                                            onclick="updatemodal(<?= $cat->id ?>)"><span
                                                class="fa fa-edit fa-2x"></span></button>
                                    <a href="<?= Yii::$app->urlManager->createUrl(['admin/category/up', 'id' => $cat->id]) ?>"
                                       class="pull-right btn"><span
                                                class="fa fa-arrow-up"></span></a>
                                    <a href="<?= Yii::$app->urlManager->createUrl(['admin/category/down', 'id' => $cat->id]) ?>"
                                       class="pull-right btn"><span
                                                class="fa fa-arrow-down"></span></a>
                                    <span class=' checkboxcustom pull-right'
                                          style="margin-right:10px; margin-top: 1rem">
                                <input type='checkbox' <?= $cat->status == 1 ? 'checked' : '' ?> onchange='statuschanger(<?= $cat->id ?>)'
                                       style="top:-8px;">
                            </span>

                                </h5>
                            </div>
                            <div id="collapse<?= $cat->id ?>" class="collapse" aria-labelledby="heading<?= $cat->id ?>"
                                 data-parent="#accordion<?= $cat->id ?>">
                                <div class="card-body" style="background-color: rgba(49,140,175,0.34)">
                                    <?php foreach (\app\models\Category::find()->where(['parent_id' => $cat->id])->orderBy(['sort' => SORT_ASC])->all() as $item): ?>

                                        <div class="accordion" id="accordion<?= $item->id ?>" style="">
                                            <div class="card" style="margin-bottom: 5px">
                                                <div class="card-header">
                                                    <h5 class="mb-0">
                                                        <button class="btn" id="heading<?= $item->id ?>"
                                                                data-toggle="collapse"
                                                                data-target="#collapse<?= $item->id ?>"
                                                                aria-expanded="false"
                                                                aria-controls="collapse<?= $item->id ?>">
                                                            <span class="<?= $item->icon ?>"></span> <?= $item->name ?>
                                                        </button>

                                                        <a href="<?= Yii::$app->urlManager->createUrl(['/admin/category/delete', 'id' => $item->id]) ?>"
                                                           class="btn pull-right" title="O`chirish"
                                                           aria-label="O`chirish" style="margin-right: 4rem"
                                                           data-pjax="0"
                                                           data-confirm="Sizni ushbu elementni o`chirishga ishonchngiz komilmi?"
                                                           data-method="post"><span
                                                                    class="fa fa-trash fa-2x"></span></a>
                                                        <button type="button" class="btn pull-right"
                                                                onclick="updatemodal(<?= $item->id ?>)"><span
                                                                    class="fa fa-edit fa-2x"></span></button>
                                                        <a href="<?= Yii::$app->urlManager->createUrl(['admin/category/up', 'id' => $item->id]) ?>"
                                                           class="pull-right btn"><span
                                                                    class="fa fa-arrow-up"></span></a>
                                                        <a href="<?= Yii::$app->urlManager->createUrl(['admin/category/down', 'id' => $item->id]) ?>"
                                                           class="pull-right btn"><span
                                                                    class="fa fa-arrow-down"></span></a>
                                                        <span class=' checkboxcustom pull-right'
                                                              style="margin-right:10px; margin-top: 1rem">
                                                            <input type='checkbox' <?= $item->status == 1 ? 'checked' : '' ?> onchange='statuschanger(<?= $item->id ?>)'
                                                                   style="top:-8px;">
                                                            </span>

                                                    </h5>
                                                </div>
                                                <div id="collapse<?= $item->id ?>" class="collapse"
                                                     aria-labelledby="heading<?= $item->id ?>"
                                                     data-parent="#accordion<?= $item->id ?>">
                                                    <div class="card-body" style="background-color: #1EA1E4">
                                                        <?php foreach (\app\models\Category::find()->where(['parent_id' => $item->id])->orderBy(['sort' => SORT_ASC])->all() as $sub_item): ?>

                                                            <div class="accordion" id="accordionExample2">
                                                                <div class="card" style="margin-bottom: 5px">
                                                                    <div class="card-header">
                                                                        <h5 class="mb-0">
                                                                            <button class="btn"
                                                                                    id="heading<?= $sub_item->id ?>"
                                                                                    data-toggle="collapse"
                                                                                    data-target="#collapse<?= $sub_item->id ?>"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="collapse<?= $sub_item->id ?>">
                                                                                <span class="<?= $sub_item->icon ?>"></span> <?= $sub_item->name ?>
                                                                            </button>

                                                                            <a href="<?= Yii::$app->urlManager->createUrl(['/admin/category/delete', 'id' => $sub_item->id]) ?>"
                                                                               class="btn pull-right"
                                                                               title="O`chirish"
                                                                               aria-label="O`chirish"
                                                                               style="margin-right: 4rem"
                                                                               data-pjax="0"
                                                                               data-confirm="Sizni ushbu elementni o`chirishga ishonchngiz komilmi?"
                                                                               data-method="post"><span
                                                                                        class="fa fa-trash fa-2x"></span></a>
                                                                            <button type="button"
                                                                                    class="btn pull-right"
                                                                                    onclick="updatemodal(<?= $sub_item->id ?>)"><span
                                                                                        class="fa fa-edit fa-2x"></span>
                                                                            </button>
                                                                            <a href="<?= Yii::$app->urlManager->createUrl(['admin/category/up', 'id' => $sub_item->id]) ?>"
                                                                               class="pull-right btn"><span
                                                                                        class="fa fa-arrow-up"></span></a>
                                                                            <a href="<?= Yii::$app->urlManager->createUrl(['admin/category/down', 'id' => $sub_item->id]) ?>"
                                                                               class="pull-right btn"><span
                                                                                        class="fa fa-arrow-down"></span></a>
                                                                            <span class=' checkboxcustom pull-right'
                                                                                  style="margin-right:10px; margin-top: 1rem">
                                                                                                                                <input type='checkbox' <?= $sub_item->status == 1 ? 'checked' : '' ?> onchange='statuschanger(<?= $sub_item->id ?>)'
                                                                                                                                       style="top:-8px;">
                                                                                                                                 </span>

                                                                        </h5>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        <? endforeach; ?>
                                                        <div class="accordion" id="accordionExample2">
                                                            <div class="card" style="margin-bottom: 5px">
                                                                <div class="card-header">
                                                                    <h5 class="mb-0"
                                                                        onclick="createmodal(<?= $item->id ?>)"
                                                                        style="height:30px; color: green">
                                                                        <i class="fa fa-plus"></i> Submunyu qo'shish
                                                                    </h5>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    <? endforeach; ?>
                                    <div class="accordion" id="accordionExample2">
                                        <div class="card" style="margin-bottom: 5px">
                                            <div class="card-header">
                                                <h5 class="mb-0" onclick="createmodal(<?= $cat->id ?>)"
                                                    style="height:30px; color: green">
                                                    <i class="fa fa-plus"></i> Munyu qo'shish
                                                </h5>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
                <div class="accordion" id="accordionExample2">
                    <div class="card" style="margin-bottom: 5px">
                        <div class="card-header">
                            <h5 class="mb-0" onclick="createmodal(1)" style="height:30px; color: green">
                                <i class="fa fa-plus"></i> Alohida bo'lim qo'shish
                            </h5>
                        </div>

                    </div>
                </div>


                <h4>Biror web saytga yoki sahifa(action)ga o'tishi uchun <b>-http://example.com/news </b> YOKI <b>
                        -/site/contact-</b>
                </h4>
            </div>

        </div>
    </div>
</div>


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-search"></i> Bo'lim qo'shish</h4>
            </div>
            <div class="modal-body">

                <?php echo $this->render('_form', ['model' => new \app\models\Category()]); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Yopish</button>
            </div>
        </div>

    </div>
</div>


<div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-search"></i> Ma'lumotni yaratish (yangilash)</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="updateform">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Yopish</button>
            </div>
        </div>

    </div>
</div>


<?php
$url = Yii::$app->urlManager->createUrl(['/admin/category/lang']);
$url1 = Yii::$app->urlManager->createUrl(['/admin/category/page']);
$updateurl = Yii::$app->urlManager->createUrl(['/admin/category/update-form']);
$createurl = Yii::$app->urlManager->createUrl(['/admin/category/create-form']);
$this->registerJs("
$('#category-lang_id').change(function(){
    $.get('{$url}?id='+$('#category-lang_id').val()).done(function(data){
        $('#category-parent_id').empty();
        $('#category-parent_id').append(data);
    });
    $.get('{$url1}?id='+$('#category-lang_id').val()+'&st=true').done(function(data){
        $('#category-page_id').empty();
        $('#category-page_id').append(data);
    });
});

updatemodal = function(id){
    $.post('{$updateurl}?id='+id).done(function(data){
        if(data != 1){
            $('#updateform').empty();
            $('#updateform').append(data);
            
            $('#myModal1').modal();
        }else{
            alert('Bunday element mavjud emas');
        }
    })
    $('#myModal1').modal();
}

createmodal = function(parent_id){
    $.post('{$createurl}?parent_id='+parent_id).done(function(data){
        if(data != 1){
            $('#updateform').empty();
            $('#updateform').append(data);
            
            $('#myModal1').modal();
        }else{
            alert('Bunday element mavjud emas');
        }
    })
    $('#myModal1').modal();
}

");

$url1 = Yii::$app->urlManager->createUrl(['admin/category/status']);
$this->registerJs("
    statuschanger = function(id){
        $.get('{$url1}?id='+id).done(function(data){
            if(data==1){
            $('#alert-text').empty();
            $('#alert-text').append('Muvoffaqqiyatli <strong>Aktivlashtirildi</strong>');
                 $('#success-alert').fadeTo(2000, 500) . slideUp(500, function () {
        $('#success-alert').slideUp(500);
    });
            }else if(data == 0){
             $('#alert-text').empty();
            $('#alert-text').append('Muvoffaqqiyatli <strong>Deaktivlashtirildi</strong>');
                 $('#success-alert').fadeTo(2000, 500) . slideUp(500, function () {
        $('#success-alert').slideUp(500);
         });
            }else{
            $('#alert-text').empty();
            $('#alert-text').append('Amalni bajarishdagi <strong>Xatolik</strong>');
                 $('#success-alert').fadeTo(2000, 500) . slideUp(500, function () {
        $('#success-alert').slideUp(500);
         });
            }
        });
   }
   
   
$('#success-alert').hide();
  $('#myWish').click(function showAlert() {
    $('#success-alert').fadeTo(2000, 500) . slideUp(500, function () {
        $('#success-alert').slideUp(500);
    });
  });

")

?>


