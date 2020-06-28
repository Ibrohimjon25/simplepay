<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\IndexAsset;
use kriss\calendarSchedule\CalendarScheduleWidget;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\JsExpression;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

IndexAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html style="font-size: 14px" lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php
$user = \app\models\SiteUser::find()
    ->where(['>=', 'id' ,  1])
    ->count();
$org = \app\models\SiteOrganization::find()
    ->where(['>=', 'id' ,  1])
    ->count();
$admin = \app\models\User::find()
    ->where(['>=', 'id' ,  1])
    ->count();
$service = \app\models\Category::find()
    ->where(['>=', 'id' ,  1])
    ->count();
?>
<!--    bloklar tayyor-->
    <div class="row">
        <div class="col-lg-3">
            <!-- Card -->
            <div class="card card-image"
                 style="background-image: url('/uploads/site-user1.png'); background-size: cover">

                <!-- Content -->
                <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                    <div>
                        <h5 class="pink-text"><i class="fas fa-id-card"></i> Foydalanuvchilar</h5>
                        <h3 class="card-title pt-2"><strong><?php echo $user?></strong></h3>
                        <p>Hozirda tizimda <b><?php echo $user?></b>  ta foydalanuvchi mavjud.</p>
                        <a href="<?php echo \yii\helpers\Url::to('site-user/index')?>" class="btn btn-pink"><i class="fas fa-clone left"></i> Batafsil</a>
                    </div>
                </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-lg-3">
            <!-- Card -->
            <div class="card card-image"
                 style="background-image: url('/uploads/company.jpeg'); background-size: cover">

                <!-- Content -->
                <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                    <div>
                        <h5 class="pink-text"><i class="fab fa-black-tie"></i>A'zo tashkilotlar</h5>
                        <h3 class="card-title pt-2"><strong><?php echo $org?></strong></h3>
                        <p>Hozirda tizimdan <b><?php echo $org?></b>  ta tashkilot ro'yhatdan o'tgan.</p>
                        <a href="<?php echo \yii\helpers\Url::to('site-organization/index')?>" class="btn btn-pink"><i class="fas fa-clone left"></i> Batafsil</a>
                    </div>
                </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-lg-3">
            <!-- Card -->
            <div class="card card-image"
                 style="background-image: url('/uploads/transaction.png'); background-size: cover">

                <!-- Content -->
                <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                    <div>
                        <h5 class="pink-text"><i class="fab fa-amazon-pay"></i>O'tkazmalar</h5>
                        <h3 class="card-title pt-2"><strong>10</strong></h3>
                        <p>Hozirda tizimdan <b>10 </b>  ta o'tkazma amalga oshirilgan.</p>
                        <a href="<?php echo \yii\helpers\Url::to('site-organization/index')?>" class="btn btn-pink"><i class="fas fa-clone left"></i> Batafsil</a>
                    </div>
                </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-lg-3">
            <!-- Card -->
            <div class="card card-image"
                 style="background-image: url('/uploads/admin.jpg'); background-size: cover">

                <!-- Content -->
                <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                    <div>
                        <h5 class="pink-text"><i class="fas fa-child"></i>Adminstratorlar</h5>
                        <h3 class="card-title pt-2"><strong><?php echo $admin?></strong></h3>
                        <p>Hozirda tizimda <b><?php echo $admin?></b>  ta adminstrator mavjud.</p>
                        <a href="<?php echo \yii\helpers\Url::to('user/index')?>" class="btn btn-pink"><i class="fas fa-clone left"></i> Batafsil</a>
                    </div>
                </div>

            </div>
            <!-- Card -->
        </div>
    </div>
<!--    bloklar tayyor-->
    <div style="margin-top: 20px" class="row">
        <div class="col-lg-6">
            <canvas id="lineChart"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="labelChart"></canvas>
        </div>

    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
