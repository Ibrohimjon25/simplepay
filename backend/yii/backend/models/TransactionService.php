<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction_service".
 *
 * @property int $id
 * @property string|null $sender_karta_num
 * @property string|null $receiver_hisob_raqam
 * @property int|null $summa
 * @property string|null $date
 */
class TransactionService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'summa'], 'default', 'value' => null],
            [['id', 'summa'], 'integer'],
            [['sender_karta_num', 'receiver_hisob_raqam', 'date'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender_karta_num' => 'Yuboruvchi karta raqami',
            'receiver_hisob_raqam' => 'Qabul qiluvchi tashkilot hisob raqami',
            'summa' => 'Summa',
            'date' => 'Sana',
        ];
    }
}
