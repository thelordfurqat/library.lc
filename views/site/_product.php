<?php


use yii\helpers\Url;

/** @var \app\models\Book $item */
$url=Url::to(['/site/bookview','code'=>$item->code]);
$status='';
$date1 = new DateTime($item->created);
$date2 = new DateTime('now'.' UTC +5');
$diff = $date2->diff($date1);
if($diff->days<=7){
    $status='New';
    $class='new';
}
elseif($item->show_counter>=100){
    $status='Top';
    $class='sale';
}
elseif($item->sales>=100){
    $status='Hot';
    $class='hot';
}
if($item->old_price>$item->price){
    $status=(100 - (int)($item->price * 100 / $item->old_price)).'%';
    $class='hot';
}
 ?>
<div class="products">
    <div class="product">
        <div class="product-image">
            <div class="image">
                <a href="<?=$url?>">
                    <img src="/book-images/<?=$item->image?>" alt="">
                </a>
            </div>
            <!-- /.image -->

            <?=$status?'<div class="tag '.$class.'"><span>'.$status.'</span></div>':''?>
            <?=$item->arenda? '<div class="tag new" title="Kitob turi: Elektron" style="left: 14px; color: white; font-size: 150%"><span><i class="fa fa-edge"></i></span></div>' :'<div class="tag sale" title="Kitob turi: Bosma" style="left: 14px; color: white;font-size: 150%"><span><i class="fa fa-book"></i></span></div>'?>
        </div>
        <!-- /.product-image -->

        <div class="product-info text-left">
            <h3 class="name"><a href="<?=$url?>"><?=$item->name?></a></h3>
            <!--                                                <div class="rating rateit-small"></div>-->
            <div style="min-height: 18px" class="description"><?=getAuthors($item->authors)?></div>
            <div class="product-price"> <span class="price" <?=$item->price?'':'style="color: green"'?>> <?=$item->price?$item->price.' so`m':'Bepul'?></span> <?if((int)$item->old_price > (int)$item->price )echo '<span style="color: #8c0615 !important;" class="price-before-discount">'.$item->old_price.' so`m</span>'?> </div>
            <!-- /.product-price -->

        </div>
        <!-- /.product-info -->
        <div class="cart clearfix animate-effect">
            <div class="action">
                <ul class="list-unstyled">
                    <li class="add-cart-button btn-group">
                        <button onclick="add_to_card('<?=$item->code?>')" data-toggle="tooltip" class="btn btn-primary icon" type="button" title="<?=$item->arenda && !$item->price?'Yuklash':'Savatga'?>"> <i class="fa fa-<?=$item->arenda && !$item->price?'download':'shopping-cart'?>"></i> </button>
                        <button onclick="add_to_card('<?=$item->code?>')" class="btn btn-primary cart-btn" type="button"><?=$item->arenda && !$item->price?'Yuklash':'Savatga'?></button>
                    </li>
                    <li class="add-cart-button btn-group">
                        <button onclick="add_to_wishlist('<?=$item->code?>')" data-toggle="tooltip" class="btn btn-primary icon text-red" type="button" title="Saralanganlarga"> <i class="fa fa-heart"></i> </button>
                        <button onclick="add_to_wishlist('<?=$item->code?>')" class="btn btn-primary cart-btn" type="button">Saralanganlarga</button>
                    </li>
                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="<?=$url?>" title="Ko`rish"> <i class="fa fa-eye" aria-hidden="true"></i> </a> </li>
                </ul>
            </div>
            <!-- /.action -->
        </div>
        <!-- /.cart -->
    </div>
    <!-- /.product -->

</div>
