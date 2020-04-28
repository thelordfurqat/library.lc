<?php
$this->title = $name;
$this->params['breadcrumbs'][] = $name;
/* @var $model app\models\News */



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

                <?=$this->render('_news',[
                        'dataProvider'=>$dataProvider
                ])?>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

</div>

