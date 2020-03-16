<?php
?>
<div class="modal-body modal-spa">
    <div class="col-md-5 span-2">
        <div class="item">
            <img src="/book-images/<?=$model->image?>" class="img-responsive" alt="">
        </div>
    </div>
    <div class="col-md-7 span-1 ">
        <h3><a href="<?= \yii\helpers\Url::to(['/site/book-view', 'code' => $model->code]) ?>"><?=$model->name?></a></h3>
        <p class="in-para"> Avtorlar: <?=getAuthors($model->authors) ?></p>
        <div class="price_single">
            <span class="reducedfrom "><?=$model->old_price?'<del>'.$model->old_price.' sum</del>':''?> <?=$model->price?> sum</span>

            <div class="clearfix"></div>
        </div>
        <h4 class="quick">Qisqacha:</h4>
        <p class="quick_desc"> <?=$model->detail?></p>
        <div class="add-to">
            <button class="btn btn-danger my-cart-btn my-cart-bbbb" data-code="<?=$model->code?>" >Savatga qo'shish</button>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
