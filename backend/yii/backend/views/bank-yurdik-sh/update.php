<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BankYuridikSh */

$this->title = 'Tashkilot ma\'lumotlarini o\'zgartirish: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tashkilotlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="bank-yuridik-sh-update">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
