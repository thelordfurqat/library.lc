<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resettoken".
 *
 * @property integer $id
 * @property string $token
 * @property string $created
 * @property string $email
 * @property integer $user_id
 */
class Resettoken extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resettoken';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'email',], 'required'],
            [['created'], 'safe'],
            [['user_id'], 'integer'],
            [['token', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
            'created' => 'Created',
            'email' => 'Email',
            'user_id' => 'User ID',
        ];
    }

    public function getToken(){
        $token = Yii::$app->security->generateRandomString(30);
        while (static::findOne(['token'=>$token])){
            $token = Yii::$app->security->generateRandomString(30);
        }
        return $token;
    }
}
