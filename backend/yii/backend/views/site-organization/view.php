<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SiteOrganization */

$this->title = $model->org_name;
$this->params['breadcrumbs'][] = ['label' => 'Tashkilot', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="site-organization-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
//            'service_name:ntext',
            'description:ntext',
            [
                'attribute' => 'service_img',
                'value'=>'/uploads/' .$model->service_img,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            [
                'attribute'=>'yuridik_id',
                'value'=>function($data){
                    $jism = \app\models\BankYuridikSh::find()->where(['id'=>$data['yuridik_id']])->one();
                    return $jism['org_name'];
                }
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
