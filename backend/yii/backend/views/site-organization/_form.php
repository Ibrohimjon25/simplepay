<?php

use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SiteOrganization */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-organization-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'yuridik_id')
        ->dropDownList(
            ArrayHelper::map(\app\models\BankYuridikSh::find()->asArray()->all(), 'id', 'org_name')
        )
    ?>

    <?php
        echo $form->field($model, 'category_id')
            ->dropDownList(
                ArrayHelper::map(\app\models\Category::find()->asArray()->all(), 'id', 'name')
            )
    ?>

    <?php // $form->field($model, 'org_name')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hisob_raqam')->textInput(['maxlength' => true]) ?>



    <?php $form->field($model, 'service_name')->textInput(['maxlength'=>true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php
        echo $form->field($model, 'service_img')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showPreview' => false,
                'showCaption' => true,
                'showRemove' => true,
                'showUpload' => false
            ]
        ])->label('Rasm');
    ?>



    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
