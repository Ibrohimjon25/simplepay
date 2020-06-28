<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankJismShSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-jism-sh-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'org_name') ?>

            <?= $form->field($model, 'firstname') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'lastname') ?>

            <?= $form->field($model, 'father_name') ?>
        </div>
    </div>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'passport') ?>

    <?php // echo $form->field($model, 'propiska') ?>

    <?php // echo $form->field($model, 'registration_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Izlash', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Tozalash', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
