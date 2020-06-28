<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BankJismSh */

$this->title = 'Ma\'lumotni yangilash: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jismoniy shaxs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bank-jism-sh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
