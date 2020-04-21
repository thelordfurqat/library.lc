<?php

/* @var $item app\models\News */

?>

<div class="products">
    <div class="product-list product">
        <div class="row product-list-row">
            <div class="col col-sm-3 col-lg-3">
                <div class="product-image">
                    <div class="image"><a href="<?= \yii\helpers\Url::to(['view', 'code' => $item->code]) ?>"> <img src="/uploads/<?=$item->image?>" alt=""></a> </div>
                </div>
                <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-9 col-lg-9">
                <div class="product-info">
                    <h3 class="name"><a href="<?=\yii\helpers\Url::to(['view', 'code' => $item->code])?>"><?=$item->name?></a></h3>
                    <div class="product-price">
                        <span class="price"><i class="fa fa-calendar"></i> <?=Yii::$app->formatter->asDate($item->created)?></span>
                    </div>
                    <!-- /.product-price -->
                    <div class="description m-t-10">
                        <p><?=mb_substr($item->preview,0,650,'utf8')?>
                        </p>
                        <a href="<?= \yii\helpers\Url::to(['view', 'code' => $item->code]) ?>">Batafsil</a>
                    </div>
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <ul class="list-unstyled">
                                <li class="lnk"> <a class="add-to-cart" href="https://t.me/share/url?url=<?=\yii\helpers\Url::base(true).Yii::$app->urlManager->createUrl(['/site/view','code'=>$item->code])?>" title="Telegram kanal" target="_blank"> <i class="icon fa fa-paper-plane"></i> </a> </li>
                                <li class="lnk"> <a class="add-to-cart" href="http://www.facebook.com/sharer.php?u=<?=\yii\helpers\Url::base(true).Yii::$app->urlManager->createUrl(['/site/view','code'=>$item->code])?>" title="Facebook" target="_blank"> &nbsp;<i class="icon fa fa-facebook"></i> &nbsp;</a> </li>
                            </ul>
                        </div>
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
