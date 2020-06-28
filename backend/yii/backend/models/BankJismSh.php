<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "bank_jism_sh".
 *
 * @property int $id
 * @property string|null $org_name
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $father_name
 * @property string|null $email
 * @property string|null $inn
 * @property string|null $passport
 * @property string|null $propiska
 * @property string|null $registration_date
 *
 * @property PlastikKarta[] $plastikKartas
 * @property SiteUser[] $siteUsers
 */
class BankJismSh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_jism_sh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['org_name', 'firstname', 'lastname', 'father_name'], 'string'],
            [['email', 'registration_date'], 'string', 'max' => 255],
            [['inn', 'created_at', 'updated_at'], 'integer'],
            [['passport'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg'],
            [['propiska'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'org_name' => 'Ish joyi',
            'firstname' => 'Familiya',
            'lastname' => 'Ism',
            'father_name' => 'Otasining ismi',
            'email' => 'Elektron pochta',
            'inn' => 'Inn',
            'passport' => 'Shaxsni tasdiqlovchi hujjat',
            'propiska' => 'Yashash manzili',
            'registration_date' => 'Ro\'yhatga olingan sana',
            'created_at'=>'Yozuv yaratilgan sana',
            'updated_at'=>'Yozuv o\'zgartirilgan sana',
        ];
    }

    /**
     * Gets query for [[PlastikKartas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlastikKartas()
    {
        return $this->hasMany(PlastikKarta::className(), ['bank_jism_id' => 'id']);
    }

    /**
     * Gets query for [[SiteUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSiteUsers()
    {
        return $this->hasMany(SiteUser::className(), ['jism_id' => 'id']);
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
    public function uploadpropiska()
    {
        if ($this->validate()) {

            $this->propiska->saveAs('uploads/' . $this->propiska->baseName . '.' . $this->propiska->extension, false);
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
