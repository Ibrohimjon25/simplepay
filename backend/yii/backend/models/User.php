<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property string|null $surname
 * @property string|null $birthdate
 * @property string|null $date_membership
 * @property string|null $profession
 * @property string|null $description
 * @property string|null $phone_number
 * @property string|null $img
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token', 'profession', 'img'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['surname', 'birthdate', 'date_membership', 'phone_number'], 'string', 'max' => 25],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'surname' => 'Familiya',
            'birthdate' => 'Tug\'ilgan sana',
            'date_membership' => 'A\'zo bo\'lgan sana',
            'profession' => 'Kasbi',
            'description' => 'Izoh',
            'phone_number' => 'Telefon raqam',
            'img' => 'Rasm',
        ];
    }
    public function upload()
    {
        if ($this->validate()) {

            $this->img->saveAs('uploads/' . $this->img->baseName . '.' . $this->img->extension, false);
            return true;
        } else {
            return false;
        }
    }

}
