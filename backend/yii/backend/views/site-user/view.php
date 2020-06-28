<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SiteUser */

$this->title = $model->firstname;
$this->params['breadcrumbs'][] = ['label' => 'Foydalanuvchilar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="site-user-view">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->user->can('can-update-create')): ?>
        <p>
            <?= Html::a('O\'zgartirish', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Haqiqatdan ham bu ma\'lumotni o\'chirmoqchimisiz?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif;?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firstname:ntext',
            'lastname:ntext',
            'phone_number',
            'karta_id',
            'jism_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
