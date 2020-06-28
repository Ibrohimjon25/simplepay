<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategoriyalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1 style="font-size: 30px !important;"><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->user->can('can-update-create')): ?>
        <p>
            <?= Html::a('Kategoriya qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif;?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name:ntext',
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
