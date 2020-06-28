<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankYuridikSh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-yuridik-sh-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'org_name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'boss_fio')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">

            <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'mablag')->textInput() ?>
            <?php
                echo $form->field($model, 'passport')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'showPreview' => false,
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false
                    ]
                ])->label('Tashkilot hujjati');
            ?>
        </div>
    </div>
    <?= $form->field($model, 'hisob_raqam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_date')->hiddenInput(['value' => date('Y/m/d')]) ?>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
