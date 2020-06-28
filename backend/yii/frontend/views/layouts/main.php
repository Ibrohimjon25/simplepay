<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>
<div class="header">
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color">
        <div class="container">
            <a style="font-size: 30px; font-weight: bold;" class="navbar-brand" href="<?php echo \yii\helpers\Url::to(['site/index'])?>">SimplePay</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
                $list = Yii::$app->controller->action->id;
            ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item <?php if($list == 'transfer') echo 'active'?>">
                        <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['site/transfer-karta'])?>">
                            Pul o'tkazmalari
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if($list == 'index') echo 'active'?>">
                        <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['site/index'])?>">

                            To'lovlar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Yordam</a>
                        <div style="padding: 10px;" class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <h5>Qo'llab quvvatlash markazining telefon raqamlari</h5>
                            <a class="dropdown-item" href="">+998991234567</a>
                            <a class="dropdown-item" href="">+99899134535344</a>
                            <a class="dropdown-item" href="">Ma'lumotlar va qo'llab quvvatlash markazi</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Tilni o'zgartiring </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                            <a style="color: black;"  class="nav-link" href="#">
                                <img style="width: 25px;margin-right: 10px;" src="/images/flag_uzb.png" alt="">
                                O'zbekcha</a>
                            <a style="color: black;"  class="nav-link" href="#">
                                <img style="width: 25px;margin-right: 10px;" src="/images/russian.png" alt="">
                                Русский</a>
                            <a style="color: black;" class="nav-link" href="#">
                                <img style="width: 25px;margin-right: 10px;" src="/images/united-kingdom-flag-round-icon-256.png" alt="">

                                English</a>

                        </div>
                    </li>

                    <?php $action =  Yii::$app->controller->action->id?>


                    <?php if($action == 'cabinet'): ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['site/index'])?>">
                                <i class="fas fa-arrow-left"></i>
                                Chiqish</a>
                        </li>
                    <?php endif;?>

                    <?php if($action != 'cabinet'): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Shaxsiy kabinet </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                                <a class="dropdown-item" href="<?php echo \yii\helpers\Url::to(['site/login'])?>" >Kabinetga kirish</a>
                                <a class="dropdown-item" href="<?php echo \yii\helpers\Url::to(['site/signup'])?>">Ro'yhatdan o'tish</a>
                            </div>

                        </li>
                    <?php endif;?>


                </ul>
            </div>
        </div>
    </nav>
    <!--/.Navbar -->
</div>
<?= $content?>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3>Qo'llab quvvatlash markazi bilan bog'lanish</h3>
                <h4>+998912323123</h4>
                <h4>+998912323123</h4>
                <div class="row">
                    <a href="#">
                        <img src="/images/instagram.png" alt="">
                    </a>
                    <a href="#">
                        <img src="/images/facebook.png" alt="">
                    </a>
                    <a href="#">
                        <img src="/images/twitter.png" alt="">
                    </a>
                    <a href="#">
                        <img src="/images/linkedin.png" alt="">
                    </a>
                    <a href="#">
                        <img src="/images/telegramm.png" alt="">
                    </a>
                    <p>tuitcoder@gmail.com 2020</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer_row2">
                    <a href="#">Maxfiylik siyosati</a>
                    <a href="#">Ommaviy sfera</a>
                    <a href="#">Dasturchilar uchun</a>
                    <a href="#">Blog</a>
                </div>
            </div>
            <div class="col-lg-5 footer_img">
                <img src="/images/Payment-Method-PNG-Picture.png" alt="">
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>