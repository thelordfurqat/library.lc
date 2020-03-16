<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto debitis exercitationem facere in incidunt maxime omnis repellat tempora vel.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>
