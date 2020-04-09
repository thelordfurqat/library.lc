<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <script>
        var statuschanger = function(){
            return 1;
        }
        var resetform = function(){
            return 1;
        }
        var updatemodal = function(){

        }
        var createmodal = function(){

        }
    </script>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?=$this->render('_header')?>


<?=$content ?>
<?=$this->render('_footer'); ?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
