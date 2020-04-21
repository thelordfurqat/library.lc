<?php
$class = "vmagazine-lite-home-wrapp";
switch (Yii::$app->controller->action->id) {
    case 'news':
        $class = "vmagazine-lite-container";
        break;
    case 'view':
        $class = "vmagazine-lite-container";
        break;
    case 'page':
        $class = "vmagazine-lite-container";
        break;
}
$this->title = $name;
$this->params['breadcrumbs'][] = $name;
$posts=\app\models\News::find()->where(['cat_id'=>$model->cat_id])->andWhere(['<>','id',$model->id])->orderBy(['created'=>SORT_DESC])->limit(8)->all();

use yii\helpers\Url; ?>
<!--Blog Start-->
<section class="wf100 p80 blog">
    <div class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <!--Blog Single Content Start-->
                    <div class="blog-single-content">
                        <div id="primary" class="content-area post-single-layout1 vmagazine-lite-content">
                            <main id="main" class="site-main" role="main">
                                <article
                                        class="post type-post status-publish format-standard has-post-thumbnail hentry category-news category-wiiu category-xboxone">

                                    <header class="entry-header">
                                        <h3 class="entry-title"><?= $model->name ?></h3>
                                        <?php if ($model->name != $model->preview) { ?>
                                            <h5 class="entry-title"><?= $model->preview ?></h5>
                                        <?php } ?>
                                    </header><!-- .entry-header -->

                                    <div class="entry-meta clearfix">
                <span class="posted-on">
                    <i class="fa fa-clock-o"></i><?= $this->render('_date', ['date' => $model->created]) ?></span>
                                        <span class="comments"><i
                                                    class="fa fa-eye"></i><?= $model->show_counter ?></span>
                                    </div>
                                    <?php if ($model->image != 'default.jpg') { ?>
                                        <figure>
                                            <img src="/uploads/<?= $model->image ?>"
                                                 style="object-fit: cover; object-position: center;">
                                        </figure>
                                        <br>
                                    <?php } ?>
                                    <style>
                                        figure {
                                            width: 100%; /*container-width*/
                                            overflow: hidden; /*hide bounds of image */
                                            margin: 0; /*reset margin of figure tag*/
                                        }

                                        figure img {
                                            display: block; /*remove inline-block spaces*/
                                            width: 100%; /*make image streatch*/
                                        }

                                        /*figure img{*/
                                        /*    !*add to other styles*!   margin:-11.875% 0;*/
                                        /*}*/
                                    </style>

                                    <div class="entry-content clearfix">
                                        <div id="idTextPanel" class="jqDnR">

                                            <?= $model->detail ?>


                                            <br>

                                            <style type="text/css">

                                                #share-buttons img {
                                                    width: 35px;
                                                    padding: 5px;
                                                    border: 0;
                                                    box-shadow: 0;
                                                    display: inline;
                                                    text-align: right;
                                                }

                                            </style>
                                            <!-- I got these buttons from simplesharebuttons.com -->
                                            <div id="share-buttons">

                                                <span>Тарқатиш:</span>

                                                <!-- Email -->
                                                <a href="mailto:?Subject=<?= $model->name ?>&amp;Body=<?= $model->preview ?> <?= \yii\helpers\Url::base(true) . Yii::$app->urlManager->createUrl(['/site/news', 'code' => $model->code]) ?>">
                                                    <img src="/icon/email.png" alt="Email"/>
                                                </a>

                                                <!-- Facebook -->
                                                <a href="http://www.facebook.com/sharer.php?u=<?= \yii\helpers\Url::base(true) . Yii::$app->urlManager->createUrl(['/site/news', 'code' => $model->code]) ?>"
                                                   target="_blank">
                                                    <img src="/icon/facebook.png" alt="Facebook"/>
                                                </a>

                                                <!-- Google+ -->
                                                <a href="https://plus.google.com/share?url=<?= \yii\helpers\Url::base(true) . Yii::$app->urlManager->createUrl(['/site/news', 'code' => $model->code]) ?>"
                                                   target="_blank">
                                                    <img src="/icon/google.png" alt="Google"/>
                                                </a>

                                                <!-- LinkedIn -->
                                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= \yii\helpers\Url::base(true) . Yii::$app->urlManager->createUrl(['/site/news', 'code' => $model->code]) ?>"
                                                   target="_blank">
                                                    <img src="/icon/linkedin.png" alt="LinkedIn"/>
                                                </a>


                                                <!-- Twitter -->
                                                <a href="https://twitter.com/share?url=<?= \yii\helpers\Url::base(true) . Yii::$app->urlManager->createUrl(['/site/news', 'code' => $model->code]) ?>&amp;text=<?= $model->name ?>"
                                                   target="_blank">
                                                    <img src="/icon/twitter.png" alt="Twitter"/>
                                                </a>

                                                <!-- VK -->
                                                <a href="http://vkontakte.ru/share.php?url=<?= \yii\helpers\Url::base(true) . Yii::$app->urlManager->createUrl(['/site/news', 'code' => $model->code]) ?>"
                                                   target="_blank">
                                                    <img src="/icon/vk.png" alt="VK"/>
                                                </a>

                                                <!-- VK -->
                                                <a href="https://t.me/share/url?url=<?= \yii\helpers\Url::base(true) . Yii::$app->urlManager->createUrl(['/site/news', 'code' => $model->code]) ?>"
                                                   target="_blank">
                                                    <img src="/icon/telegram.png" alt="VK"/>
                                                </a>

                                                <span class="pull-right"
                                                      style="font-weight: bold;     margin-top: 8px;">
                            <?= $this->render('_date', ['date' => $model->created]) ?> -
                            Автор: <?= $model->author->name ?>
                        </span>

                                            </div>


                                        </div>


                                    </div>


                                </article><!-- #post-## -->
                            </main><!-- #main -->
                            <?
                            if(sizeof($posts)):
                            ?>
                            <hr style="background-color: rgba(0,0,0,0.34)"> <div class="section-title-2 mt-5">
                                <h5>Mavzuga doir</h5>
                                <h2>So'ngi ma'lumotlar</h2>
                            </div>
                            <div class="cpro-slider owl-carousel owl-theme">
                                <? foreach ($posts as $post) { ?>

                                    <!--Pro Box-->
                                    <div class="item">
                                        <div class="pro-box">
                                            <img src="/uploads/<?=$post->image?>" alt="" style="object-fit: cover; object-position: center; height: 300px">
                                            <h5><?=short_str($post->name,70)?></h5>
                                            <div class="pro-hover">
                                                <!--                                                <h6>Forest & Tree Planting</h6>-->
                                                <p><?=short_str($post->name,70)?></p>
                                                <a href="<?=Url::to(['site/view','code'=>$post->code])?>">Batafsil</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Pro Box End-->
                                    <?
                                } ?>
                            </div>
                            <?endif;?>
                        </div><!-- #primary -->
                    </div>
                    <!--Blog Single Content End-->
                </div>
                <!--Sidebar Start-->
                <div class="col-lg-3 col-md-4">
                    <?= $this->render('_secondary') ?>

                </div>
                <!--Sidebar End-->
            </div>
        </div>
    </div>
</section>
<!--Blog End-->

