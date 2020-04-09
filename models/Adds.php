<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "adds".
 *
 * @property int $id
 * @property string $header Asosiy
 * @property string $detail Qo'shimcha
 * @property string $image Rasm
 * @property string $type Turi
 * @property string $url Url
 * @property int $oder Ustunlik
 * @property string $trend_on Boshlanish
 * @property string $trend_down Tugash
 * @property string $created Yaratildi
 * @property string $updated Yangiladi
 * @property int $status Holati
 */
class Adds extends \yii\db\ActiveRecord
{
    public $trend_on_date;
    public $trend_on_time;
    public $trend_on_length;
    public $book_code;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['header', 'detail', 'type','trend_on_length','trend_on_time','trend_on_date'], 'required'],
            [['oder', 'status'], 'integer'],
            [['trend_on', 'trend_down', 'created', 'updated'], 'safe'],
            [['header', 'detail', 'image', 'book_code','type', 'url','trend_on_length','trend_on_time','trend_on_date'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'book_code'=>'Kitob',
            'trend_on_length'=>'Davomiyligi (Soat)',
            'trend_on_time'=>'Boshlash vaqti',
            'trend_on_date'=>'Boshlash kuni',
            'id' => 'ID',
            'header' => 'Asosiy',
            'detail' => 'Qo\'shimcha',
            'image' => 'Rasm',
            'type' => 'Turi',
            'url' => 'Url',
            'oder' => 'Ustunlik',
            'trend_on' => 'Boshlanish',
            'trend_down' => 'Tugash',
            'created' => 'Yaratildi',
            'updated' => 'Yangiladi',
            'status' => 'Holati',
        ];
    }
    public function upload($old = null){
        if($this->image = UploadedFile::getInstance($this,'image')){
            $name = microtime(true).'.'.$this->image->extension;
            $this->image->saveAs(Yii::$app->basePath.'/web/adds/'.$name);
            $this->image = $name;
            return true;
        }else{
            if($old != null){
                $this->image = $old;
                return true;
            }else{
                $this->image = "default.png";
                return true;
            }

        }
    }

}
