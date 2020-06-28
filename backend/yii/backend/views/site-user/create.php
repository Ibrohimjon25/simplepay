<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteUser */

$this->title = 'Foydalanuvchi qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Foydalanuvchilar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-user-create">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
