<?php

$this->title='Qidirish';
$this->params['breadcrumbs'][] = $this->title;
/** @var \app\models\Book $BookDP */
/** @var \app\models\Book $LibraryDP */
/** @var \app\models\Book $SubjectDP */
/** @var \app\models\Book $GenreDP */
/** @var \app\models\Book $AuthorDP */
/** @var \app\models\Book $NewDP */

?>
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
                <?=$this->render('_left_side')?>
                <!-- /.sidebar-module-container -->
            </div>
            <!-- /.sidebar -->
            <div class="col-xs-12 col-sm-12 col-md-9 rht-col">

                <?if($BookDP!=null):?>
                <h1>Kitoblar</h1>
                <?=$this->render('_books',[
                    'dataProvider'=>$BookDP,
                ])?>
                <?endif;?>

                <?if($LibraryDP!=null):?>
                <h1>Kutubxonalar</h1>
                <?=$this->render('_libraries',[
                    'dataProvider'=>$LibraryDP,
                ])?>
                <?endif;?>

                <?if($SubjectDP!=null):?>
                <h1>Fanlar</h1>
                <?=$this->render('_subjects',[
                    'dataProvider'=>$SubjectDP,
                ])?>
                <?endif;?>

                <?if($GenreDP!=null):?>
                <h1>Janrlar</h1>
                <?=$this->render('_genres',[
                    'dataProvider'=>$GenreDP,
                ])?>
                <?endif;?>

                <?if($AuthorDP!=null):?>
                <h1>Avtorlar</h1>
                <?=$this->render('_authors',[
                    'dataProvider'=>$AuthorDP,
                ])?>
                <?endif;?>

                <?if($NewDP!=null):?>
                <h1>Postlar</h1>
                <?=$this->render('_news',[
                    'dataProvider'=>$NewDP,
                ])?>
                <?endif;?>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

</div>

