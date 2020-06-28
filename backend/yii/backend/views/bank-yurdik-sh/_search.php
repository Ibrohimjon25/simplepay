<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankYuridikShSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-yuridik-sh-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>


    <?= $form->field($model, 'org_name') ?>


    <?php // echo $form->field($model, 'passport') ?>

    <?php // echo $form->field($model, 'registration_date') ?>

    <?php // echo $form->field($model, 'hisob_raqam') ?>

    <?php // echo $form->field($model, 'mablag') ?>

    <div class="form-group">
        <?= Html::submitButton('Izlash', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Tozalash', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
