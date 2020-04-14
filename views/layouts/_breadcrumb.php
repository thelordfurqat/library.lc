<?php

use yii\widgets\Breadcrumbs; ?>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
                <?= Breadcrumbs::widget([
                    'options'=>[
                        'class'=>'list-inline list-unstyled',
                    ],
                    'itemTemplate'=>' <li>{link}</li>',
                    'activeItemTemplate'=>' <li class=\'active\'>{link}</li>',
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->

