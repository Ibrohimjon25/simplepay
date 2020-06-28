<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "site_user".
 *
 * @property int $id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $phone_number
 * @property int|null $karta_id
 * @property int|null $jism_id
 *
 * @property BankJismSh $jism
 * @property PlastikKarta $karta
 */
class SiteUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'string'],
            [['karta_id', 'jism_id'], 'default', 'value' => null],
            [['jism_id', 'created_at', 'updated_at'], 'integer'],
            [['karta_id'], 'integer', 'max'=>9999999999999999, 'min'=>1000000000000000],
            [['phone_number'], 'string', 'max' => 13, 'min'=>13],
            [['jism_id'], 'exist', 'skipOnError' => true, 'targetClass' => BankJismSh::className(), 'targetAttribute' => ['jism_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Ismi',
            'lastname' => 'Familiyasi',
            'phone_number' => 'Telefon raqam',
            'karta_id' => 'Karta raqami',
            'jism_id' => 'Jismoniy shaxs',
            'created_at'=>'Yozuv yaratilgan sana',
            'updated_at'=>'Yozuv o\'zgartirilgan sana',
        ];
    }

    /**
     * Gets query for [[Jism]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJism()
    {
        return $this->hasOne(BankJismSh::className(), ['id' => 'jism_id']);
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

    /**
     * Gets query for [[Karta]].
     *
     * @return \yii\db\ActiveQuery
     */

}
