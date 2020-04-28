<?php
use yii\helpers\Url;

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

?>

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
                <?if(!sizeof($model)) echo 'Hech narsa topilmadi!!'; foreach ($model as $item):?>
                    <div class="category-product-inner">
                        <?=$this->render('_new',['item'=>$item])?>
                    </div>
                    <!-- /.category-product-inner -->
                <?endforeach;?>
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
