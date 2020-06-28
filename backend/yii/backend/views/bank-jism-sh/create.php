<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BankJismSh */

$this->title = 'Jismoniy shaxsni ro\'yhatdan o\'tkazish';
$this->params['breadcrumbs'][] = ['label' => 'Jismoniy shaxslar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-jism-sh-create">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
