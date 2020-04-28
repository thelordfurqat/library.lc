<?php

/* @var $item app\models\User */
$url=\yii\helpers\Url::to(['/site/books', 'library' => $item->id]);
?>

<div class="products">
    <div class="product-list product">
        <div class="row product-list-row">
            <div class="col col-sm-3 col-lg-3">
                <div class="product-image">
                    <div class="image"><a href="<?= $url?>"> <img src="/library-images/<?=$item->image?>" alt=""></a> </div>
                </div>
                <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-9 col-lg-9">
                <div class="product-info">
                    <h3 class="name"><a href="<?=$url?>"><?=$item->name?></a></h3>
                    <div class="product-price">
                        <span class="price"> <?=$item->booksCount?> ta kitob</span>
                    </div>
                    <!-- /.product-price -->
                    <div class="description m-t-10">
                        Email: <?=$item->eMail?><br>
                        Telefon: <?=$item->phone?><br>
                        Manzil: <?=$item->address.', '.$item->district->name.', '.$item->region->name_lat.', '.$item->country->name?><br>
                    </div>
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <ul class="list-unstyled">
                                <li class="lnk"> <a class="add-to-cart" href="https://t.me/<?=$item->telegram_channel?>" title="Telegram kanal" target="_blank"> <i class="icon fa fa-paper-plane"></i> </a> </li>
                                <li class="lnk"> <a class="add-to-cart" href="https://instagram.com/<?=$item->instagram?>" title="Instagram" target="_blank"> <i class="icon fa fa-instagram"></i> </a> </li>
                                <li class="lnk"> <a class="add-to-cart" href="https://t.me/<?=$item->telegram_username?>" title="Murojaat" target="_blank"> <i class="icon fa fa-envelope"></i> </a> </li>
                            </ul>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->

                </div>
                <!-- /.product-info -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.product-list-row -->
    </div>
    <!-- /.product-list -->
</div>
<!-- /.products -->
