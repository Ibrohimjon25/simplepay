<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "plastik_karta".
 *
 * @property int $id
 * @property int|null $bank_jism_id
 * @property string|null $olingan_sana
 * @property int|null $mablag
 *
 * @property BankJismSh $bankJism
 * @property SiteUser[] $siteUsers
 */
class PlastikKarta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plastik_karta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_jism_id', 'mablag'], 'default', 'value' => null],
            [['bank_jism_id', 'mablag', 'karta_raqam', 'created_at', 'updated_at'], 'integer'],
            [['olingan_sana'], 'string', 'max' => 255],
            [['karta_raqam'], 'integer', 'max' => 9999999999999999, 'min'=>100000000000],
            [['bank_jism_id'], 'exist', 'skipOnError' => true, 'targetClass' => BankJismSh::className(), 'targetAttribute' => ['bank_jism_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bank_jism_id' => 'Kartaning egasi',
            'olingan_sana' => 'Olingan Sana',
            'mablag' => 'Mablag',
            'karta_raqam'=>"Plastik karta raqami",
            'created_at'=>'Yozuv yaratilgan sana',
            'updated_at'=>'Yozuv o\'zgartirilgan sana',
        ];
    }

    /**
     * Gets query for [[BankJism]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBankJism()
    {
        return $this->hasOne(BankJismSh::className(), ['id' => 'bank_jism_id']);
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
     * Gets query for [[SiteUsers]].
     *
     * @return \yii\db\ActiveQuery
     */

}
