<?php

use app\models\News;
use yii\helpers\Url;

$partners=News::find()->where(['cat_id'=>37])->andwhere(['>','status',0])->andwhere(['>','active',0])->orderBy(['sort'=>SORT_DESC,'id'=>SORT_DESC])->limit(10)->all();

?>
<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider">
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            <?foreach ($partners as $item):
                $url=Url::to(['/site/view','code'=>$item->code]);
                ?>
                <div class="item m-t-15"> <a href="<?=$url?>" class="image"> <img data-echo="/uploads/<?=$item->image?>" src="/uploads/<?=$item->image?>" title="<?=$item->name?>" alt=""> </a> </div>
            <?endforeach;?>
            <!--/.item-->
        </div>
        <!-- /.owl-carousel #logo-slider -->
    </div>
    <!-- /.logo-slider-inner -->

</div>
<!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
