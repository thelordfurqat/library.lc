<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$s=Html::encode($this->title);
?>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-bd">
    <div class="container">
        <div class="x-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12 x-text text-center">
                    <h1> <?= mb_substr($s,sizeof($s)-5,sizeof($s)+2,'utf8')  ?></h1>
                    <p> <?= nl2br(Html::encode($message)) ?> </p>
                    <form role="form" method="get" action="/site/search" class="outer-top-vs outer-bottom-xs">
                        <input placeholder="Kalit so`z" name="search-text" autocomplete="off">
                        <button class="  btn-default le-button">Qidirish</button>
                    </form>
                    <a href="/"><i class="fa fa-home"></i> Bosh sahifaga qaytish</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->