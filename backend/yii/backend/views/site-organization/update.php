<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteOrganization */

$this->title = 'A\'zo tashkilot';
$this->params['breadcrumbs'][] = ['label' => 'A\'zo tashkilotlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="site-organization-update">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
