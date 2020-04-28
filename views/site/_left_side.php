<?php

use app\models\Book;
use app\models\News;
use yii\helpers\Url;

$userBalans=(int)(\app\models\User::findOne(Yii::$app->user->id)->balans);

$add = \app\models\Adds::find()->where(['type' => 'onslider'])->andWhere(['status' => 1])->orderBy(['oder' => SORT_DESC])->one();
$discounted_books = Book::find()->where(['>', 'status', 0])->andWhere(['>', 'old_price', 0])->andWhere(['>', 'old_price', 'price'])->orderBy(['updated' => SORT_DESC])->limit(3)->all();
$latest_news = News::find()->where(['cat_id' => 30])->andwhere(['>', 'status', 0])->andwhere(['>', 'active', 0])->orderBy(['sort' => SORT_DESC, 'id' => SORT_DESC])->limit(3)->all();
$mostliked=Book::find()->where(['>','status',0])->orderBy(['like_counter'=>SORT_DESC])->limit(4)->all();
$tags=[];
foreach ($mostliked as $item) {
    array_push($tags, $item->name);
    $array=json_decode($item->authors,true);
    foreach ($array as $id){
        array_push($tags, \app\models\Author::findOne($id)->name);
    }
}
$style= <<<CSS
@media (max-width: 767px) {
   .my-none-displayed-div {
        margin-bottom: 30px;
        width: 100%;
        display: none;
}
}

CSS;
$this->registerCss($style);
?>


<?= $this->render('_quick_categories') ?>
<?if(true):?>
<div class="sidebar-module-container my-none-displayed-div">
    <div class="sidebar-filter">
        <div class="home-banner outer-top-n outer-bottom-xs">
            <a href="<?= $add->url ?>"><img src="/adds/<?= $add->image ?>" alt="Image"
                                            style="object-fit: cover; object-position: center; width: 100%"></a>
        </div>
        <!-- ============================================== HOT DEALS ============================================== -->
        <div class="sidebar-widget hot-deals outer-bottom-xs">
            <h3 class="section-title">Chegirmalar</h3>
            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                <? foreach ($discounted_books as $item):
                    $url = Url::to(['/site/bookview', 'code' => $item->code]);
                    $price=(int)($item->price);
                    $delflag=$userBalans-$price;
                    ?>
                    <div class="item">
                        <div class="products">
                            <div class="hot-deal-wrapper">
                                <div class="image">
                                    <a href="<?= $url ?>">
                                        <img src="/book-images/<?= $item->image ?>" alt="">
                                    </a>
                                </div>
                                <div class="tag hot" style="width: 35px;
    height: 35px;
    line-height: 35px;
    font-size: 10px;
    right: 14px;
    letter-spacing: 0.5px;
    position: absolute;">
                                    <span><?= 100 - (int)($item->price * 100 / $item->old_price) ?>%</span></div>

                            </div>
                            <!-- /.hot-deal-wrapper -->

                            <div class="product-info text-left m-t-20">
                                <h3 class="name"><a href="<?= $url ?>"><?= $item->name ?></a></h3>
                                <!--                                                <div class="rating rateit-small"></div>-->
                                <div style="min-height: 18px"
                                     class="description"><?= getAuthors($item->authors) ?></div>
                                <div class="product-price"><span
                                            class="price" <?= $item->price ? '' : 'style="color: green"' ?>> <?= $item->price ? $item->price . ' so`m' : 'Bepul' ?></span> <?= $item->old_price > $item->price ? '<span style="color: #8c0615 !important;" class="price-before-discount">' . $item->old_price . ' so`m</span>' : '' ?>
                                </div>
                                <!-- /.product-price -->
                            </div>
                            <!-- /.product-info -->

                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <div class="add-cart-button btn-group">
                                        <?if(!$item->arenda):?>
                                            <button class="btn btn-primary icon" onclick="add_to_card('<?= $item->code ?>')"
                                                    data-toggle="dropdown" type="button"><i class="fa fa-shopping-cart"></i>
                                            </button>
                                            <button class="btn btn-primary cart-btn"
                                                    onclick="add_to_card('<?= $item->code ?>')" type="button">Savatga
                                                qo'shish
                                            </button>
                                        <?
                                        else:?>
                                            <a class="btn btn-primary icon" href="<?=Url::to(['/download/download','code'=>$item->code])?>"
                                                    data-toggle="dropdown" type="button" <?=!Yii::$app->user->isGuest && $item->price && $delflag>0?'data-confirm="'.$userBalans.' sum bo\'lgan balansingizdan '.$price.' sum bo\'lgan kitobni sotib olmoqchimisiz?  Balansingizda '.$delflag.' sum qoladi."':''?> ><i class="fa fa-download"></i>
                                            </a>
                                            <a class="btn btn-primary cart-btn"
                                               href="<?=Url::to(['/download/download','code'=>$item->code])?>" type="button">Yuklab olish
                                            </a>
                                        <?endif;?>
                                    </div>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
            <!-- /.sidebar-widget -->
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== -->
        <!-- ============================================== CATEGORY : END ============================================== -->

        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
            <h3 class="section-title">So'ngi yangilklar</h3>
            <? foreach ($latest_news as $item):
                $url = Url::to(['site/view', 'code' => $item->code])
                ?>
                <div class="blog-post inner-bottom-30 ">
                    <img class="img-responsive" src="/uploads/<?= $item->image ?>"
                         alt="">
                    <h4>
                        <a href="<?=$url?>"><?= mb_substr($item->name, 0, 43, 'utf8') ?><?= strlen($item->name) > 43 ? '...' : '' ?></a>
                    </h4>
                    <span class="review"><i class="fa fa-eye"> <?= $item->show_counter ?></i></span>
                    <span class="date-time" style="margin-left: 15px"><i
                                class="fa fa-calendar"></i> <? $date1 = new DateTime($item->created);
                        echo $date1->format('d/M/Y'); ?></span>
                    <p><?= mb_substr(strip_tags($item->preview), 0, 100, 'utf8') ?><?= strlen(strip_tags($item->preview)) > 100 ? '...' : '' ?></p>

                </div>
            <? endforeach; ?>
        </div>
        <!-- ============================================== PRODUCT TAGS ============================================== -->

        <!-- ============================================== PRODUCT TAGS ============================================== -->
        <div class="sidebar-widget product-tag outer-top-vs">
            <h3 class="section-title">Foydali teglar</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div class="tag-list">
                    <?foreach ($tags as $item):?>
                    <a class="item" title="<?=$item?>" href="<?=Url::to(['site/search','search-text'=>$item])?>"><?=$item?></a>
                    <?endforeach;?>
                </div>
                <!-- /.tag-list -->
            </div>
            <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->

    </div>
    <!-- /.sidebar-filter -->
</div>
<!-- /.sidebar-module-container -->
<?php endif;?>