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
    <script>
        add_to_card=function () {

        };
        delete_from_card=function () {

        };
        add_to_wishlist=function (code) {
            alert(code);
        }
    </script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?=$this->render('_header')?>
<?if(!(Yii::$app->controller->id=='site' && Yii::$app->controller->action=='index'))
    echo $this->render('_breadcrumb');
    ?>

<?=$content ?>
<?=$this->render('_partners'); ?>
<?=$this->render('_footer'); ?>


<?php
$url = Yii::$app->urlManager->createUrl(['/site/add-to-card']);
$url2 = Yii::$app->urlManager->createUrl(['/site/delete-from-card']);

$this->registerJs("
  add_to_card = function(code){
    $.get('{$url}?code='+code).done(function(data){
        $('#card_body').empty();
        $('#card_body').append(data);
    })
  }
  delete_from_card = function(code){
    $.get('{$url2}?code='+code).done(function(data){
        $('#card_body').empty();
        $('#card_body').append(data);   
        $('#dropdown_card').click();   
        
    })
  }
    
  ")
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
