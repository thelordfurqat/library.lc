<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
/** @var Book $mostviewed */
/** @var Book $latest */
?>
<script>
   var show_madall=function () {
   };
   var add_to_card=function () {
   }
</script>
<?php
$url = \yii\helpers\Url::to(['/site/get-book']);
$this->registerJs("
show_madall=function(code){

    $.get('{$url}?code='+code).done(function(data){
        $('#modalBody').empty();
        $('#modalBody').append(data);
        $('#modal').modal();
    })
}

add_to_card=function(code){
        alert('success');

    $.get('{$url}?code='+code).done(function(data){
        alert('success');
    })
}


    var goToCartIcon = function(addTocartBtn){
      var cartIcon = $(\".my-cart-icon\");
      var image = $('<img width=\"30px\" height=\"30px\" src=\"' + addTocartBtn.data(\"image\") + '\"/>').css({\"position\": \"fixed\", \"z-index\": \"999\"});
      addTocartBtn.prepend(image);
      var position = cartIcon.position();
      image.animate({
        top: position.top,
        left: position.left
      }, 500 , \"linear\", function() {
        image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function(addTocart){
        goToCartIcon(addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });  

")
?>

<?\yii\bootstrap\Modal::begin([
    'id'=>'modal',
    'header'=>false,
]) ?>
<div class="modalBody" id="modalBody">
</div>
<?php \yii\bootstrap\Modal::end();?>
<!--content-->

<div class="content-top ">
    <div class="container ">
        <div class="spec ">
            <h3>Eng mashhurlar</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <div class="tab-head ">
            <nav class="nav-sidebar">
                <ul class="nav tabs ">
                    <li class="active"><a href="#tab1" data-toggle="tab">Eng yaxshilar</a></li>
                    <li class=""><a href="#tab2" data-toggle="tab">Ko'p ko'rilganlar</a></li>
                    <li class=""><a href="#tab3" data-toggle="tab">Ko'p sotilganlar</a></li>
                </ul>
            </nav>
            <div class=" tab-content tab-content-t ">
                <div class="tab-pane active text-style" id="tab1">
                    <div class=" con-w3l">
                        <?
                        /** @var Book $mostliked */
                        foreach ($mostliked as $item) {?>
                            <div class="col-md-3 m-wthree">
                                <div class="col-m">
                                    <div href="#"  class="offer-img">
                                        <img onclick="show_madall('<?=$item->code?>')" src="/book-images/<?=$item->image?>" class="img-responsive" style="object-fit: cover; object-position: center;height: 220px;width: 180px;" alt="">
                                        <div class="offer"><p><span><?=$item->subject->name?></span></p></div>
                                    </div>
                                    <div class="mid-1">
                                        <div class="women">
                                            <h6><a href="<?=Yii::$app->urlManager->createUrl(['/book/view','code'=>$item->code])?>"><?=$item->name?></a></h6>
                                        </div>
                                        <div class="mid-2">
                                            <p ><?= $item->old_price ? '<label>'.$item->old_price.' sum</label>' : '' ?> <em class="item_price"><?=$item->price?> sum</em></p>
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="add">
                                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="<?=$item->code?>" data-name="<?=$item->name?>" data-summary="<?=$item->detail?>" data-price="<?=$item->price?>" data-quantity="1" data-image="/book-images/<?=$item->image?>">Add to Cart</button>
                                            <button class="btn btn-danger my-cart-btn my-cart-b" onclick="add_to_card('<?=$item->code?>')" data-code="<?=$item->code?>" >Savatga qo'shish</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?}?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab-pane  text-style" id="tab2">
                    <div class=" con-w3l">
                        <?

                        foreach ($mostviewed as $item) {?>
                            <div class="col-md-3 m-wthree">
                                <div class="col-m">
                                    <a class="offer-img">
                                        <img onclick="show_madall('<?=$item->code?>')"  src="/book-images/<?=$item->image?>" class="img-responsive" style="object-fit: cover; object-position: center;height: 220px;width: 180px;" alt="">
                                        <div class="offer"><p><span><?=$item->subject->name?></span></p></div>
                                    </a>
                                    <div class="mid-1">
                                        <div class="women">
                                            <h6><a href="<?=Yii::$app->urlManager->createUrl(['/book/view','code'=>$item->code])?>"><?=$item->name?></a></h6>
                                        </div>
                                        <div class="mid-2">
                                            <p ><?= $item->old_price ? '<label>'.$item->old_price.' sum</label>' : '' ?> <em class="item_price"><?=$item->price?> sum</em></p>
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="add">
                                            <button class="btn btn-danger my-cart-btn my-cart-b " data-code="<?=$item->code?>" >Savatga qo'shish</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?}?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab-pane  text-style" id="tab3">
                    <div class=" con-w3l">
                        <?
                        /** @var Book $mostseled */
                        foreach ($mostseled as $item) {?>
                            <div class="col-md-3 m-wthree">
                                <div class="col-m">
                                    <a class="offer-img">
                                        <img onclick="show_madall('<?=$item->code?>')"  src="/book-images/<?=$item->image?>" class="img-responsive" style="object-fit: cover; object-position: center;height: 220px;width: 180px;" alt="">
                                        <div class="offer"><p><span><?=$item->subject->name?></span></p></div>
                                    </a>
                                    <div class="mid-1">
                                        <div class="women">
                                            <h6><a href="<?=Yii::$app->urlManager->createUrl(['/book/view','code'=>$item->code])?>"><?=$item->name?></a></h6>
                                        </div>
                                        <div class="mid-2">
                                            <p ><?= $item->old_price ? '<label>'.$item->old_price.' sum</label>' : '' ?> <em class="item_price"><?=$item->price?> sum</em></p>
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="add">
                                            <button class="btn btn-danger my-cart-btn my-cart-b " data-code="<?=$item->code?>" >Savatga qo'shish</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?}?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<!--content-->
<div class="content-mid">
    <div class="container">
        <div class="spec ">
            <h3>Eng mashhur <span>Avtorlar</span></h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
<?foreach ($best3Authors as $author) {?>
    <div class="col-md-4 m-w3ls">
        <div class="col-md1 ">
            <a href="<?=\yii\helpers\Url::to(['/author','id'=>$item->id])?>" class="best-author">
                <img src="/authorspic/<?=$author->image?>" class="img-responsive" alt="" style="display: block">
                <div class="big-sa overlay" style="margin-top: 12em;">
                    <h6><?=$author->name?></h6>
<!--                    <h3>Season<span>ing </span></h3>-->
                    <p><i class="fa fa-book"></i> <?=sizeof($author->books)?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-thumbs-up"></i> <?=$author->likecounter?></p>
                </div>
            </a>
        </div>
    </div>
<?}?>
        <div class="clearfix"></div>
    </div>
</div>
<!--content-->
<!-- Carousel
  ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="kitchen.html"> <img class="first-slide" src="images/ba.jpg" alt="First slide"></a>

        </div>
        <div class="item">
            <a href="care.html"> <img class="second-slide " src="images/ba1.jpg" alt="Second slide"></a>

        </div>
        <div class="item">
            <a href="hold.html"><img class="third-slide " src="images/ba2.jpg" alt="Third slide"></a>

        </div>
    </div>

</div><!-- /.carousel -->

<!--content-->
<div class="product">
    <div class="container">
        <div class="spec ">
            <h3>So'ngi kiritilganlar</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <div class=" con-w3l">
            <?foreach ($latest as $item) {?>
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a class="offer-img">
                            <img onclick="show_madall('<?=$item->code?>')"  src="/book-images/<?=$item->image?>" class="img-responsive" style="object-fit: cover; object-position: center;height: 220px;width: 180px;" alt="">
                            <div class="offer"><p><span><?=$item->subject->name?></span></p></div>
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="<?=Yii::$app->urlManager->createUrl(['/book/view','code'=>$item->code])?>"><?=$item->name?></a></h6>
                            </div>
                            <div class="mid-2">
                                <p ><?= $item->old_price ? '<label>'.$item->old_price.' sum</label>' : '' ?> <em class="item_price"><?=$item->price?> sum</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b " data-code="<?=$item->code?>">Savatga qo'shish</button>
                            </div>

                        </div>
                    </div>
                </div>
            <?}?>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
