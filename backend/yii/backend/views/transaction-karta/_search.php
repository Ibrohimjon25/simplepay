<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransactionKartaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaction-karta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>



    <?= $form->field($model, 'sender_karta_num') ?>

    <?= $form->field($model, 'receiver_karta_num') ?>

    <div class="form-group">
        <?= Html::submitButton('Izlash', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Tozalash', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
