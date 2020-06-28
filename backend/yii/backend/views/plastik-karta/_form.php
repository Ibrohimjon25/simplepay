<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlastikKarta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plastik-karta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        echo $form->field($model, 'bank_jism_id')
            ->dropDownList(
                ArrayHelper::map(\app\models\BankJismSh::find()->asArray()->all(), 'id', 'lastname')
            )
    ?>

    <?= $form->field($model, 'olingan_sana')->hiddenInput(['value' => date('m/d/Y')])->label(false) ?>

    <?= $form->field($model, 'mablag')->textInput() ?>

    <?= $form->field($model, 'karta_raqam')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
