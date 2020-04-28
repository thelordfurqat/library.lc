<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;


/**
 * This is the model class for table "library".
 *
 * @property int $id
 * @property string $code
 * @property string $name Nomi
 * @property int $bank_id Bank
 * @property string|null $bank_account_number Xisob raqami
 * @property string|null $oked Oked
 * @property string|null $inn
 * @property int $country_id Mamlakat
 * @property int $region_id Viloyat(Shaxar)
 * @property int $district_id Hudud
 * @property string|null $address Manzil
 * @property string|null $phone Telefon
 * @property string|null $fax Fax
 * @property string|null $telegram_channel Telegram kanal
 * @property string $chat_id
 * @property string|null $director Direktor
 * @property string|null $buxgalter Buxgalter
 * @property string|null $email Email
 * @property string|null $created Yaratildi
 * @property string|null $updated Yangilandi
 * @property int|null $status
 * @property string|null $setting
 * @property string $image Rasm
 * @property float $balans
 * @property string|null $telegram_username Telegram username
 * @property string|null $instagram Instagram
 *
 * @property Bank $bank
 * @property Country $country
 * @property District $district
 * @property Region $region
 * @property User[] $users
 */
class Library extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'library';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'country_id', 'region_id', 'district_id'], 'required'],
            [['bank_id', 'country_id', 'region_id', 'district_id', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['setting'], 'string'],
            [['balans'], 'number'],
            [['code', 'name', 'bank_account_number', 'oked', 'inn', 'address', 'phone', 'fax', 'telegram_channel', 'chat_id', 'director', 'buxgalter', 'email', 'image', 'telegram_username', 'instagram'], 'string', 'max' => 255],
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['bank_id' => 'bank_id']],
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
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Nomi',
            'bank_id' => 'Bank',
            'bank_account_number' => 'Xisob raqami',
            'oked' => 'Oked',
            'inn' => 'Inn',
            'country_id' => 'Mamlakat',
            'region_id' => 'Viloyat(Shaxar)',
            'district_id' => 'Hudud',
            'address' => 'Manzil',
            'phone' => 'Telefon',
            'fax' => 'Fax',
            'telegram_channel' => 'Telegram kanal',
            'chat_id' => 'Chat ID',
            'director' => 'Direktor',
            'buxgalter' => 'Buxgalter',
            'email' => 'Email',
            'created' => 'Yaratildi',
            'updated' => 'Yangilandi',
            'status' => 'Status',
            'setting' => 'Setting',
            'image' => 'Rasm',
            'balans' => 'Balans',
            'telegram_username' => 'Telegram username',
            'instagram' => 'Instagram',
        ];
    }

    public function getTelegramChannel()
    {
        return '<a href="https://t.me/'.$this->telegram_channel.'" target="_blank">'.$this->telegram_channel.'</a>';
    }
    public function getTelegramUsername()
    {
        return '<a href="https://t.me/'.$this->telegram_username.'" target="_blank">'.$this->telegram_username.'</a>';
    }
    public function getInstagramm()
    {
        return '<a href="https://instagram.com/'.$this->instagram.'" target="_blank">'.$this->instagram.'</a>';
    }
    public function getEMail()
    {
        return '<a href="mailto:'.$this->email.'" target="_blank">'.$this->email.'</a>';
    }
    /**
     * Gets query for [[Bank]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(Bank::className(), ['bank_id' => 'bank_id']);
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

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['library_id' => 'id']);
    }

    public function upload($old = null){
        if($this->image = UploadedFile::getInstance($this,'image')){
            $name = microtime(true).'.'.$this->image->extension;
            $this->image->saveAs(Yii::$app->basePath.'/web/library-images/'.$name);
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

    public function getBooks()
    {
        $array=[];
        $query='SELECT * FROM book WHERE ';
        $have=false;
        foreach ($this->users as $item) {
            if ($have)
                $query.=' or';
            $have=true;
            $query.=' user_id='.$item->id;
        }
        if($have)
        $array=Book::findBySql($query)->all();
        return $array;
    }
    public function getBooksCount()
    {
        $array=0;
        $query='SELECT * FROM book WHERE ';
        $have=false;
        foreach ($this->users as $item) {
            if ($have)
                $query.=' or';
            $have=true;
            $query.=' user_id='.$item->id;
        }
        if($have)
        $array=Book::findBySql($query)->count();
        return $array;
    }

    public function getBooksQuery()
    {
        $query='SELECT * FROM book WHERE ';
        $have=false;
        foreach ($this->users as $item) {
            if ($have)
                $query.=' or';
            $have=true;
            $query.=' user_id='.$item->id;
        }
        if($have)
        return $query;
        else return 'SELECT * FROM book WHERE user_id=-1';
    }

}
