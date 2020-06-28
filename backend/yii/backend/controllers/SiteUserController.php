<?php

namespace backend\controllers;

use app\models\BankJismSh;
use app\models\PlastikKarta;
use Yii;
use app\models\SiteUser;
use app\models\SiteUserSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SiteUserController implements the CRUD actions for SiteUser model.
 */
class SiteUserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'logout'],
                        'allow' => true,
                        'roles' => ['kuzatuvchi'],
                    ],
                    [
                        'actions' => ['create', 'update', 'index', 'delete', 'view', 'logout'],
                        'allow' => true,
                        'roles' => ['admin', 'manager'],
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
     * Lists all SiteUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SiteUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SiteUser model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SiteUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SiteUser();

        if ($model->load(Yii::$app->request->post())) {
            $karta = PlastikKarta::find()->where(['karta_raqam'=>$model->karta_id])->one();
            if (!empty($karta)){
                $person = BankJismSh::find()->where(['id'=>$karta['bank_jism_id']])->one();
                $model->firstname = $person['firstname'];
                $model->lastname = $person['lastname'];
                $model->jism_id = $person['id'];
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }else{

                echo Yii::$app->session->setFlash('danger', "Kechirasiz bunday plastik karta raqamli shaxs mavjud emas");
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SiteUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $karta = PlastikKarta::find()->where(['karta_raqam'=>$model->karta_id])->one();
            if (!empty($karta)){
                $person = BankJismSh::find()->where(['id'=>$karta['bank_jism_id']])->one();
                $model->firstname = $person['firstname'];
                $model->lastname = $person['lastname'];
                $model->jism_id = $person['id'];
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }else{

                echo Yii::$app->session->setFlash('danger', "Kechirasiz bunday plastik karta raqamli shaxs mavjud emas");
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SiteUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SiteUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SiteUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SiteUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*
     * RBAC boshlandi
     * */
    public function actionRbac(){
        //role hosil qilindi
        /*$role = Yii::$app->authManager->createRole('manager');
        $role->description = "Barcha huqularga ega boshqaruvchi";
        Yii::$app->authManager->add($role);

        $admin = Yii::$app->authManager->createRole('admin');
        $admin->description = "Cheklangan huquqlarga ega bo'lgan admin";
        Yii::$app->authManager->add($admin);

        $kuzatuvchi = Yii::$app->authManager->createRole('kuzatuvchi');
        $kuzatuvchi->description = "Faqatgina ma'lumotlarni ko'rish imkoniyatiga ega bo'lgan admin";
        Yii::$app->authManager->add($kuzatuvchi);*/

        //permission hosil qilindi
        /*$permit = Yii::$app->authManager->createPermission('canAdmin');
        $permit->description = "Adminstratorlik huquqini berish";
        Yii::$app->authManager->add($permit);*/

        /*$permit = Yii::$app->authManager->createPermission('can-update-create');
        $permit->description = "Post hosil qilish va uni yangilash";
        Yii::$app->authManager->add($permit);*/

        /*$manager = Yii::$app->authManager->getRole('manager');
        $admin = Yii::$app->authManager->getRole('admin');
        $permit_admin = Yii::$app->authManager->getPermission('canAdmin');
        $permit_post = Yii::$app->authManager->getPermission('can-update-create');
        //Yii::$app->authManager->addChild($manager, $permit_admin);
        Yii::$app->authManager->addChild($admin, $permit_post);
        Yii::$app->authManager->addChild($manager, $permit_post);*/

        /*//$manager = Yii::$app->authManager->getRole('manager');
        $kuzatuvchi = Yii::$app->authManager->getRole('kuzatuvchi');
        $admin = Yii::$app->authManager->getRole('admin');

        //Yii::$app->authManager->assign($manager, 1);
        Yii::$app->authManager->assign($kuzatuvchi, 3);
        Yii::$app->authManager->assign($admin, 4);*/



        return 123;
    }
    /*
     * Rbac tugadi
     * */

}
