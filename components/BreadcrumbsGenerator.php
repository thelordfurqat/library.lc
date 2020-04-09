<?php
/**
 * Created by PhpStorm.
 * User: Dilmurod
 * Date: 12.01.2019
 * Time: 21:53
 */

namespace app\components;

use app\models\Category;
use app\models\News;
use yii\base\Widget;
use Yii;
class BreadcrumbsGenerator extends Widget{

    public static $newsurl="site/news",$newsview="site/view", $viewcode='code',$pageview = 'site/page';
    public static function generate($params){

        $code = $params['code'];
        $type = $params['type'];
        $homeurl = Yii::$app->urlManager->createUrl(['site/index']);
        $result = '

    <div class="vmagazine-lite-breadcrumb-wrapper">
				
            <div class="vmagazine-lite-bread-home">
                <div class="vmagazine-lite-bread-wrapp">
                    
                        
                           		
               
                    ';


        if($type == 'view'){
            $name = News::findOne(['code'=>$code])->name;
            $result = $result . '<div class="breadcrumb-title">
                            <h1 class="page-title">'.$name.'</h1>
                        </div>
                                                    <div class="vmagazine-lite-breadcrumb">
                                <nav role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin">
                                         <a href="'.$homeurl.'" rel="home"><span>Бош саҳифа</span></a>
                                        </li>';
            $result = static::generateView($result,$code);
        }elseif($type == 'news'){
            $cat = Category::findOne(['code'=>$code]);
            $id = $cat->id;
            $name = $cat->name;
            $result = $result . '<div class="breadcrumb-title">
                            <h1 class="page-title">'.$name.'</h1>
                        </div>
                                                    <div class="vmagazine-lite-breadcrumb">
                                <nav role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin">
                                         <a href="'.$homeurl.'" rel="home"><span>Бош саҳифа</span></a>
                                        </li>';
            $result = static::parentGenerate($id, $result);
        }elseif($type == 'page'){

            $cat = Category::findOne(['code'=>$code]);
            $id = $cat->id;
            $name = $cat->name;
            $result = $result . '<div class="breadcrumb-title">
                            <h1 class="page-title">'.$name.'</h1>
                        </div>
                                                    <div class="vmagazine-lite-breadcrumb">
                                <nav role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin">
                                         <a href="'.$homeurl.'" rel="home"><span>Бош саҳифа</span></a>
                                        </li>';

            $result = static::parentGenerate($id, $result);
        }elseif($type=='search'){
            $result = $result . '<div class="breadcrumb-title">
                            <h1 class="page-title">Калит сўз “'.$code.'”</h1>
                        </div>
                                                    <div class="vmagazine-lite-breadcrumb">
                                <nav role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin">
                                         <a href="'.$homeurl.'" rel="home"><span>Бош саҳифа</span></a>
                                        </li>
                                        <li class="trail-item trail-end current"><span>Калит сўз “'.$code.'”</span></li>
                                        ';
        }
        elseif($type=='sitemap'){
            $result = $result . '<div class="breadcrumb-title">
                            <h1 class="page-title">Сайт харитаси</h1>
                        </div>
                                                    <div class="vmagazine-lite-breadcrumb">
                                <nav role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                    <ul class="trail-items">
                                        <li class="trail-item trail-begin">
                                         <a href="'.$homeurl.'" rel="home"><span>Бош саҳифа</span></a>
                                        </li>
                                        <li class="trail-item trail-end current"><span>Сайт харитаси</span></li>
                                        ';
        }



        $result = $result.'</ul></nav></div> </div>
            </div>

	</div>	';
        return $result;
    }


    public static function generateView($res, $code){
        $model = News::findOne(['code'=>$code]);
        $res = static::parentGenerate($model->cat_id,$res);
        $res .= '<li class="trail-item trail-end current">
                            <span>'.$model->name.'</span>
                        </li>';
        return $res;
    }

    public static function generatePage($res, $code){
        $model = Category::findOne(['code'=>$code]);
        $res = static::parentGenerate($model->id,$res);
        $res .= '<li class="trail-item trail-end current">
                            <span>'.$model->name.'</span>
                        </li>';
        return $res;
    }

    public static function parentGenerate($id,$res){
        $parents = [];
        for($i = 0; $i<5; $i++){
            if($model = Category::findOne($id)){
                $parents[$model->code] = $model->name;
                $id = $model->parent_id;
                if($model->parent_id == 1){
                    break;
                }
            }else{
                break;
            }
        }
        $parents = array_reverse($parents);
        foreach($parents as $key => $item){
            $url = Yii::$app->urlManager->createUrl([static::$newsurl,'code'=>$key]);
            $res = $res . '<li class="trail-item">
                                          <a href="'.$url.'"><span>'.$item.'</span></a>
                                        </li>';
        }

        return $res;

    }
}