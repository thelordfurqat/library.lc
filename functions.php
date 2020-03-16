<?php
//$model is a Model::find();
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