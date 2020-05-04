<?php

/* @var $search_text string */
$search_text=null;
$search_text=$_GET['search_text'];

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
$total_sum=0;
foreach ($books as $item) {
    $total_price+=$item->price*$item->count;
    $total_count+=$item->count;
}
?>
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li class="wishlist"><a href="/site/wishlist"><span>Saralanganlar</span></a></li>
                        <li class="header_cart hidden-xs"><a href="/site/card"><span>Savat</span></a></li>
                        <?if(Yii::$app->user->isGuest):?>
                        <li class="login"><a href="/site/login"><span>Kirish</span></a></li>
                        <?else:?>
                            <li class="check"><a href="/site/pay"><span>Hisobni to'ldirish</span></a></span></li>
                            <li class="login"><a href="/site/my-account"><span><?=Yii::$app->user->identity->name?></span></a></li>
                            <li class="myaccount"><a href="<?= Yii::$app->urlManager->createUrl(['/site/logout'])?>" data-method="post"><span>Chiqish</span></a></li>
                        <?endif;?>
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"><a href="#" class="dropdown-toggle" data-hover="dropdown"
                                                               data-toggle="dropdown"><span class="value">USD </span><b
                                        class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small"><a href="#" class="dropdown-toggle" data-hover="dropdown"
                                                               data-toggle="dropdown"><span
                                        class="value">English </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"><a href="/"> <img src="/front-theme/assets/images/logo.png" alt="logo"> </a></div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <?php \yii\widgets\ActiveForm::begin([
                                'method'=>'get',
                            'action'=>\yii\helpers\Url::to(['/site/search'])
                        ])?>
                            <div class="control-group">
                                <div class="categories-filter">
                                    <a href="/site/search">Qidirish </a>

                                </div>
                                <input class="search-field" id="search-text" name="search_text" <?=$search_text?'value="'.$search_text.'"':''?> placeholder="Kalit so'zni kiriting..."/>
                                <button type="submit" class="search-button" style="border: none"></button>
                            </div>
                        <?php \yii\widgets\ActiveForm::end()?>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 animate-dropdown top-cart-row">
                <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                <div class="dropdown dropdown-cart" id="card_body">
                   <?=$this->render('/site/_card_form')?>
                </div>
                <!-- /.dropdown-cart -->
            </div>
            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
        </div>
        <!-- /.top-cart-row -->
    </div>
    <!-- /.row -->

    </div>
    <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span></button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                           <?=$this->render('_menu')?>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->