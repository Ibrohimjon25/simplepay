<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">PAY</span><span class="logo-lg">SimplePay</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div style="margin-right: 40px" class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/uploads/<?php echo Yii::$app->user->identity->img ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php echo Yii::$app->user->identity->username ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="/uploads/<?php echo Yii::$app->user->identity->img ?>" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?php echo Yii::$app->user->identity->username ?> - <?php echo Yii::$app->user->identity->profession ?>
                                <small>A'zo bo'lgan <?php echo Yii::$app->user->identity->date_membership ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo \yii\helpers\Url::to(['site/profile'])?>" class="btn btn-default btn-flat">Shaxsiy kabinet</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Chiqish',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->

            </ul>
        </div>
    </nav>
</header>
