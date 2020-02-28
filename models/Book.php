<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id Id
 * @property string $alias Alias
 * @property string $name Nomi
 * @property string $certificate Sertifikat kodi
 * @property int $certificator_id Sertifikator
 * @property string $year Yil
 * @property string $made_in Chiqarilgan sana
 * @property int $publisher_id Nashriyotchi
 * @property string $authors Avtor
 * @property int $sales Sotuvlar soni
 * @property string $code Kodi
 * @property int $show_counter Ko'rishlar soni
 * @property int $price Narxi
 * @property int $old_price Eski narxi
 * @property int $arenda Ijaraga beriladimi
 * @property string $shtrix_code Shrix kodi
 * @property string $isbn_code ISBN
 * @property string $made_date Chop qilingan yili
 * @property int $like_counter Yoqdi
 * @property string $detail Qo'shimcha
 * @property int $page_size Betlar soni
 * @property string $size O'lchami
 * @property string $muqova Muqova
 * @property int $status Status
 * @property int $is_delete O'chirilganmi
 * @property string $created Yaratilgan vaqti
 * @property string $updated Yangilangan vaqti
 * @property string $genre Janr
 * @property string $subject Fan
 * @property int $user_id Foydalanuvchi
 * @property string $image Muqova rasmi
 *
 * @property Certificate $certificator
 * @property Publisher $publisher
 * @property User $user
 * @property Files[] $files
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'certificate', 'certificator_id', 'year', 'made_in', 'publisher_id', 'authors', 'code', 'shtrix_code', 'isbn_code', 'detail', 'page_size', 'size', 'muqova', 'genre', 'subject', 'user_id'], 'required'],
            [['certificator_id', 'publisher_id', 'sales', 'show_counter', 'price', 'old_price', 'arenda', 'like_counter', 'page_size', 'status', 'is_delete', 'user_id'], 'integer'],
            [['year', 'made_in', 'made_date', 'created', 'updated'], 'safe'],
            [['detail'], 'string'],
            [['alias', 'name', 'certificate', 'authors', 'code', 'shtrix_code', 'isbn_code', 'size', 'muqova', 'genre', 'subject', 'image'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['certificator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Certificate::className(), 'targetAttribute' => ['certificator_id' => 'id']],
            [['publisher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Publisher::className(), 'targetAttribute' => ['publisher_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'alias' => 'Alias',
            'name' => 'Nomi',
            'certificate' => 'Sertifikat kodi',
            'certificator_id' => 'Sertifikator',
            'year' => 'Yil',
            'made_in' => 'Chiqarilgan sana',
            'publisher_id' => 'Nashriyotchi',
            'authors' => 'Avtor',
            'sales' => 'Sotuvlar soni',
            'code' => 'Kodi',
            'show_counter' => 'Ko\'rishlar soni',
            'price' => 'Narxi',
            'old_price' => 'Eski narxi',
            'arenda' => 'Ijaraga beriladimi',
            'shtrix_code' => 'Shrix kodi',
            'isbn_code' => 'ISBN',
            'made_date' => 'Chop qilingan yili',
            'like_counter' => 'Yoqdi',
            'detail' => 'Qo\'shimcha',
            'page_size' => 'Betlar soni',
            'size' => 'O\'lchami',
            'muqova' => 'Muqova',
            'status' => 'Status',
            'is_delete' => 'O\'chirilganmi',
            'created' => 'Yaratilgan vaqti',
            'updated' => 'Yangilangan vaqti',
            'genre' => 'Janr',
            'subject' => 'Fan',
            'user_id' => 'Foydalanuvchi',
            'image' => 'Muqova rasmi',
        ];
    }

    /**
     * Gets query for [[Certificator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCertificator()
    {
        return $this->hasOne(Certificate::className(), ['id' => 'certificator_id']);
    }

    /**
     * Gets query for [[Publisher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublisher()
    {
        return $this->hasOne(Publisher::className(), ['id' => 'publisher_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Files]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['book_id' => 'id']);
    }
}
