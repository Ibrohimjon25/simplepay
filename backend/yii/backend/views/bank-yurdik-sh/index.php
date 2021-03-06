<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BankYuridikShSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tashkilotlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-yuridik-sh-index">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->user->can('can-update-create')): ?>
        <p>
            <?= Html::a('Tashkilot qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif;?>

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'org_name:ntext',
            'boss_fio:ntext',
            'email:email',
            'inn',
            //'passport',
            //'registration_date',
            //'hisob_raqam',
            'mablag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
