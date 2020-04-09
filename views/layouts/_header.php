<?php

?>
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li class="myaccount"><a href="/my-account"><span>Kabinet</span></a></li>
                        <li class="wishlist"><a href="/wishlist"><span>Saralanganlar</span></a></li>
                        <li class="header_cart hidden-xs"><a href="/card"><span>Savat</span></a></li>
                        <li class="check"><a href="/pay"><span>Hisobni to'ldirish</span></a></span></li>
                        <li class="login"><a href="/login"><span>Kirish</span></a></li>
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
                            'action'=>\yii\helpers\Url::to(['/search'])
                        ])?>
                            <div class="control-group">
                                <div class="categories-filter">
                                    <a href="/search">Qidirish </a>

                                </div>
                                <input class="search-field" id="search-text" name="search-text" placeholder="Kalit so'zni kiriting..."/>
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

                <div class="dropdown dropdown-cart">
                    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                        <div class="items-cart-inner">
                            <div class="basket">
                                <div class="basket-item-count"><span class="count">2</span></div>
                                <div class="total-price-basket"><span class="lbl">Shopping Cart</span> <span
                                            class="value">$4580</span> </span> </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="cart-item product-summary">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="image"><a href="detail.html"><img
                                                        src="assets/images/products/p4.jpg" alt=""></a></div>
                                    </div>
                                    <div class="col-xs-7">
                                        <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a></h3>
                                        <div class="price">$600.00</div>
                                    </div>
                                    <div class="col-xs-1 action"><a href="#"><i class="fa fa-trash"></i></a></div>
                                </div>
                            </div>
                            <!-- /.cart-item -->
                            <div class="clearfix"></div>
                            <hr>
                            <div class="clearfix cart-total">
                                <div class="pull-right"><span class="text">Sub Total :</span><span
                                            class='price'>$600.00</span></div>
                                <div class="clearfix"></div>
                                <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                            </div>
                            <!-- /.cart-total-->

                        </li>
                    </ul>
                    <!-- /.dropdown-menu-->
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