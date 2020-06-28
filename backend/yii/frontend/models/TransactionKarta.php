<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction_karta".
 *
 * @property int $id
 * @property string|null $sender_karta_num
 * @property string|null $receiver_karta_num
 * @property int|null $summa
 * @property string|null $date
 */
class TransactionKarta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction_karta';
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
            [['sender_karta_num', 'receiver_karta_num', 'date'], 'string', 'max' => 255],
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
            'sender_karta_num' => 'Yuboruvchining karta raqami',
            'receiver_karta_num' => 'Qabul qiluvchining karta raqami',
            'summa' => 'Summa',
            'date' => 'O\'tkazilgan sana',
        ];
    }
}
