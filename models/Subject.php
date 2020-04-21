<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id Id
 * @property string $name Fan
 * @property int $count Kitoblar soni
 * @property Book $Books Kitoblar
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
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
            'name' => 'Fan',
            'count' => 'Kitoblar soni',
        ];
    }
    /**
     * Gets query for [[Books]].
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getBooks()
    {
//        return Book::find()->all();

        return Book::find()->where(['subject_id' => $this->id])->andWhere(['>','status',0])->all();

//        return $this->hasMany(Book::className(), ['subject_id' => 'id']);
    }
    public function getBooksCount()
    {
        return Book::find()->where(['subject_id' => $this->id])->andWhere(['>','status',0])->count();
    }
}
