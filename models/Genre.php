<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property int $id Id
 * @property string $name Janr
 * @property Book $books Kitoblar
 * @property int $count Janrdagi kitoblar soni
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['count'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'name' => 'Janr',
            'count' => 'Janrdagi kitoblar soni',
        ];
    }
    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return Book::find()->filterWhere(['like','genres','"'.$this->id.'"'])->andWhere(['>','status',0])->all();

//        return Book::find()->filterWhere(['like','genres','%"'.$this->id.'"%'])->all();
    }
    public function getBooksCount()
    {
        return Book::find()->filterWhere(['like','genres','"'.$this->id.'"'])->andWhere(['>','status',0])->count();

//        return Book::find()->filterWhere(['like','genres','%"'.$this->id.'"%'])->all();
    }
}
