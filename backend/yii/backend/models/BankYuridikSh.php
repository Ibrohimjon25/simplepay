<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "bank_yuridik_sh".
 *
 * @property int $id
 * @property string|null $org_name
 * @property string|null $boss_fio
 * @property string|null $email
 * @property string|null $inn
 * @property string|null $passport
 * @property string|null $registration_date
 * @property string|null $hisob_raqam
 * @property int|null $mablag
 *
 * @property SiteOrganization[] $siteOrganizations
 */
class BankYuridikSh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_yuridik_sh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['org_name', 'boss_fio'], 'string'],
            [['mablag'], 'default', 'value' => null],
            [['mablag', 'inn', 'created_at', 'updated_at'], 'integer'],
            [['hisob_raqam'], 'integer', 'max' => 99999999999999999999, 'min'=>1000000000000000],
            [['email', 'registration_date'], 'string', 'max' => 255],
            [['passport'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'org_name' => 'Tashkilot nomi',
            'boss_fio' => 'Rahbar shaxs',
            'email' => 'Elektron pochta',
            'inn' => 'Inn',
            'passport' => 'Tashkilot hujjati',
            'registration_date' => 'Ro\'yhatga olingan sana',
            'hisob_raqam' => 'Hisob Raqam',
            'mablag' => 'Mablag\'',
            'created_at'=>'Yozuv yaratilgan sana',
            'updated_at'=>'Yozuv o\'zgartirilgan sana',
        ];
    }

    /**
     * Gets query for [[SiteOrganizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSiteOrganizations()
    {
        return $this->hasMany(SiteOrganization::className(), ['yuridik_id' => 'id']);
    }
    public function uploadpassport()
    {
        if ($this->validate()) {

            $this->passport->saveAs('uploads/' . $this->passport->baseName . '.' . $this->passport->extension, false);
            return true;
        } else {
            return false;
        }
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
}
