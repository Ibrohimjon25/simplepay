<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/uploads/<?php echo Yii::$app->user->identity->img ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->username?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Jadvallar', 'options' => ['class' => 'header']],
                    ['label' => 'Jismoniy shaxslar', 'icon' => 'fa address-card', 'url' => ['bank-jism-sh/index']],
                    ['label' => 'Yuridik shaxslar', 'icon' => 'users', 'url' => ['bank-yurdik-sh/index']],
                    ['label' => 'Kategoriyalar', 'icon' => 'file-text-o', 'url' => ['category/index']],
                    ['label' => 'Plastik kartalar', 'icon' => 'credit-card', 'url' => ['plastik-karta/index']],
                    ['label' => 'Azo tashkilotlar', 'icon' => 'clipboard', 'url' => ['site-organization/index']],
                    ['label' => 'Foydalanuvchilar', 'icon' => 'child', 'url' => ['site-user/index']],
                    ['label' => 'Kartadan-kartaga tranzaksiya', 'icon' => 'credit-card', 'url' => ['transaction-karta/index']],
                    ['label' => 'Xizmatlarga to\'lovlar', 'icon' => 'credit-card', 'url' => ['transaction-service/index']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Adminstrator ma\'lumotlari',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Adminstratorlar', 'icon' => 'child', 'url' => ['user/index']],
                            ['label' => 'Adminstrator huquqlari', 'icon' => 'child', 'url' => ['auth-assignment/index']],
                        ],
                    ],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
