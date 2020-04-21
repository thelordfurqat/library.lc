<?php
/* @var $model app\models\Book */
$labels=$model->attributeLabels();

use app\models\Book;
use yii\helpers\Url; ?>
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
                <?=$this->render('_left_side')?>
            </div><!-- /.sidebar -->
            <div class='col-xs-12 col-sm-12 col-md-9 rht-col'>
                <div class="detail-block">
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">
                                    <div class="single-product-gallery-item">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                           href="/book-images/<?=$model->image?>">
                                            <img class="img-responsive" alt="" src="/book-images/<?=$model->image?>"/>
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->


                                </div><!-- /.single-product-slider -->



                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->
                        <div class='col-sm-12 col-md-8 col-lg-8 product-info-block'>
                            <div class="product-info">
                                <h1 class="name"><?=$model->name?></h1>

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="pull-left">
                                                <div class="reviews">
                                                    <a class="lnk"><i class="fa fa-calendar"> <?=Yii::$app->formatter->asDate($model->created)?></i></a>
                                                    <a class="lnk"><i class="fa fa-dollar"> <?=$model->sales?></i></a>
                                                    <a class="lnk"><i class="fa fa-heart"> <?=$model->like_counter?></i></a>
                                                    <a class="lnk"><i class="fa fa-eye"> <?=$model->show_counter?></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->



                                <div class="description-container m-t-20">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p> <b>Kitob turi:</b> <?=$model->arenda?'Elektron':'Bosma'?></p>
                                            <?if(getGenres($model->genres)):?><p> <b>Janr:</b> <?=getGenres($model->genres)?></p><?endif;?>
                                            <?if(getAuthors($model->authors)):?><p><b> Avtor:</b> <?=getAuthors($model->authors)?></p><?endif;?>
                                            <?if($model->subject->name):?><p> <b> Fan:</b> <?=$model->subject->name?></p><?endif;?>
                                            <?if($model->publisher->name):?><p> <b>Nashriyot:</b> <?=$model->publisher->name?></p><?endif;?>
                                            <?if($model->page_size):?><p> <b><?=$labels['page_size']?>:</b> <?=$model->page_size?></p><?endif;?>
                                            <?if($model->isbn_code):?><p> <b><?=$labels['isbn_code']?>:</b> <?=$model->isbn_code?></p><?endif;?>
                                        </div>
                                        <div class="col-lg-6">
                                            <?if($model->year):?><p> <b><?=$labels['year']?>:</b> <?=$model->year?></p><?endif;?>
                                            <?if($model->size):?><p> <b><?=$labels['size']?>:</b> <?=$model->size?></p><?endif;?>
                                            <?if($model->muqova):?><p> <b><?=$labels['muqova']?>:</b> <?=$model->muqova?></p><?endif;?>
                                            <?if($model->made_in):?><p> <b><?=$labels['made_in']?>:</b> <?=$model->made_in?></p><?endif;?>
                                            <?if($model->made_date):?><p> <b><?=$labels['made_date']?>:</b> <?=$model->made_date?></p><?endif;?>
                                            <?if($model->certificate):?><p> <b><?=$labels['certificate']?>:</b> <?=$model->certificate?></p><?endif;?>
                                            <?if($model->shtrix_code):?><p> <b><?=$labels['shtrix_code']?>:</b> <?=$model->shtrix_code?></p><?endif;?>
                                        </div>
                                    </div>
                                    <div class="price-container info-container m-t-30">
                                        <div class="row">


                                            <div class="col-sm-6 col-xs-6">
                                                <div class="price-box">
                                                    <span class="price"><?=$model->price?$model->price.' sum':'Bepul'?></span>
                                                    <?if($model->old_price && $model->old_price>$model->price):?><span class="price-strike"><?=$model->old_price?>sum</span><?endif;?>
                                                </div>
                                            </div>

                                            <div class="col-sm-1 col-xs-3">
                                                <div class="favorite-button m-t-5">
                                                    <button onclick="add_to_wishlist('<?=$model->code?>')" class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                       title="Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-3">
                                                <div class="add-btn">
                                                    <button onclick="add_to_card('<?=$model->code?>')" class="btn btn-primary"><i
                                                                class="fa fa-<?=$model->arenda && !$model->price?'download':'shopping-cart'?> inner-right-vs"></i> <?=$model->arenda && !$model->price?'Yuklab olish':'Savatga qo\'shish'?></button>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <?=$model->detail?>

                                </div><!-- /.description-container -->


                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>
                <section class="section new-arriavls">
                    <h3 class="section-title">Tavsiya etiladi</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        <?foreach(Book::find()->where(['>','status',0])->andWhere(['subject_id'=>$model->subject_id])->orderBy(['sales'=>SORT_DESC])->limit(6)->all() as $key=>$item):
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

            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->

    </div><!-- /.container -->
</div>