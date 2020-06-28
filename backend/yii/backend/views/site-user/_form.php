<?php

use borales\extensions\phoneInput\PhoneInput;
use kartik\typeahead\Typeahead;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SiteUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        echo $form->field($model, 'phone_number')->widget(PhoneInput::className(), [
            'jsOptions' => [
                'preferredCountries' => ['uz', 'ru', 'en'],
            ]
        ]);
    ?>

    <?php
        $data1 = \app\models\PlastikKarta::find()->asArray()->all();
        $i=0;
        foreach ($data1 as $d){
            $ar[$i] = $d['karta_raqam'];
            $i++;
        }
         echo $form->field($model, 'karta_id')->widget(Typeahead::classname(), [
            'pluginOptions' => ['highlight' => true],
            'options' => [
                'placeholder' => 'Karta raqamni kiriting'
            ],
            'dataset' => [
                [
                    'local' => $ar,
                    'limit' => 10
                ]
            ],
            'pluginEvents' => [
                "typeahead:selected" => "function(obj, item) {
                    console.log(item); return true; }",
                "typeahead:render" => "function() {
                    console.log('Whatever...'); }",
            ],
         ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
