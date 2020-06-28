<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TransactionKartaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kartadan-kartaga pul o\'tkazmalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-karta-index">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>



    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sender_karta_num',
            'receiver_karta_num',
            'summa',
            'date',

            /*['class' => 'yii\grid\ActionColumn'],*/
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
