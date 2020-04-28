<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $search_text string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $message;
?>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-bd">
    <div class="container">
        <div class="x-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12 x-text text-center">
                    <p> <?= $message ?> </p>
                    <form role="form" method="get" action="/site/search" class="outer-top-vs outer-bottom-xs">
                        <input placeholder="Kalit so`z" name="search_text" <?=$_GET['search_text']?'value="'.$_GET['search_text'].'"':''?> autocomplete="off">
                        <button class="  btn-default le-button">Qidirish</button>
                    </form>
                    <a href="/"><i class="fa fa-home"></i> Bosh sahifaga qaytish</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->