<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adminstratorlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>

   <!-- <p>
        <?/*= Html::a('Adminstrator qo\'shish', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
//            'email:email',
//            'status',
            //'created_at',
            //'updated_at',
            //'verification_token',
            'surname',
            'birthdate',
            //'date_membership',
            'profession',
            //'description:ntext',
            'phone_number',
            [
                'attribute' => 'img',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img('/uploads/' . $data['img'],
                        ['width' => '80px',
                            'height' => '80px']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
