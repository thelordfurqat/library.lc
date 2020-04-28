<?php

use app\models\Book;
use yii\helpers\Url;


$session=Yii::$app->session;
if(!$session->get('books')){
    $books = Book::find()->where(['user_id' => -1])->all();
    $session->set('books',$books);
}
$books=$session->get('books');
$total_price=0;
$total_count=0;
foreach ($books as $item) {
    $total_price+=$item->price*$item->count;
    $total_count+=$item->count;
}
?>
<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown" id="dropdown_card">
    <div class="items-cart-inner">
        <div class="basket">
            <div class="basket-item-count"><span class="count"><?=$total_count?></span></div>
            <div class="total-price-basket"><span class="lbl">Savat</span> <span
                        class="value"><?=$total_count? $total_price.' sum':'Kitoblar yo\'q'?></span> </span> </div>
        </div>
    </div>
</a>
<?if($total_count):?>

<ul class="dropdown-menu">
    <li>
        <? foreach ($books as $book):?>

            <div id="id<?=$book->code?>">
                <div class="cart-item product-summary">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="image"><a href="<?=Url::to(['/site/bookview','code'=>$book->code])?>"><img
                                            src="/book-images/<?=$book->image?>" alt=""></a></div>
                        </div>
                        <div class="col-xs-7">
                            <h3 class="name"><a href="<?=Url::to(['/site/bookview','code'=>$book->code])?>"><?=$book->name?></a></h3>
                            <div class="price"><?=$book->price.' sum x'.$book->count?></div>
                        </div>
                        <div class="col-xs-1 action"><a onclick="delete_from_card('<?=$book->code?>')"><i class="fa fa-trash"></i></a></div>
                    </div>
                </div>
                <hr>
            </div>

        <?endforeach;?>
        <!-- /.cart-item -->

        <div class="clearfix cart-total">
            <div class="pull-right"><span class="text">Jami summa :</span><span
                        class='price'><?=$total_price.' sum'?></span></div>
            <div class="clearfix"></div>
            <a href="<?=Url::to(['/site/card'])?>" class="btn btn-upper btn-primary btn-block m-t-20">Buyurtma berish</a>
        </div>
        <!-- /.cart-total-->

    </li>
</ul>
<?endif;?>

<!-- /.dropdown-menu-->
