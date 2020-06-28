<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use borales\extensions\phoneInput\PhoneInput;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Ro\'yhatdan o\'tish';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Iltimos kerakli ma'lumotlarni kiriting:</p>

    <div  style="margin-left: 0px" class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options'=>['enctype'=>'multipart/form-data']]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Ismni kiriting') ?>

                <?= $form->field($model, 'surname')->textInput(['autofocus' => true])->label('Familiyani kiriting') ?>

            <?php
                echo $form->field($model, 'birthdate')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Tug\'ilgan sana ...'],
                    'pluginOptions' => [
                        'autoclose'=>true
                    ]
                ]);
            ?>

            <?= $form->field($model, 'date_membership')->hiddenInput(['value' => date('Y/m/d')])->label(false) ?>

                <?php
                    echo $form->field($model, 'phone_number')->widget(PhoneInput::className(), [
                        'jsOptions' => [
                            'preferredCountries' => ['uz', 'ru', 'en'],
                        ]
                    ])->label('Telefon raqam');
                ?>

                <?php
                    echo $form->field($model, 'img')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'showPreview' => false,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false
                        ]
                    ])->label('Rasmingizni yuklang');
                ?>

                <?= $form->field($model, 'profession')->hiddenInput(['value' => 'kuzatuvchi'])->label(false) ?>

                <?= $form->field($model, 'status')->hiddenInput(['value' => 10])->label(false) ?>

                <?= $form->field($model, 'email')->label("Elektron pochta") ?>

                <?= $form->field($model, 'password')->passwordInput()->label("Parol") ?>

                <div class="form-group">
                    <?= Html::submitButton('Ro\'yhatdan o\'tish', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
