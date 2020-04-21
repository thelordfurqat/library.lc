<?php
use app\models\Author;
use app\models\Book;
use app\models\Genre;
use app\models\Publisher;
use app\models\Region;
use app\models\Subject;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;


$mostliked=Book::find()->where(['>','status',0])->orderBy(['like_counter'=>SORT_DESC])->limit(4*8)->all();
$mostviewed=Book::find()->where(['>','status',0])->orderBy(['show_counter'=>SORT_DESC])->limit(4*8)->all();
$mostseled=Book::find()->where(['>','status',0])->orderBy(['sales'=>SORT_DESC])->limit(6)->all();
$latest=Book::find()->where(['>','status',0])->orderBy(['id'=>SORT_DESC])->limit(8*4)->all();
$bestAuthors=Author::find()->all();
ArrayHelper::multisort($bestAuthors,function ($x){return $x->likecounter;},[SORT_DESC]);
//debug($bestAuthors);
$best3Authors=array_slice($bestAuthors,0,4*8);
$genres=Genre::find()->orderBy(['count'=>SORT_DESC])->limit(4*8)->all();
$subjects=Subject::find()->orderBy(['count'=>SORT_DESC])->limit(4*8)->all();
$publishers=Publisher::find()->limit(4*8)->all();
$regions=Region::find()->all();


?>



<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Kategoriyalar</div>
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
            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-user" aria-hidden="true"></i>Eng yaxshi yozuvchilar</a>
                <ul class="dropdown-menu mega-menu"  style="min-width: max-content">
                    <li class="yamm-content">
                        <div class="row">
                            <?if((int)(sizeof($best3Authors)/8))
                                $class=(int)(12/(sizeof($best3Authors)/8));
                            else $class=12;?>
                            <div class="col-sm-12 col-md-<?=$class?>">
                                <ul class="links list-unstyled">
                                    <?

                                    foreach ($best3Authors as $i=>$item) :
                                    if(!(($i)%8) && $i):?>
                                </ul>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-12 col-md-<?=$class?>">
                                <ul class="links list-unstyled">
                                    <?endif;?>
                                    <li><a href="<?=Url::to(['/site/books','author'=>$item->id])?>"><?=$item->name?></a></li>
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
                                    <li><a href="<?=Url::to(['/site/books','genre'=>$item->id])?>"><?=$item->name?></a></li>
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
                                    <li><a href="<?=Url::to(['/site/books','subject'=>$item->id])?>"><?=$item->name?></a></li>
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
                                    <li><a href="<?=Url::to(['/site/books','publisher'=>$item->id])?>"><?=$item->name?></a></li>
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
<!--            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-map-marker" aria-hidden="true"></i>Viloyatlar</a>-->
<!--                <ul class="dropdown-menu mega-menu" style="min-width: max-content">-->
<!--                    <li class="yamm-content">-->
<!--                        <div class="row">-->
<!--                            --><?//if((int)(sizeof($regions)/8))
//                                $class=(int)(12/(sizeof($regions)/8));
//                            else $class=12;?>
<!--                            <div class="col-sm-12 col-md---><?//=$class?><!--">-->
<!--                                <ul class="links list-unstyled">-->
<!--                                    --><?//
//
//                                    foreach ($regions as $i=>$item) :
//                                    if(!(($i)%8) && $i!=0):?>
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <div class="col-sm-12 col-md---><?//=$class?><!--">-->
<!--                                <ul class="links list-unstyled">-->
<!--                                    --><?//endif;?>
<!--                                    <li><a href="--><?//=Url::to(['/site/books','region'=>$item->id])?><!--">--><?//=$item->name_lat?><!--</a></li>-->
<!--                                    --><?//endforeach;?>
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->
