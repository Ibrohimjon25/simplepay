<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BankYuridikSh */

$this->title = 'Tashkilotlar';
$this->params['breadcrumbs'][] = ['label' => 'Tashkilot', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-yuridik-sh-create">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
