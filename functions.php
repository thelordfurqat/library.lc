<?php
//$model is a Model::find();
use app\models\Adds;

function GenerateRandomUnicalString($model){
    $code = Yii::$app->security->generateRandomString(12);
    while($model->where(['code'=>$code])->count()!=0){

        $code = Yii::$app->security->generateRandomString(12);

    }
    return $code;
}
function GenerateRandomUnicalAlias($model){
    $alias = rand(1000000000,9999999999);
    while($model->where(['alias'=>$alias])->count()!=0){
        $alias = rand(1000000000,9999999999);
    }
    return 'a'.$alias;
}
function debug($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
function GetModelFromCode($code,$model){
    return $model->where(['code'=>$code])->one();
}
function getAnswerBet($model){
    if(Yii::$app->getSecurity()->validatePassword("1",$model->ans_hesh))
        return 'A';
    if(Yii::$app->getSecurity()->validatePassword("2",$model->ans_hesh))
        return 'B';
    if(Yii::$app->getSecurity()->validatePassword("3",$model->ans_hesh))
        return 'C';
    if(Yii::$app->getSecurity()->validatePassword("4",$model->ans_hesh))
        return 'D';

}

/**
 * @param $subject
 * @param $subCategories
 * @param $que_qount
 * @param $user_id
 * @param $levels
 * @param $que_counts
 */
function generate($subject, $subCategories, $que_qount, $user_id, $levels, $que_counts){

}

function getAuthors($authors_json){
    $result='';
    $i=0;
    $array=json_decode($authors_json,true);
    $len = count($array);
    foreach ($array as $id){
        $result=$result.\app\models\Author::findOne($id)->name;
        if ($i != $len - 1) {
            // last
            $result=$result.', ';
        }
        $i++;
    }
    return $result;
}
function getGenres($genres_json){
    $result='';
    $i=0;
    $array=json_decode($genres_json,true);
    $len=count($array);
    foreach ($array as $id){
        $result=$result.\app\models\Genre::findOne($id)->name;
        if ($i != $len - 1) {
            // last
            $result=$result.', ';
        }
        $i++;
    }
    return $result;
}
function status($status,$data,$trend_on=null){
    switch ($status){
        case 0:return '<i class="ni ni-calendar-grid-58 text-red"> '.$trend_on.'</i><br><i class="ni ni-watch-time text-red"> '.$data.'</i>';break;
        case 1:return '<i class="ni ni-calendar-grid-58 text-green"> '.$trend_on.'</i><br><i class="ni ni-watch-time text-green"> '.$data.'</i>';break;
        case 2:return '<i class="ni ni-calendar-grid-58 text-yellow"> '.$trend_on.'</i><br><i class="ni ni-watch-time text-yellow"> '.$data.'</i>';break;
    }
    return '<i class="ni ni-check-bold text-green">'.$data.'</i>';
}
function updatestatus(){

    $adds=Adds::find()->where(['status'=>2])->andWhere(['<','trend_on',date('Y-m-d H:i:s')])->all();
    foreach ($adds as $add) {
        $add->status=1;
        $add->trend_on_date='as';
        $add->trend_on_time='as';
        $add->trend_on_length='as';
        $add->save();
    }
    $adds=Adds::find()->where(['status'=>1])->andWhere(['<','trend_down',date('Y-m-d H:i:s')])->all();
    foreach ($adds as $add) {
        $add->status=0;
        $add->trend_on_date='as';
        $add->trend_on_time='as';
        $add->trend_on_length='as';
        $add->save();
    }

    return true;
}