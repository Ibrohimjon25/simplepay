<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SiteUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foydalanuvchilar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-user-index">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->can('can-update-create')): ?>
        <p>
            <?= Html::a('Foydalanuvchi qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif;?>



    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'firstname:ntext',
            'lastname:ntext',
            'phone_number',
            'karta_id',
            //'jism_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
