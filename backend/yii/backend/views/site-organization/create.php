<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteOrganization */

$this->title = 'A\'zo tashkilotlar';
$this->params['breadcrumbs'][] = ['label' => 'A\'zo tashkilotlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-organization-create">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
