<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransactionServiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaction-service-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>



    <?= $form->field($model, 'sender_karta_num') ?>

    <?= $form->field($model, 'receiver_hisob_raqam') ?>

    <div class="form-group">
        <?= Html::submitButton('Izlash', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Tozalash', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
