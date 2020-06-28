<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransactionService */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaction-service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'sender_karta_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receiver_hisob_raqam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summa')->textInput() ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
