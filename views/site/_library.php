<?php

/* @var $item app\models\User */

?>

<div class="products">
    <div class="product-list product">
        <div class="row product-list-row">
            <div class="col col-sm-3 col-lg-3">
                <div class="product-image">
                    <div class="image"> <img src="/profile/<?=$item->image?>" alt=""> </div>
                </div>
                <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-9 col-lg-9">
                <div class="product-info">
                    <h3 class="name"><a href="detail.html"><?=$item->name?></a></h3>
                    <div class="product-price"> <span class="price"> <?=$item->books_count?> </span>
                        <?if($item->new_books_count):?><span class="price" style="color: green" > + <?=$item->new_books_count?></span><?endif;?>
                        <span class="price">ta kitob</span>  </div>
                    <!-- /.product-price -->
                    <div class="description m-t-10">
                        Email: <?=$item->email?><br>
                        Telefon: <?=$item->phone?><br>
                        Manzil: <?=$item->address.', '.$item->district->name.', '.$item->region->name_lat.', '.$item->country->name?><br>
                    </div>
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary card-btn" data-toggle="dropdown" type="button"> <i class="fa fa-paper-plane"></i> </button>
                                </li>
                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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
        <div class="tag new"><span>new</span></div>
    </div>
    <!-- /.product-list -->
</div>
<!-- /.products -->
