<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property int $id Id
 * @property string $name Avtor
 * @property string $detail Qo'shimcha
 * @property string $code Kod
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
            [['name', 'detail', 'code'], 'required'],
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
}
