<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankJismSh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-jism-sh-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'firstname')->textInput(['maxlength'=>true]) ?>

            <?= $form->field($model, 'lastname')->textInput(['maxlength'=>true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'father_name')->textInput(['maxlength'=>true]) ?>

            <?= $form->field($model, 'org_name')->textInput(['maxlength'=>true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?php
                echo $form->field($model, 'passport')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'showPreview' => false,
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false
                    ]
                ])->label('Shaxsni tasdiqlovchi hujjat');
            ?>

            <?php
            echo $form->field($model, 'propiska')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false
                ]
            ])->label('Yashash manzili haqidagi hujjat rasmi');
            ?>
        </div>
    </div>

    <?= $form->field($model, 'registration_date')->hiddenInput(['value' => date("Y/m/d")]) ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
