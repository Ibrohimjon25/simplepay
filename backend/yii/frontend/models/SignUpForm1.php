<?php
namespace frontend\models;

use app\models\SiteUser;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignUpForm1 extends Model
{
    public $phone_number;
    public $karta_id;
    public $firstname;
    public $lastname;
    public $password;
    public $jism_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['phone_number' , 'required'],
            ['karta_id', 'required'],
            [['firstname', 'lastname'], 'string'],
            ['karta_id', 'unique', 'targetClass' => '\app\models\SiteUser', 'message' => 'This username has already been taken.'],
            ['password', 'required'],
            [['karta_id'], 'integer', 'max' => 9999999999999999, 'min'=>100000000000],
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
        $user = new SiteUser();
        $user->phone_number = $this->phone_number;
        $user->karta_id = $this->karta_id;
        $user->jism_id = $this->jism_id;
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->status = 10;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        //$user->generateEmailVerificationToken();
        return $user->save() ;

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
}
