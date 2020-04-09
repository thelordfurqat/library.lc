<?php
use yii\helpers\Url;
/** @var \app\models\Book $mostliked */
/** @var \app\models\Book $mostviewed */
/** @var \app\models\Book $mostseled */
/** @var \app\models\Book $latest */
/** @var \app\models\Author $best3Authors */
/** @var \app\models\Genre $genres */
/** @var \app\models\Subject $subjects */
/** @var \app\models\Publisher $publishers */
/** @var \app\models\Region $regions */
/** @var \app\models\News $latest_news */

$carusel1 = \app\models\Adds::find()->where(['type' => 'carusel1'])->andWhere(['status' => 1])->orderBy(['oder' => SORT_DESC])->one();
$carusel2 = \app\models\Adds::find()->where(['type' => 'carusel2'])->andWhere(['status' => 1])->orderBy(['oder' => SORT_DESC])->one();
$home1 = \app\models\Adds::find()->where(['type' => 'home1'])->andWhere(['status' => 1])->orderBy(['oder' => SORT_DESC])->limit(3)->all();
$home2 = \app\models\Adds::find()->where(['type' => 'home2'])->andWhere(['status' => 1])->orderBy(['oder' => SORT_DESC])->limit(3)->all();
?>
<script>
    add_to_card=function (code) {
        alert(code);
    };
    add_to_wishlist=function (code) {
        alert(code);
    }
</script>
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-vs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Qandaydir so'z</div>
                    <nav class="yamm megamenu-horizontal">
                        <ul class="nav">
                            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-heart" aria-hidden="true"></i>Sevimli kitoblar</a>
                                <ul class="dropdown-menu mega-menu" style="min-width: fit-content">
                                    <li class="yamm-content">
                                        <div class="row">
                                            <?if((int)(sizeof($mostliked)/8))
                                            $class=(int)(12/(sizeof($mostliked)/8));
                                            else $class=12;?>
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?

                                                    foreach ($mostliked as $i=>$item) :
                                                        if(!(($i)%8) && $i):?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                            <?endif;?>
                                                        <li><a href="<?=Url::to(['/site/bookview','code'=>$item->code])?>"><?=$item->name?></a></li>
                                                    <?endforeach;?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- /.yamm-content -->
                                </ul>
                            </li>
                            <!-- /.menu-item -->
                            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-eye" aria-hidden="true"></i>Ko'p ko'rilgan kitoblar</a>
                                <ul class="dropdown-menu mega-menu"  style="min-width: max-content">
                                    <li class="yamm-content">
                                        <div class="row">
                                            <?if((int)(sizeof($mostviewed)/8))
                                                $class=(int)(12/(sizeof($mostviewed)/8));
                                            else $class=12;?>
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?

                                                    foreach ($mostviewed as $i=>$item) :
                                                    if(!(($i)%8) && $i):?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                            <?endif;?>
                                                        <li><a href="<?=Url::to(['/site/bookview','code'=>$item->code])?>"><?=$item->name?></a></li>
                                                    <?endforeach;?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- /.yamm-content -->
                                </ul>
                            </li>
                            <!-- /.menu-item -->
                            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>Ko'p sotilgan kitoblar</a>
                                <ul class="dropdown-menu mega-menu"  style="min-width: max-content">
                                    <li class="yamm-content">
                                        <div class="row">
                                            <?if((int)(sizeof($mostseled)/8))
                                                $class=(int)(12/(sizeof($mostseled)/8));
                                            else $class=12;?>
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?

                                                    foreach ($mostseled as $i=>$item) :
                                                    if(!(($i)%8) && $i):?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?endif;?>
                                                    <li><a href="<?=Url::to(['/site/bookview','code'=>$item->code])?>"><?=$item->name?></a></li>
                                                    <?endforeach;?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- /.yamm-content -->
                                </ul>
                            </li>
                            <!-- /.menu-item -->
                            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-clock-o" aria-hidden="true"></i>Eng yangi kitoblar</a>
                                <ul class="dropdown-menu mega-menu"  style="min-width: max-content">
                                    <li class="yamm-content">
                                        <div class="row">
                                            <?if((int)(sizeof($latest)/8))
                                                $class=(int)(12/(sizeof($latest)/8));
                                            else $class=12;?>
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?

                                                    foreach ($latest as $i=>$item) :
                                                    if(!(($i+1)%8)):?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?endif;?>
                                                    <li><a href="<?=Url::to(['/site/bookview','code'=>$item->code])?>"><?=$item->name?></a></li>
                                                    <?endforeach;?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- /.yamm-content -->
                                </ul>
                            </li>
                            <!-- /.menu-item -->
                           <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-bookmark" aria-hidden="true"></i>Janrlar</a>
                                <ul class="dropdown-menu mega-menu"  style="min-width: max-content">
                                    <li class="yamm-content">
                                        <div class="row">
                                            <?if((int)(sizeof($genres)/8))
                                                $class=(int)(12/(sizeof($genres)/8));
                                            else $class=12;?>
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?

                                                    foreach ($genres as $i=>$item) :
                                                    if(!(($i)%8) && $i):?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?endif;?>
                                                    <li><a href="<?=Url::to(['/site/books','genre'=>$item->name])?>"><?=$item->name?></a></li>
                                                    <?endforeach;?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- /.yamm-content -->
                                </ul>
                            </li>
                            <!-- /.menu-item -->
                           <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-book" aria-hidden="true"></i>Fanlar</a>
                                <ul class="dropdown-menu mega-menu"  style="min-width: max-content">
                                    <li class="yamm-content">
                                        <div class="row">
                                            <?if((int)(sizeof($subjects)/8))
                                                $class=(int)(12/(sizeof($subjects)/8));
                                            else $class=12;?>
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?

                                                    foreach ($subjects as $i=>$item) :
                                                    if(!(($i+1)%8)):?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?endif;?>
                                                    <li><a href="<?=Url::to(['/site/books','subject'=>$item->name])?>"><?=$item->name?></a></li>
                                                    <?endforeach;?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- /.yamm-content -->
                                </ul>
                            </li>
                            <!-- /.menu-item -->
                           <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-building" aria-hidden="true"></i>Nashriyotlar</a>
                                <ul class="dropdown-menu mega-menu"  style="min-width: max-content">
                                    <li class="yamm-content">
                                        <div class="row">
                                            <?if((int)(sizeof($publishers)/8))
                                                $class=(int)(12/(sizeof($publishers)/8));
                                            else $class=12;?>
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?

                                                    foreach ($publishers as $i=>$item) :
                                                    if(!(($i+1)%8)):?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?endif;?>
                                                    <li><a href="<?=Url::to(['/site/books','publisher'=>$item->name])?>"><?=$item->name?></a></li>
                                                    <?endforeach;?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- /.yamm-content -->
                                </ul>
                            </li>
                            <!-- /.menu-item -->
                           <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-map-marker" aria-hidden="true"></i>Viloyatlar</a>
                                <ul class="dropdown-menu mega-menu" style="min-width: max-content">
                                    <li class="yamm-content">
                                        <div class="row">
                                            <?if((int)(sizeof($regions)/8))
                                                $class=(int)(12/(sizeof($regions)/8));
                                            else $class=12;?>
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?

                                                    foreach ($regions as $i=>$item) :
                                                    if(!(($i)%8) && $i!=0):?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-12 col-md-<?=$class?>">
                                                <ul class="links list-unstyled">
                                                    <?endif;?>
                                                    <li><a href="<?=Url::to(['/site/books','region'=>$item->name_lat])?>"><?=$item->name_lat?></a></li>
                                                    <?endforeach;?>
                                                </ul>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- /.yamm-content -->
                                </ul>
                            </li>
                            <!-- /.menu-item -->

                        </ul>
                        <!-- /.nav -->
                    </nav>
                    <!-- /.megamenu-horizontal -->
                </div>
                <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->



            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        <div class="item" style="background-image: url(/adds/<?=$carusel1->image?>);">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">
<!--                                    <div class="slider-header fadeInDown-1">Top Brands</div>-->
                                    <div class="big-text fadeInDown-1"> <?=$carusel1->header?> </div>
                                    <div class="excerpt fadeInDown-2 hidden-xs"> <span><?=$carusel1->detail?></span> </div>
                                    <div class="button-holder fadeInDown-3"> <a href="<?=$carusel1->url?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Batafsil</a> </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->

                        <div class="item" style="background-image: url(/adds/<?=$carusel2->image?>);">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">
<!--                                    <div class="slider-header fadeInDown-1">Spring 2018</div>-->
                                    <div class="big-text fadeInDown-1"> <?=$carusel2->header?> </div>
                                    <div class="excerpt fadeInDown-2 hidden-xs"> <span><?=$carusel2->detail?></span> </div>
                                    <div class="button-holder fadeInDown-3"> <a href="<?=$carusel2->url?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Batafsil</a> </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->

                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->

            </div>

        </div>
        <!-- /.row -->
        <div class="row">
        <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-12">

            <!-- ============================================== SCROLL TABS ============================================== -->
            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
                <div class="more-info-tab clearfix ">
                    <h3 class="new-product-title pull-left">Eng yangi kitoblar</h3>
                    <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                        <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">Barchasi</a></li>
                        <?if($best3Authors[0]):?>
                        <li><a data-transition-type="backSlide" href="#baone" data-toggle="tab"><?=$best3Authors[0]->name?></a></li>
                        <?endif;?>
                        <?if($best3Authors[1]):?>
                        <li><a data-transition-type="backSlide" href="#batwo" data-toggle="tab"><?=$best3Authors[1]->name?></a></li>
                        <?endif;?>
                        <?if($best3Authors[2]):?>
                        <li><a data-transition-type="backSlide" href="#bathree" data-toggle="tab"><?=$best3Authors[2]->name?></a></li>
                        <?endif;?>
                    </ul>
                    <!-- /.nav-tabs -->
                </div>
                <div class="tab-content outer-top-xs">
                    <div class="tab-pane in active" id="all">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                <?foreach($latest as $key=>$item):
                                    $url=Url::to(['/site/bookview','code'=>$item->code]);
                                if($key>=6)
                                    break;
                                ?>

                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="<?=$url?>">
                                                        <img src="/book-images/<?=$item->image?>" alt="">
                                                    </a>
                                                </div>
                                                <!-- /.image -->

                                                <div class="tag new"><span>Yangi</span></div>
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="<?=$url?>"><?=$item->name?></a></h3>
<!--                                                <div class="rating rateit-small"></div>-->
                                                <div class="description"><?=getAuthors($item->authors)?></div>
                                                <div class="product-price"> <span class="price" <?=$item->price?'':'style="color: green"'?>> <?=$item->price?$item->price.' so`m':'Bepul'?></span> <?=$item->old_price?'<span style="color: #8c0615 !important;" class="price-before-discount">'.$item->old_price.' so`m</span>':''?> </div>
                                                <!-- /.product-price -->

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button onclick="add_to_card('<?=$item->code?>')" data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Savatga"> <i class="fa fa-shopping-cart"></i> </button>
                                                            <button onclick="add_to_card('<?=$item->code?>')" class="btn btn-primary cart-btn" type="button">Savatga</button>
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
                                    <!-- /.products -->
                                </div>
                                <!-- /.item -->
                                <?endforeach;?>

                            </div>
                            <!-- /.home-owl-carousel -->
                        </div>
                        <!-- /.product-slider -->
                    </div>
                    <!-- /.tab-pane -->
                    <?if($best3Authors[0]):?>
                    <div class="tab-pane" id="baone">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                <?$key=0; for ($i=sizeof($best3Authors[0]->books)-1;$i>=0;$i--):
                                if($key>=6)
                                    break;
                                $item=$best3Authors[0]->books[$i];
                                    $url=Url::to(['/site/bookview','code'=>$item->code]);
                                    if($key>=6)
                                        break;
                                    ?>

                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="<?=$url?>">
                                                            <img src="/book-images/<?=$item->image?>" alt="">
                                                        </a>
                                                    </div>
                                                    <!-- /.image -->

                                                    <div class="tag new"><span>Yangi</span></div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="<?=$url?>"><?=$item->name?></a></h3>
                                                    <!--                                                <div class="rating rateit-small"></div>-->
                                                    <div class="description"><?=getAuthors($item->authors)?></div>
                                                    <div class="product-price"> <span class="price" <?=$item->price?'':'style="color: green"'?>> <?=$item->price?$item->price.' so`m':'Bepul'?></span> <?=$item->old_price?'<span style="color: #8c0615 !important;" class="price-before-discount">'.$item->old_price.' so`m</span>':''?> </div>
                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button onclick="add_to_card('<?=$item->code?>')" data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Savatga"> <i class="fa fa-shopping-cart"></i> </button>
                                                                <button onclick="add_to_card('<?=$item->code?>')" class="btn btn-primary cart-btn" type="button">Savatga</button>
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
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                <?endfor;?>

                            </div>
                            <!-- /.home-owl-carousel -->
                        </div>
                        <!-- /.product-slider -->
                    </div>
                    <!-- /.tab-pane -->
                    <?endif;?>
                    <?if($best3Authors[1]):?>
                        <div class="tab-pane" id="batwo">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                    <?$key=0; for ($i=sizeof($best3Authors[1]->books)-1;$i>=0;$i--):
                                        if($key>=6)
                                            break;
                                        $item=$best3Authors[1]->books[$i];
                                        $url=Url::to(['/site/bookview','code'=>$item->code]);
                                        if($key>=6)
                                            break;
                                        ?>

                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="<?=$url?>">
                                                                <img src="/book-images/<?=$item->image?>" alt="">
                                                            </a>
                                                        </div>
                                                        <!-- /.image -->

                                                        <div class="tag new"><span>Yangi</span></div>
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="<?=$url?>"><?=$item->name?></a></h3>
                                                        <!--                                                <div class="rating rateit-small"></div>-->
                                                        <div class="description"><?=getAuthors($item->authors)?></div>
                                                        <div class="product-price"> <span class="price" <?=$item->price?'':'style="color: green"'?>> <?=$item->price?$item->price.' so`m':'Bepul'?></span> <?=$item->old_price?'<span style="color: #8c0615 !important;" class="price-before-discount">'.$item->old_price.' so`m</span>':''?> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button onclick="add_to_card('<?=$item->code?>')" data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Savatga"> <i class="fa fa-shopping-cart"></i> </button>
                                                                    <button onclick="add_to_card('<?=$item->code?>')" class="btn btn-primary cart-btn" type="button">Savatga</button>
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
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.item -->
                                    <?endfor;?>

                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                    <?endif;?>
                    <?if($best3Authors[2]):?>
                        <div class="tab-pane" id="bathree">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                    <?$key=0; for ($i=sizeof($best3Authors[2]->books)-1;$i>=0;$i--):
                                        if($key>=6)
                                            break;
                                        $item=$best3Authors[2]->books[$i];
                                        $url=Url::to(['/site/bookview','code'=>$item->code]);
                                        if($key>=6)
                                            break;
                                        ?>

                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="<?=$url?>">
                                                                <img src="/book-images/<?=$item->image?>" alt="">
                                                            </a>
                                                        </div>
                                                        <!-- /.image -->

                                                        <div class="tag new"><span>Yangi</span></div>
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="<?=$url?>"><?=$item->name?></a></h3>
                                                        <!--                                                <div class="rating rateit-small"></div>-->
                                                        <div class="description"><?=getAuthors($item->authors)?></div>
                                                        <div class="product-price"> <span class="price" <?=$item->price?'':'style="color: green"'?>> <?=$item->price?$item->price.' so`m':'Bepul'?></span> <?=$item->old_price?'<span style="color: #8c0615 !important;" class="price-before-discount">'.$item->old_price.' so`m</span>':''?> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button onclick="add_to_card('<?=$item->code?>')" data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Savatga"> <i class="fa fa-shopping-cart"></i> </button>
                                                                    <button onclick="add_to_card('<?=$item->code?>')" class="btn btn-primary cart-btn" type="button">Savatga</button>
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
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.item -->
                                    <?endfor;?>

                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                    <?endif;?>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.scroll-tabs -->
            <!-- ============================================== SCROLL TABS : END ============================================== -->
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners outer-bottom-xs">
                <div class="row">
                    <? foreach ($home1 as $item):
                        $url=$item->url;
                        ?>

                    <div class="col-md-4 col-sm-4">
                        <div class="wide-banner cnt-strip">
                            <div class="image"><a href="<?=$url?>"><img class="img-responsive" src="/adds/<?=$item->image?>" alt=""></a>  </div>
                        </div>
                        <!-- /.wide-banner -->
                    </div>
                    <?endforeach;?>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.wide-banners -->

            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section featured-product">
                <div class="row">
                    <div class="col-lg-3">
                        <h3 class="section-title">Janrlar & Yo`nalishlar</h3>
                        <ul class="sub-cat">
                            <?foreach ($genres as $key=>$item):
                                if($key>10)
                                    break;
                                $url=Url::to(['/site/books','genre'=>$item->name]);
                                ?>
                            <li><a href="<?=$url?>"><?= mb_substr($item->name,0,40,'utf8')?></a><small class="pull-right" style="margin-right: 15px">(<?=sizeof($item->books)?>)</small></li>
                            <?endforeach;?>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="owl-carousel homepage-owl-carousel custom-carousel owl-theme outer-top-xs">
                            <?foreach($mostviewed as $key=>$item):
                                $url=Url::to(['/site/bookview','code'=>$item->code]);
                                if($key>=6)
                                    break;
                                ?>

                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="<?=$url?>">
                                                        <img src="/book-images/<?=$item->image?>" alt="">
                                                    </a>
                                                </div>
                                                <!-- /.image -->

                                                <div class="tag sale"><span>Top</span></div>
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="<?=$url?>"><?=$item->name?></a></h3>
                                                <!--                                                <div class="rating rateit-small"></div>-->
                                                <div class="description"><?=getAuthors($item->authors)?></div>
                                                <div class="product-price"> <span class="price" <?=$item->price?'':'style="color: green"'?>> <?=$item->price?$item->price.' so`m':'Bepul'?></span> <?=$item->old_price?'<span style="color: #8c0615 !important;" class="price-before-discount">'.$item->old_price.' so`m</span>':''?> </div>
                                                <!-- /.product-price -->

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button onclick="add_to_card('<?=$item->code?>')" data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Savatga"> <i class="fa fa-shopping-cart"></i> </button>
                                                            <button onclick="add_to_card('<?=$item->code?>')" class="btn btn-primary cart-btn" type="button">Savatga</button>
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
                                    <!-- /.products -->
                                </div>
                                <!-- /.item -->
                            <?endforeach;?>

                        </div>
                    </div>
                </div>
                <!-- /.home-owl-carousel -->
            </section>
            <!-- /.section -->
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners outer-bottom-xs">
                    <div class="row">
                        <? foreach ($home2 as $item):
                            $url=$item->url;
                            ?>

                            <div class="col-md-4 col-sm-4">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"><a href="<?=$url?>"><img class="img-responsive" src="/adds/<?=$item->image?>" alt=""></a>  </div>
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                        <?endforeach;?>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->



            <!-- /.sidebar-widget -->
            <!-- ============================================== BEST SELLER : END ============================================== -->

            <!-- ============================================== BLOG SLIDER ============================================== -->
            <section class="section latest-blog outer-bottom-vs">
                <h3 class="section-title">So`ngi yangliklar</h3>
                <div class="blog-slider-container outer-top-xs">
                    <div class="owl-carousel blog-slider custom-carousel">
                        <?foreach ($latest_news as $item):
                            $url=Url::to(['site/view','code'=>$item->code])
                            ?>
                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <div class="image"> <a href="<?=$url?>"><img src="/uploads/<?=$item->image?>" alt=""></a> </div>
                                </div>
                                <!-- /.blog-post-image -->

                                <div class="blog-post-info text-left">
                                    <h3 class="name"><a href="#"><?=mb_substr($item->name,0,43,'utf8')?><?=strlen($item->name)>43?'...':''?></a></h3>
                                    <span class="info"><?=$item->author->name?> &nbsp;|&nbsp; <?= Yii::$app->formatter->asDate($item->created);?> </span>
                                    <p class="text"><?=mb_substr(strip_tags($item->preview),0,180,'utf8')?><?=strlen(strip_tags($item->preview))>180?'...':''?></p>
                                </div>
                                <!-- /.blog-post-info -->

                            </div>
                            <!-- /.blog-post -->
                        </div>
                        <!-- /.item -->
                        <?endforeach;?>
                    </div>
                    <!-- /.owl-carousel -->
                </div>
                <!-- /.blog-slider-container -->
            </section>
            <!-- /.section -->
            <!-- ============================================== BLOG SLIDER : END ============================================== -->

            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section new-arriavls">
                <h3 class="section-title">Ommabop kitoblar</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                    <?foreach($mostseled as $key=>$item):
                        $url=Url::to(['/site/bookview','code'=>$item->code]);
                        if($key>=6)
                            break;
                        ?>

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="<?=$url?>">
                                                <img src="/book-images/<?=$item->image?>" alt="">
                                            </a>
                                        </div>
                                        <!-- /.image -->

                                        <div class="tag hot"><span>Hot</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="<?=$url?>"><?=$item->name?></a></h3>
                                        <!--                                                <div class="rating rateit-small"></div>-->
                                        <div class="description"><?=getAuthors($item->authors)?></div>
                                        <div class="product-price"> <span class="price" <?=$item->price?'':'style="color: green"'?>> <?=$item->price?$item->price.' so`m':'Bepul'?></span> <?=$item->old_price?'<span style="color: #8c0615 !important;" class="price-before-discount">'.$item->old_price.' so`m</span>':''?> </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button onclick="add_to_card('<?=$item->code?>')" data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Savatga"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button onclick="add_to_card('<?=$item->code?>')" class="btn btn-primary cart-btn" type="button">Savatga</button>
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
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                    <?endforeach;?>
                </div>
                <!-- /.home-owl-carousel -->
            </section>
            <!-- /.section -->
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->


        </div>
        </div>
        <!-- /.homebanner-holder -->
        <!-- ============================================== CONTENT : END ============================================== -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider">
            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <?foreach ($partners as $item):
                        $url=Url::to(['/site/view','code'=>$item->code]);
                        ?>
                    <div class="item m-t-15"> <a href="<?=$url?>" class="image"> <img data-echo="/uploads/<?=$item->image?>" src="/uploads/<?=$item->image?>" title="<?=$item->name?>" alt=""> </a> </div>
                    <?endforeach;?>
                    <!--/.item-->
                </div>
                <!-- /.owl-carousel #logo-slider -->
            </div>
            <!-- /.logo-slider-inner -->

        </div>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->

