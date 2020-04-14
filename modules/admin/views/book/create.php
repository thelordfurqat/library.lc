<?php

use buttflattery\formwizard\FormWizard;
use kartik\date\DatePicker;
use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = 'Kitob qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Kitoblar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><?=$this->title?></h3>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <?=$this->render('_form',[
                        'model'=>$model
                ])?>
            </div>
        </div>
    </div>
</div>
