<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PlastikKartaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plastik Kartochkalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plastik-karta-index">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->user->can('can-update-create')): ?>
        <p>
            <?= Html::a('Ro\'yhatdan o\'tkazish', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif;?>

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'bank_jism_id',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
