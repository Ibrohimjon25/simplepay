<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BankJismShSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bank jismoniy shaxslar ro\'yhati';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-jism-sh-index">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->user->can('can-update-create')): ?>
        <p>
            <?= Html::a('Jismoniy shaxsni ro\'yhatga olish', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif;?>

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'firstname:ntext',
            'lastname:ntext',
            'father_name:ntext',
            'org_name:ntext',
            'email:email',
//            'inn',
//            'passport',
//            'propiska',
            'registration_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
