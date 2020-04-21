<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property int $bank_id
 * @property string $mfo
 * @property string $bank_name
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mfo', 'bank_name'], 'required'],
            [['mfo', 'bank_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bank_id' => 'Bank ID',
            'mfo' => 'Mfo',
            'bank_name' => 'Bank Name',
        ];
    }
}
