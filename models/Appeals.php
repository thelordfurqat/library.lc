<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "appeals".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property string $file
 * @property string $created
 */
class Appeals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appeals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'body'], 'required'],
            [['body'], 'string'],
            [['status'], 'integer'],
            [['created'], 'safe'],
            [['name', 'phone', 'email', 'subject', 'file'], 'string', 'max' => 255],
            ['file','file','maxSize'=>1024*1024*4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'F.I.O',
            'phone' => 'Telefon',
            'email' => 'Email',
            'subject' => 'Mavzu',
            'body' => 'Murojaat matni',
            'file' => 'Fayl',
            'created' => 'Created',
        ];
    }
    public function uploadfile($file = null){

        if($this->file = UploadedFile::getInstance($this,'file')){
            $name = round(microtime(true)).'.'.$this->file->extension;
            $this->file->saveAs(Yii::$app->basePath.'/web/uploads/'.$name);
            $this->file = $name;
            return true;
        }else{
            if($file != null){
                $this->file = $file;
                return false;
            }else {
                return false;
            }
        }
    }
}
