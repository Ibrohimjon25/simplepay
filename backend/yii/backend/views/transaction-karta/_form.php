<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransactionKarta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaction-karta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'sender_karta_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receiver_karta_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summa')->textInput() ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
