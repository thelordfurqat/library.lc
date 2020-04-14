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

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-vs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <?=$this->render('_quick_categories')?>



            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        <?if($carusel1):?>
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
                        <?endif;?>
                        <?if($carusel2):?>
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
                        <?endif;?>
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
                                if($key>=6)
                                    break;
                                ?>

                                <div class="item item-carousel">
                                    <?=$this->render('_product',['item'=>$item])?>
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
                                        <?=$this->render('_product',['item'=>$item])?>
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
                                            <?=$this->render('_product',['item'=>$item])?>
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
                                            <?=$this->render('_product',['item'=>$item])?>
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
                                    <?=$this->render('_product',['item'=>$item])?>
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
                                    <h3 class="name"><a href="<?=$url?>"><?=mb_substr($item->name,0,43,'utf8')?><?=strlen($item->name)>43?'...':''?></a></h3>
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
                            <?=$this->render('_product',['item'=>$item])?>
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

    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->

