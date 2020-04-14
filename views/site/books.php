<?php

$model=$dataProvider->getModels();
if($dataProvider->getSort()->attributeOrders['created']==3)
    $sortBy='Eng yangi';
elseif($dataProvider->getSort()->attributeOrders['like_counter']==3)
    $sortBy='Sevimli kitoblar';
elseif($dataProvider->getSort()->attributeOrders['show_counter']==3)
    $sortBy='Ko\'p ko\'rilganlar';
elseif($dataProvider->getSort()->attributeOrders['sales']==3)
    $sortBy='Ko\'p sotilganlar';

$pager= \yii\widgets\LinkPager::widget(['pagination'=>$dataProvider->pagination,

    'options'=>[
        'class'=>'list-inline list-unstyled',
    ],
    'nextPageLabel'=>'<i class="fa fa-angle-right"></i>',
    'prevPageLabel'=>'<i class="fa fa-angle-left"></i>',
    'linkContainerOptions'=>['class'=>'page-item'],
    'linkOptions'=>['class'=>'page-link'],

]);
$this->title='Kitoblar';
$this->params['breadcrumbs'][] = $this->title;

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
$add = \app\models\Adds::find()->where(['type' => 'oncategory'])->andWhere(['status' => 1])->orderBy(['oder' => SORT_DESC])->one();

?>
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
                <?=$this->render('_left_side')?>
                <!-- /.sidebar-module-container -->
            </div>
            <!-- /.sidebar -->
            <div class="col-xs-12 col-sm-12 col-md-9 rht-col">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="category" class="category-carousel hidden-xs">
                    <div class="item">
                        <div class="image"> <img src="/adds/<?=$add->image?>" alt="" class="img-responsive"> </div>
                        <div class="container-fluid">
                            <div class="caption vertical-top text-left">
<!--                                <div class="big-text"> Big Sale </div>-->
                                <div class="excerpt hidden-sm big-text hidden-md"> <?=$add->header?> </div>
                                <div class="excerpt-normal hidden-sm hidden-md"> <?=$add->detail?> </div>
                                <div class="buy-btn"><a href="<?=$add->url?>" class="lnk btn btn-primary">Batafsil</a></div>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                </div>


                <div class="clearfix filters-container m-t-10">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col col-sm-12 col-md-8 col-lg-8 hidden-sm">
                            <div class="col col-sm-6 col-md-6 no-padding">
                                <div class="lbl-cnt"> <span class="lbl">Saralash</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> <?=$sortBy?$sortBy:'Eng yangi'?> <span class="caret"></span> </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li role="presentation"><a href="<?=Url::current(['sort'=>'-created'])?>">Eng yangi</a></li>
                                                <li role="presentation"><a href="<?=Url::current(['sort'=>'-like_counter'])?>">Sevimli kitoblar</a></li>
                                                <li role="presentation"><a href="<?=Url::current(['sort'=>'-show_counter'])?>">Ko'p ko'rilganlar</a></li>
                                                <li role="presentation"><a href="<?=Url::current(['sort'=>'-sales'])?>">Ko'p sotilganlar</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.fld -->
                                </div>
                                <!-- /.lbl-cnt -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-6 col-md-6 no-padding hidden-sm hidden-md">
                                <div class="lbl-cnt"> <span class="lbl">Ko'rinsin</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> <?=$dataProvider->pagination->pageSize?> <span class="caret"></span> </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <?for ($i=5;$i<=50;$i+=5):?>
                                                <li role="presentation"><a href="<?=Url::current(['page'=>$dataProvider->pagination->page,'per-page'=>$i])?>"><?=$i?></a></li>
                                                <?endfor;?>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.fld -->
                                </div>
                                <!-- /.lbl-cnt -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-6 col-md-4 col-xs-6 col-lg-4 text-right">
                            <div class="pagination-container">
                                <?=$pager?>
                            </div>
                            <!-- /.pagination-container --> </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row">
                                    <?foreach($model as $key=>$item):
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
                                    ?>
                                    <div class="col-sm-6 col-md-4 col-lg-3">


                                            <div class="item">
                                                <?=$this->render('_product',['item'=>$item])?>
                                                <!-- /.products -->
                                            </div>
                                            <!-- /.item -->

                                    </div>
                                    <!-- /.item -->
                                        <?endforeach;?>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.category-product -->

                        </div>
                        <!-- /.tab-pane -->

                    </div>
                    <!-- /.tab-content -->
                    <div class="clearfix filters-container bottom-row">
                        <div class="text-right">
                            <div class="pagination-container">
                                <?=$pager?>
                                <!-- /.list-inline -->
                            </div>
                            <!-- /.pagination-container --> </div>
                        <!-- /.text-right -->

                    </div>
                    <!-- /.filters-container -->

                </div>
                <!-- /.search-result-container -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

</div>
