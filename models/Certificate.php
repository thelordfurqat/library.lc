<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "certificate".
 *
 * @property int $id Id
 * @property string $name Nomi
 * @property string $image Rasm
 *
 * @property Book[] $books
 */
class Certificate extends \yii\db\ActiveRecord
{
    public $number;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'certificate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image'], 'required'],
            [['name', 'image'], 'string', 'max' => 255],
            [['number'],'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'name' => 'Nomi',
            'image' => 'Rasm',
            'number'=>'Raqami',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['certificator_id' => 'id']);
    }
    public function upload($old = null){
        if($this->image = UploadedFile::getInstance($this,'image')){
            $name = microtime(true).'.'.$this->image->extension;
            $this->image->saveAs(Yii::$app->basePath.'/web/certificates/'.$name);
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
