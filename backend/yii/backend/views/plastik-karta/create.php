<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlastikKarta */

$this->title = 'Plastik Kartani ro\'yhatdan o\'tkazish';
$this->params['breadcrumbs'][] = ['label' => 'Plastik Kartalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plastik-karta-create">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
