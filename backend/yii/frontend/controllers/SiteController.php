<?php
namespace frontend\controllers;

use app\models\BankJismSh;
use app\models\BankYuridikSh;
use app\models\PlastikKarta;
use app\models\SiteOrganization;
use app\models\SiteUser;
use app\models\TransactionKarta;
use app\models\TransactionService;
use DateTime;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\SignUpForm1;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $id = SiteUser::find()->where(['lastname'=>$model->username])->one();
            return $this->redirect(['/site/cabinet', 'id' => $id['id']]);

        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */

    public function actionSignup()
    {
        $model = new SignupForm1();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $karta = PlastikKarta::find()->where(['karta_raqam'=>$model->karta_id])->one();
            $person = BankJismSh::find()->where(['id'=>$karta['bank_jism_id']])->one();
            $model->firstname = $person['firstname'];
            $model->lastname = $person['lastname'];
            $model->jism_id = $person['id'];
            if ($model->validate()){
                $model->signup();
                return $this->redirect(['site/login']);
            }else{
                Yii::$app->session->setFlash('success', "Ushbu karta egasi bizda ro'yhatga olingan");
                return $this->redirect(['site/signup']);
            }
//            $model->signup();
//            return $this->redirect(['site/login']);
        }else{

            echo Yii::$app->session->setFlash('danger', "Kechirasiz bunday plastik karta raqamli shaxs mavjud emas");
        }


        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionTashkilot($id){
        $model = SiteOrganization::findOne($id);
        $org = SiteOrganization::find()->where(['id'=>$id])->one();
        $model1 = new TransactionService();
        if ($org['category_id'] == 1){
            if ($model1->load(Yii::$app->request->post())){
                if (!empty($model1->login) && !empty($model1->summa) && !empty($model1->sender_karta_num)){
                    $plastik = PlastikKarta::find()->where(['karta_raqam'=>$model1->sender_karta_num])->one();
                    if ($plastik['mablag'] >= $model1->summa){
                        $bank = BankYuridikSh::find()->where(['id'=>$model['yuridik_id']])->one();
                        $sender = $plastik['mablag'] - $model1->summa;
                        $receiver = $bank['mablag'] + $model1->summa;

                        /*Tranzaktsiya jadvaliga saqlas*/
                        date_default_timezone_set("Asia/Tashkent");
                        $dt =  date( 'H:i:s Y-m-d');
                        $model1->date = $dt;
                        $model1->receiver_hisob_raqam = $model->hisob_raqam;
                        $model1->save(false);
                        /*//////////////////////////////*/

                        Yii::$app->db->createCommand('UPDATE bank_yuridik_sh SET mablag = '.$receiver.' WHERE id='.$bank['id'])
                            ->execute();
                        Yii::$app->db->createCommand('UPDATE plastik_karta SET mablag = '.$sender.' WHERE id='.$plastik['id'])
                            ->execute();

                        Yii::$app->session->setFlash('success', "To'lov muvaffaqqiyatli amalga oshirildi");
                        return $this->redirect(['tashkilot', 'id' => $id]);
                    }else{
                        Yii::$app->session->setFlash('danger', "Kartada yetarli mablag' majud emas");
                        return $this->redirect(['tashkilot', 'id' => $id]);
                    }
                }else{
                    Yii::$app->session->setFlash('warning', "Bunday plastik karta mavjud emas yoki ma'lumotlar to'liq kiritilmadi");
                    return $this->redirect(['tashkilot', 'id' => $id]);
                }
            }
            return $this->render('tashkilot', [
                'model'=>$model,
                'model1'=>$model1
            ]);
        }else{
            if ($model1->load(Yii::$app->request->post())){
                if (!empty($model1->login) && !empty($model1->summa) && !empty($model1->sender_karta_num)){
                    $plastik = PlastikKarta::find()->where(['karta_raqam'=>$model1->sender_karta_num])->one();
                    if ($plastik['mablag'] >= $model1->summa){
                        $bank = BankYuridikSh::find()->where(['id'=>$model['yuridik_id']])->one();
                        $sender = $plastik['mablag'] - $model1->summa;
                        $receiver = $bank['mablag'] + $model1->summa;

                        /*Tranzaktsiya jadvaliga saqlas*/
                        date_default_timezone_set("Asia/Tashkent");
                        $dt =  date( 'H:i:s Y-m-d');
                        $model1->date = $dt;
                        $model1->receiver_hisob_raqam = $model->hisob_raqam;
                        $model1->save(false);
                        /*//////////////////////////////*/

                        Yii::$app->db->createCommand('UPDATE bank_yuridik_sh SET mablag = '.$receiver.' WHERE id='.$bank['id'])
                            ->execute();
                        Yii::$app->db->createCommand('UPDATE plastik_karta SET mablag = '.$sender.' WHERE id='.$plastik['id'])
                            ->execute();
                        Yii::$app->session->setFlash('success', "To'lov muvaffaqqiyatli amalga oshirildi");
                        return $this->redirect(['tashkilot', 'id' => $id]);
                    }else{
                        Yii::$app->session->setFlash('danger', "Kartada yetarli mablag' majud emas");
                        return $this->redirect(['tashkilot', 'id' => $id]);
                    }
                }else{
                    Yii::$app->session->setFlash('warning', "Bunday plastik karta mavjud emas yoki ma'lumotlar to'liq kiritilmadi");
                    return $this->redirect(['tashkilot', 'id' => $id]);
                }
            }
            return $this->render('tashkilot1', [
                'model'=>$model,
                'model1'=>$model1
            ]);
        }

    }

    public function  actionTransferKarta(){
        $model = new TransactionKarta();
        if($model->load(Yii::$app->request->post())){
            date_default_timezone_set("Asia/Tashkent");
            $dt =  date( 'H:i:s Y-m-d');
            $model->date = $dt;

            if ($model->receiver_karta_num == $model->sender_karta_num){
                Yii::$app->session->setFlash('danger', "Karta raqamlarini bir xil kiritdingiz");
            }else{
                $sender = PlastikKarta::find()->where(['karta_raqam'=>$model->sender_karta_num])->one();
                $receiver = PlastikKarta::find()->where(['karta_raqam'=>$model->receiver_karta_num])->one();
                if (!empty($sender) && !empty($receiver) && !empty($model->summa)){
                    if ($sender['mablag'] >= $model->summa ){
                        $sender_sum = $sender['mablag'] - $model->summa;
                        $receiver_sum = $receiver['mablag'] + $model->summa;
                        Yii::$app->db->createCommand('UPDATE plastik_karta SET mablag = '.$sender_sum.' WHERE id='.$sender['id'])
                            ->execute();
                        Yii::$app->db->createCommand('UPDATE plastik_karta SET mablag = '.$receiver_sum.' WHERE id='.$receiver['id'])
                            ->execute();
                        $model->save(false);
                        Yii::$app->session->setFlash('success', "Tranzaksiya amalga oshirildi");
                    }else{
                        Yii::$app->session->setFlash('warning', "Yuboruvchining hisobida yetarli mablag' mavjud emas!!!");
                        return $this->redirect('transfer-karta');
                    }
                }else{
                    Yii::$app->session->setFlash('danger', "Qabul qiluvchi yoki yuboruvchi karta raqam notogri kiritildi yohud ma'lumotlar to'liqligicha kiritilmadi");
                    return $this->redirect('transfer-karta');
                }
            }
            return $this->redirect('transfer-karta');
        }
        return $this->render('transfer-karta', [
                'model'=>$model
            ]);
    }

    public function actionCabinet($id){
        $model = SiteUser::findOne($id);
        return $this->render('cabinet', [
            'model'=>$model
        ]);
    }
}