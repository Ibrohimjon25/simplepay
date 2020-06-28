<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-top: 60px" class="site-login">
    <!-- Default form login -->


    <!-- Default form login -->


    <div  class="row">
        <div class="col-lg-2"></div>
        <div style="padding: 10px; " class="col-lg-8">

                <div class="row">
                    <div class="col-lg-3"></div>
                    <div style="border: 1.4px solid #00bfff; border-radius: 7px; margin-bottom: 50px; padding: 20px" class="col-lg-6">
                        <p style="text-align: center; font-size: 23px; font-weight: bold">Shaxsiy kabinetga kirish:</p>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Loginni kiriting') ?>

                        <?= $form->field($model, 'password')->passwordInput()->label('Parolni kiriting') ?>

                        <?= $form->field($model, 'rememberMe')->checkbox()->label('Meni eslab qol') ?>



                        <div class="form-group">
                            <?= Html::submitButton('Kirish', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="col-lg-3"></div>
                </div>

        </div>
        <div class="col-lg-2"></div>
    </div>

</div>
