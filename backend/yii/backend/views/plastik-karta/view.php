<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PlastikKarta */
$jism = \app\models\BankJismSh::find()->where(['id'=>$model->bank_jism_id])->one();
$this->title = $jism['lastname'].' '.$jism['firstname'];
$this->params['breadcrumbs'][] = ['label' => 'Plastik Kartalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="plastik-karta-view">

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
            [
                'attribute'=>'bank_jism_id',
                'value'=>function($data){
                    $jism = \app\models\BankJismSh::find()->where(['id'=>$data['id']])->one();
                    return $jism['firstname'].' '.$jism['lastname'].' '.$jism['father_name'];
                }
            ],
            'olingan_sana',
            'mablag',
            'karta_raqam',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
