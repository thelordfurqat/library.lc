<?php

$this->title='Kitoblar';
$this->params['breadcrumbs'][] = $this->title;

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


                <?=$this->render('_books',[
                        'dataProvider'=>$dataProvider,
                ])?>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

</div>
