<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlastikKarta */

$this->title = 'Ma\'lumotni yangilash: ';
$this->params['breadcrumbs'][] = ['label' => 'Plastik Kartas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plastik-karta-update">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
