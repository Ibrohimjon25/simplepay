<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignUpForm1 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>
    <div class="row">
        <div class="col-lg-2"></div>
        <div style="margin-top: 30px; margin-bottom: 30px" class="col-lg-8">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <p style="text-align: center; font-size: 23px; font-weight: bold">Ro'yhatdan o'tish:</p>
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'phone_number')->textInput(['autofocus' => true])->label('Telefon raqam') ?>

                    <?= $form->field($model, 'karta_id')->textInput()->label('Plastik karta raqami') ?>

                    <?= $form->field($model, 'password')->passwordInput()->label('Parol') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Ro\'yhatdan o\'tish', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>

</div>
