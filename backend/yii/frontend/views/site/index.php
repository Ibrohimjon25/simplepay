<?php

/* @var $this yii\web\View */

$this->title = 'SimplePay';
?>

<div class="block">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1>To'lov</h1>
                <p>Har qanday online karta orqali</p>
            </div>
            <div class="col-lg-6">
                <div class="search">
                    <!-- Search form -->
                    <input class="form-control" type="text" placeholder="Izlash" aria-label="Search">
                </div>
            </div>

        </div>

        <?php
            $category  = \app\models\Category::find()->all();
        ?>
        <?php foreach ($category as $cat): ?>
            <?php
                $org = \app\models\SiteOrganization::find()->where(['category_id'=>$cat['id']])->all();
                $count = \app\models\SiteOrganization::find()->where(['category_id'=>$cat['id']])->count();
            ?>
            <?php if(!empty($org)):?>
                <div class="asos">
                    <div class="row">
                        <p><?php echo $cat['name']?></p>
                        <p><?php echo $count?></p>
                        <button style="border-radius: 7px;" type="button" class="btn btn-outline-info waves-effect">Yana</button>
                    </div>
                    <div class="row">
                        <?php
                            $orgs = \app\models\SiteOrganization::find()->where(['category_id'=>$cat['id']])->all();
                        ?>
                        <?php foreach ($orgs as $o): ?>
                            <div class="col-lg-2">
                                <a href="<?php echo \yii\helpers\Url::to(['site/tashkilot', 'id'=>$o['id']])?>">
                                    <div class="img">
                                        <img src="/admin/uploads/<?php echo $o['service_img']?>" alt="">
                                    </div>
                                </a>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            <?php endif;?>

        <?php endforeach;?>
    </div>
</div>
