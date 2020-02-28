<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id Id
 * @property string $code Kod
 * @property string $preview Qisqacha
 * @property string $detail Qo'shimcha
 * @property int $book_id Kitob
 * @property string $created Yaratildi
 * @property string $updated Yangilandi
 * @property int $is_delete O'chirilgan
 * @property int $status Status
 *
 * @property Book $book
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'preview', 'detail', 'book_id'], 'required'],
            [['preview', 'detail'], 'string'],
            [['book_id', 'is_delete', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['code'], 'string', 'max' => 255],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'code' => 'Kod',
            'preview' => 'Qisqacha',
            'detail' => 'Qo\'shimcha',
            'book_id' => 'Kitob',
            'created' => 'Yaratildi',
            'updated' => 'Yangilandi',
            'is_delete' => 'O\'chirilgan',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }
}
