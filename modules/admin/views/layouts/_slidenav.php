<?php
?>
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header align-items-center" >
            <a class="navbar-brand" href="javascript:void(0)" style="display: flex">
                <img src="<?=Yii::$app->homeUrl?>image/logo.png"  class="navbar-brand-img pr-2" alt="..." >
                <h4 class="mt-2 pl-2" style="border-left: solid 1px #333333">Elektron Kutubxona</h4>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?=Yii::$app->controller->id=='default'?'active':''?>" href="/admin">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Bosh sahifa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=Yii::$app->controller->id=='book'?'active':''?>" href="/admin/book">
                            <i class="ni ni-books text-info"></i>
                            <span class="nav-link-text">Kitoblar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Yii::$app->urlManager->createUrl(['/theme'])?>" target="_blank">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Icons</span>
                        </a>
                    </li>

                </ul>
                <?
                if(Yii::$app->user->identity->role->role=='Admin'):
                ?>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Documentation</span>
                </h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link <?=Yii::$app->controller->id=='user'?'active':''?>" href="<?=Yii::$app->urlManager->createUrl(['/admin/user'])?>">
                            <i class="ni ni-circle-08 text-blue"></i>
                            <span class="nav-link-text">Foydalanuvchilar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=Yii::$app->controller->id=='category'?'active':''?>" href="<?=Yii::$app->urlManager->createUrl(['/admin/category'])?>">
                            <i class="ni ni-align-left-2 text-green"></i>
                            <span class="nav-link-text">Menyular</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?=Yii::$app->controller->id=='news'?'active':''?>" href="<?=Yii::$app->urlManager->createUrl(['/admin/news'])?>">
                            <i class="ni ni-notification-70 text-purple"></i>
                            <span class="nav-link-text">Postlar</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?=Yii::$app->controller->id=='adds'?'active':''?>" href="<?=Yii::$app->urlManager->createUrl(['/admin/adds'])?>">
                            <i class="ni ni-chart-bar-32 text-blue"></i>
                            <span class="nav-link-text">Reklamalar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=Yii::$app->controller->id=='author'?'active':''?>" href="<?=Yii::$app->urlManager->createUrl(['/admin/author'])?>">
                            <i class="ni ni-single-02 text-blue"></i>
                            <span class="nav-link-text">Avtorlar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=Yii::$app->controller->id=='subject'?'active':''?>" href="<?=Yii::$app->urlManager->createUrl(['/admin/subject'])?>">
                            <i class="ni ni-book-bookmark text-pink"></i>
                            <span class="nav-link-text">Fanlar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=Yii::$app->controller->id=='genre'?'active':''?>" href="<?=Yii::$app->urlManager->createUrl(['/admin/genre'])?>">
                            <i class="ni ni-hat-3 text-purple"></i>
                            <span class="nav-link-text">Janrlar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=Yii::$app->controller->id=='publisher'?'active':''?>" href="<?=Yii::$app->urlManager->createUrl(['/admin/publisher'])?>">
                            <i class="ni ni-palette text-info"></i>
                            <span class="nav-link-text">Nashriyotchilar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=Yii::$app->controller->id=='certificate'?'active':''?>" href="<?=Yii::$app->urlManager->createUrl(['/admin/certificate'])?>">
                            <i class="ni ni-paper-diploma text-green"></i>
                            <span class="nav-link-text">Sertifikatlar</span>
                        </a>
                    </li>
                </ul>
                <?endif;?>
            </div>
        </div>
    </div>
</nav>
