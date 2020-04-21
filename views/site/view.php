<?php

$this->title=$model->name;
$this->params['breadcrumbs'][] = ['label' => \app\models\Category::findOne($model->cat_id)->name, 'url' => [\yii\helpers\Url::to(['site/news','code'=>\app\models\Category::findOne($model->cat_id)->code])]];
$this->params['breadcrumbs'][] = $model->name;
$posts=\app\models\News::find()->where(['cat_id'=>$model->cat_id])->andWhere(['<>','id',$model->id])->orderBy(['created'=>SORT_DESC])->limit(8)->all();
/* @var $model app\models\News */

use app\models\News;
use yii\helpers\Url; ?>

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
                <?=$this->render('_left_side')?>
                <!-- /.sidebar-module-container -->
            </div>


                <div class="col-xs-12 col-sm-9 col-md-9 rht-col">
                    <div class="blog-page">
                    <div class="blog-post wow fadeInUp">
                        <h1><?=$model->name?></h1>
                        <span class="author"><?=\app\models\User::findOne($model->author_id)->name?></span>
                        <span class="date-time"><?=Yii::$app->formatter->asDatetime($model->created)?></span>
                        <?=$model->detail?>
                        <div class="social-media">
                            <span>Ulashish:</span>
                            <a href="mailto:?Subject=<?=$model->name?>&amp;Body=<?= $model->preview?> <?=\yii\helpers\Url::base(true).Yii::$app->urlManager->createUrl(['/site/view','code'=>$model->code])?>" target="_blank"><i class="fa fa-envelope"></i></a>
                            <a href="http://www.facebook.com/sharer.php?u=<?=$url=\yii\helpers\Url::base(true).Yii::$app->urlManager->createUrl(['/site/news','code'=>$model->code])?>" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://plus.google.com/share?url=<?=$url?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                            <a href="https://twitter.com/share?url=<?=$url?>" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?=$url?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="http://vkontakte.ru/share.php?url=<?=$url?>" target="_blank"><i class="fa fa-vk"></i></a>
                            <a href="https://t.me/share/url?url=<?=$url?>" target="_blank"><i class="fa fa-paper-plane" ></i></a>
                        </div>
                    </div>
                    </div>
                    <section class="section latest-blog outer-bottom-vs">
                        <h3 class="section-title" style="border-top: 1px solid #eaeaea;">Tavsiya etamiz</h3>
                        <div class="blog-slider-container outer-top-xs">
                            <div class="owl-carousel blog-slider custom-carousel">
                                <?foreach (News::find()->where(['cat_id'=>$model->cat_id])->andwhere(['>','status',0])->andwhere(['>','active',0])->andwhere(['<>','id',$model->id])->orderBy(['sort'=>SORT_DESC,'id'=>SORT_DESC])->limit(5)->all() as $item):
                                    $url=Url::to(['site/view','code'=>$item->code])
                                    ?>
                                    <div class="item">
                                        <div class="blog-post">
                                            <div class="blog-post-image">
                                                <div class="image"> <a href="<?=$url?>"><img src="/uploads/<?=$item->image?>" style="object-fit: cover; width: 100%; height: 100%; max-height: 20rem" alt=""></a> </div>
                                            </div>
                                            <!-- /.blog-post-image -->

                                            <div class="blog-post-info text-left">
                                                <h3 class="name"><a href="<?=$url?>"><?=mb_substr($item->name,0,43,'utf8')?><?=strlen($item->name)>43?'...':''?></a></h3>
                                                <span class="info"><?=$item->author->name?> &nbsp;|&nbsp; <?= Yii::$app->formatter->asDate($item->created);?> </span>
                                                <p class="text"><?=mb_substr(strip_tags($item->preview),0,180,'utf8')?><?=strlen(strip_tags($item->preview))>180?'...':''?></p>
                                            </div>
                                            <!-- /.blog-post-info -->

                                        </div>
                                        <!-- /.blog-post -->
                                    </div>
                                    <!-- /.item -->
                                <?endforeach;?>
                            </div>
                            <!-- /.owl-carousel -->
                        </div>
                        <!-- /.blog-slider-container -->
                    </section>

                </div>
            </div>
        </div>
    </div>
</div>