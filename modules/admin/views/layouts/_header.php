<?php

use yii\widgets\Breadcrumbs;
?>
<!-- Header -->

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-4 col-7 ">
                    <h6 class="h2 text-white d-inline-block mb-0"><?=$this->title?></h6>
                </div>
                <div class="col-lg-8 col-5 text-right">
                    <?php
                    if($this->params['breadcrumbs']):?>


                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <?= Breadcrumbs::widget([
                                    'itemTemplate'=>' <li class="breadcrumb-item">{link}</li>',
                                    'activeItemTemplate'=>' <li class="breadcrumb-item active">{link}</li>',
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ]) ?>
                            </ol>
                        </nav>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
            <!-- Card stats -->
            <?php if(Yii::$app->controller->id != 'default' or Yii::$app->controller->action->id == 'index'){
                $this->render('_stats');
}?>
        </div>
    </div>
</div>
