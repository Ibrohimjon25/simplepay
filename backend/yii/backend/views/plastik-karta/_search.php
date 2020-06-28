<?php

use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlastikKartaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plastik-karta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php
        echo $form->field($model, 'bank_jism_id')
            ->dropDownList(
                ArrayHelper::map(\app\models\BankJismSh::find()->asArray()->all(), 'id', 'lastname')
            )
    ?>

    <?php
        echo $form->field($model, 'olingan_sana')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Sanani tanlang ...'],
            'pluginOptions' => [
                'autoclose'=>true
            ]
        ]);
    ?>
    <?= $form->field($model, 'karta_raqam')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Izlash', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Tozalash', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
