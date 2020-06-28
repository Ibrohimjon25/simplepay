<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SiteOrganizationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-organization-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'org_name') ?>

    <?php  echo $form->field($model, 'service_name') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'service_img') ?>

    <?php // echo $form->field($model, 'yuridik_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Izlash', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Tozalash', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
