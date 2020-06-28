<?php

namespace backend\controllers;

use app\models\BankYuridikSh;
use Yii;
use app\models\SiteOrganization;
use app\models\SiteOrganizationSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SiteOrganizationController implements the CRUD actions for SiteOrganization model.
 */
class SiteOrganizationController extends Controller
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
     * Lists all SiteOrganization models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SiteOrganizationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SiteOrganization model.
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
     * Creates a new SiteOrganization model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SiteOrganization();

        if ($model->load(Yii::$app->request->post())) {
            $yuridik = BankYuridikSh::find()->where(['hisob_raqam'=>$model->hisob_raqam])->one();
            $model->service_img = UploadedFile::getInstance($model, 'service_img');
            /*echo "<pre>";
            print_r($model);
            die();*/
            if (!empty($yuridik)){
                $model->org_name = $yuridik['org_name'];
                $model->email = $yuridik['email'];
                if ($model->uploadserviceimg()){
                    $model->save(false);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SiteOrganization model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->passport = UploadedFile::getInstance($model, 'service_img');
            if ($model->uploadserviceimg()){
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SiteOrganization model.
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
     * Finds the SiteOrganization model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SiteOrganization the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SiteOrganization::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
