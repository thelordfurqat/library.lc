<?php

?>
<div class="header">

    <div class="container">

        <div class="logo">
            <h1 ><a href="<?=Yii::$app->homeUrl?>"><b>T<br>H<br>E</b>Library<span>First book shop</span></a></h1>
        </div>
        <div class="head-t">
            <ul class="card">
                <?php
                if( Yii::$app->user->isGuest) {
                    ?>
                    <li><a href="/login" ><i class="fa fa-user" aria-hidden="true"></i>Kirish</a></li>
                    <li><a href="/register" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Ro'yxatdan o'tish</a></li>
                    <?php
                }
                else {
                    ?>
                    <li><a href="<?=Yii::$app->urlManager->createUrl(['wish-list'])?>" ><i class="fa fa-heart" aria-hidden="true"></i>Wishlist</a></li>
                    <li><a href="/user-profile" ><i class="fa fa-user" aria-hidden="true"></i><?=Yii::$app->user->identity->name?></a></li>
                    <li><a href="/order-history" ><i class="fa fa-file-text-o" aria-hidden="true"></i>Tarix</a></li>
                    <?php
                }
                ?>
                <li><a href="/contact" ><i class="fa fa-ship" aria-hidden="true"></i>Bog'lanish</a></li>
            </ul>
        </div>

        <div class="header-ri">
            <ul class="social-top">
                <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
                <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
                <li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
                <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
            </ul>
        </div>


        <div class="nav-top">
            <nav class="navbar navbar-default">

                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                </div>
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <?=$this->render('_menu')?>
                </div>
            </nav>
            <div class="cart" >

                <span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>
