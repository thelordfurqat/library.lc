<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "publisher".
 *
 * @property int $id Id
 * @property string $name Nashriyot
 * @property int $country_id Mamlakat
 * @property int $region_id Viloyat
 * @property int $district_id Tuman (shaxar)
 * @property string $lat Shimoliy kenglik
 * @property string $lng Janubiy kenglik
 * @property string $detail Qo'shimcha
 * @property string $created Yaratildi
 * @property string $image Rasm
 * @property string $address
 *
 * @property Book[] $books
 * @property Country $country
 * @property District $district
 * @property Region $region
 */
class Publisher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publisher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', ], 'required'],
            [['country_id', 'region_id', 'district_id'], 'integer'],
            [['detail'], 'string'],
            [['created'], 'safe'],
            [['name', 'lat', 'lng', 'image','address'], 'string', 'max' => 255],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'name' => 'Nashriyot',
            'country_id' => 'Mamlakat',
            'region_id' => 'Viloyat',
            'district_id' => 'Tuman (shaxar)',
            'lat' => 'Shimoliy kenglik',
            'lng' => 'Janubiy kenglik',
            'detail' => 'Qo\'shimcha',
            'created' => 'Yaratildi',
            'image' => 'Rasm',
            'address'=>'Manzil'
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['publisher_id' => 'id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    public function upload($old = null){
        if($this->image = UploadedFile::getInstance($this,'image')){
            $name = microtime(true).'.'.$this->image->extension;
            $this->image->saveAs(Yii::$app->basePath.'/web/publisher/'.$name);
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
