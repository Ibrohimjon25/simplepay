<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BankJismSh */

$this->title = $model->lastname;

$this->params['breadcrumbs'][] = ['label' => 'Jismoniy shaxs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bank-jism-sh-view">

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
            'org_name:ntext',
            'firstname:ntext',
            'lastname:ntext',
            'father_name:ntext',
            'email:email',
            'inn',
            [
                'attribute' => 'passport',
                'value'=>'/uploads/' .$model->passport,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            [
                'attribute' => 'propiska',
                'value'=>'/uploads/' .$model->propiska,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            'registration_date',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
