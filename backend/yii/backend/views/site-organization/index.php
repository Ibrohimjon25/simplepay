<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SiteOrganizationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'A\'zo tashkilotlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-organization-index">

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
            'email:email',
            'hisob_raqam',
            [
                'attribute'=>'category_id',
                'value'=>function($data){
                    $jism = \app\models\Category::find()->where(['id'=>$data['category_id']])->one();
                    return $jism['name'];
                }
            ],
//            'category_id',
//            'service_name:ntext',
            //'description:ntext',
            //'service_img',
//            'yuridik_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
