<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "author".
 *
 * @property int $id Id
 * @property int $likecounter Like
 * @property string $name Avtor
 * @property string $detail Qo'shimcha
 * @property string $code Kod
 * @property Book[] $books Kitoblar
 * @property string $image Rasm
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['detail'], 'string'],
            [['name', 'code', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'name' => 'Avtor',
            'detail' => 'Qo\'shimcha',
            'code' => 'Kod',
            'image' => 'Rasm',
        ];
    }
    public function upload($old = null){
        if($this->image = UploadedFile::getInstance($this,'image')){
            $name = microtime(true).'.'.$this->image->extension;
            $this->image->saveAs(Yii::$app->basePath.'/web/authorspic/'.$name);
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
    /**
     * Gets query for [[Books]].
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getBooks()
    {
        return Book::find()->filterWhere(['like','authors','"'.$this->id.'"'])->andWhere(['>','status',0])->all();
//        return Book::find()->where('like','authors',)->all();
    }
    public function getBooksCount()
    {
        return Book::find()->filterWhere(['like','authors','"'.$this->id.'"'])->andWhere(['>','status',0])->count();
//        return Book::find()->where('like','authors',)->all();
    }

    public function getLikecounter()
    {
        $like=0;
        foreach ($this->books as $book) {
            $like+=$book->like_counter;
        }
        return $like;
    }
}
