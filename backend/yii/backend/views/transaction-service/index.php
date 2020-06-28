<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TransactionServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Xizmatlarga to\'lovlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-service-index">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sender_karta_num',
            'receiver_hisob_raqam',
            'summa',
            'date',

            /*['class' => 'yii\grid\ActionColumn'],*/
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
