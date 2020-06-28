<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $surname;
    public $birthdate;
    public $date_membership;
    public $profession;
    public $description;
    public $phone_number;
    public $statuss;
    public $img;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['surname', 'string', 'min' => 2, 'max' => 255],
            ['birthdate', 'string', 'min' => 2, 'max' => 255],
            ['date_membership', 'string', 'min' => 2, 'max' => 255],
            ['profession', 'string', 'min' => 2, 'max' => 255],
            ['description', 'string', 'max' => 500],
            ['phone_number', 'string', 'min' => 2, 'max' => 255],
            ['statuss', 'integer'],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->surname = $this->surname;
        $user->birthdate = $this->birthdate;
        $user->description = $this->description;
        $user->date_membership = $this->date_membership;
        $user->phone_number = $this->phone_number;
        $user->profession = $this->profession;
        $user->status = $this->statuss;
        $user->email = $this->email;
        $user->img = $this->img;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
    public function upload()
    {
        if ($this->validate()) {

            $this->img->saveAs('/uploads/' . $this->img->baseName . '.' . $this->img->extension, false);
            return true;
        } else {
            return false;
        }
    }
}
