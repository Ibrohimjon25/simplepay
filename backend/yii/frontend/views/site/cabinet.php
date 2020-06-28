<div style="margin-bottom: 100px; margin-top: 30px" class="container">
    <?php
        $bank = \app\models\BankJismSh::find()->andWhere(['lastname'=>$model->lastname])->andWhere(['firstname'=>$model->firstname])->one();
        $mablag = \app\models\PlastikKarta::find()->where(['bank_jism_id'=>$bank['id']])->one();
    ?>
    <div style="margin-bottom: 30px" class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h1 style="text-align: center"><?php echo $mablag['mablag'] ?> so'm</h1>
            <p style="text-align: center">Hisobingizdagi umumiy mablag'</p>
        </div>
        <div class="col-lg-4"></div>
    </div>

    <div style="margin-bottom: 30px" class="shaxsiy">
        <!-- Table with panel -->
        <div class="card card-cascade narrower">

            <!--Card image-->
            <div
                    class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                <div>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-th-large mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-columns mt-0"></i>
                    </button>
                </div>

                <a href="" class="white-text mx-3">Shaxsiy ma'lumotlar</a>

                <div>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-pencil-alt mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="far fa-trash-alt mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-info-circle mt-0"></i>
                    </button>
                </div>

            </div>


            <?php


            ?>
            <!--/Card image-->
            <div style="margin-left: 20px; margin-bottom: 20px" class="row">
                <div class="col-lg-6">Ismi: <?php echo $model->lastname?></div>
                <div class="col-lg-6">Familiyasi: <?php echo $model->firstname?></div>
            </div>

            <div style="margin-left: 20px; margin-bottom: 20px" class="row">
                <div class="col-lg-6">Otasining ismi: <?php echo $bank['father_name']?></div>
                <div class="col-lg-6">Telefon raqam: <?php echo $model->phone_number?></div>
            </div>

            <div style="margin-left: 20px; margin-bottom: 20px" class="row">
                <div class="col-lg-6">Tashkilot nomi: <?php echo $bank['org_name']?></div>
                <div class="col-lg-6">email: <?php echo $bank['email']?></div>
            </div>


        </div>
        <!-- Table with panel -->
    </div>

    <?php

        $service = \app\models\TransactionService::find()->where(['sender_karta_num'=>$model->karta_id])->all();
        $tran = \app\models\TransactionKarta::find()->orWhere(['receiver_karta_num'=>$model->karta_id])->orWhere(['sender_karta_num'=>$model->karta_id])->all();


    ?>

    <div  style="margin-bottom: 20px" class="tablitsa">
        <!-- Table with panel -->
        <div class="card card-cascade narrower">

            <!--Card image-->
            <div
                    class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                <div>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-th-large mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-columns mt-0"></i>
                    </button>
                </div>

                <a href="" class="white-text mx-3">Xizmatlarga to'lovlar ro'yhati</a>

                <div>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-pencil-alt mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="far fa-trash-alt mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-info-circle mt-0"></i>
                    </button>
                </div>

            </div>
            <!--/Card image-->

            <div class="px-4">

                <div class="table-wrapper">
                    <!--Table-->
                    <table class="table table-hover mb-0">

                        <!--Table head-->
                        <thead>
                        <tr>
                            <th style="font-weight: bold">
                                №
                            </th>
                            <th style="font-weight: bold" class="th-lg">
                                <a>To'lov qabul qilgan tashkilot
                                    
                                </a>
                            </th>

                            <th style="font-weight: bold" class="th-lg">
                                <a href="">Mablag'
                                    
                                </a>
                            </th>

                            <th style="font-weight: bold" class="th-lg">
                                <a href="">To'lovni yuborilgan hisob

                                </a>
                            </th>

                            <th style="font-weight: bold" class="th-lg">
                                <a href="">O'tkazilgan sana
                                    
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                        <?php $i=1; foreach ($service as $ser): ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $i; $i++;?>
                                </th>
                                <td>
                                    <?php
                                        $img = \app\models\SiteOrganization::find()->where(['hisob_raqam'=>$ser->receiver_hisob_raqam])->one();
                                    ?>
                                    <img style="width: 30px;" src="/admin/uploads/<?php echo $img['service_img']?>" alt="">
                                    <span><?php echo $img->org_name?></span>
                                </td>
                                <td><?php echo $ser['summa']?></td>
                                <td><?php echo $ser['login']?></td>
                                <td><?php echo $ser['date']?></td>
                            </tr>
                        <?php endforeach;?>


                        </tbody>
                        <!--Table body-->
                    </table>
                    <!--Table-->
                </div>

            </div>

        </div>
        <!-- Table with panel -->
    </div>
    <div style="margin-bottom: 20px" class="tablitsa">
        <!-- Table with panel -->
        <div class="card card-cascade narrower">

            <!--Card image-->
            <div
                    class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                <div>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-th-large mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-columns mt-0"></i>
                    </button>
                </div>

                <a href="" class="white-text mx-3">O'tkazilgan mablag'lar ro'yhati</a>

                <div>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-pencil-alt mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="far fa-trash-alt mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-info-circle mt-0"></i>
                    </button>
                </div>

            </div>
            <!--/Card image-->

            <div class="px-4">

                <div class="table-wrapper">
                    <!--Table-->
                    <table class="table table-hover mb-0">

                        <!--Table head-->
                        <thead>
                        <tr>
                            <th style="font-weight: bold">
                                №
                            </th>
                            <th style="font-weight: bold" class="th-lg">
                                <a>Karta raqami

                                </a>
                            </th>
                            <th style="font-weight: bold" class="th-lg">
                                <a href="">Qabul qiluvchi FIO si

                                </a>
                            </th>
                            <th style="font-weight: bold" class="th-lg">
                                <a href="">Summa

                                </a>
                            </th>
                            <th style="font-weight: bold" class="th-lg">
                                <a href="">Sana

                                </a>
                            </th>

                        </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                        <?php
                        $receive = \app\models\TransactionKarta::find()->where(['sender_karta_num'=>$model->karta_id])->all();
                        $send = \app\models\TransactionKarta::find()->where(['receiver_karta_num'=>$model->karta_id])->all();
                        ?>
                        <?php $i=1; foreach ($receive as $s): ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $i; $i++;?>
                                </th>
                                <td><?php echo $s['receiver_karta_num']?></td>
                                <td>
                                    <?php
                                        $plastik = \app\models\PlastikKarta::find()->where(['karta_raqam'=>$s['receiver_karta_num']])->one();
                                        $odam = \app\models\BankJismSh::find()->where(['id'=>$plastik['bank_jism_id']])->one();
                                        echo $odam['firstname']." ".$odam['lastname'].$odam['father_name'];


                                    ?>
                                </td>
                                <td><?php echo $s['summa']?></td>
                                <td><?php echo $s['date']?></td>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                        <!--Table body-->
                    </table>
                    <!--Table-->
                </div>

            </div>

        </div>
        <!-- Table with panel -->
    </div>
    <div class="tablitsa">
        <!-- Table with panel -->
        <div class="card card-cascade narrower">

            <!--Card image-->
            <div
                    class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                <div>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-th-large mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-columns mt-0"></i>
                    </button>
                </div>

                <a href="" class="white-text mx-3">Qabul qilingan mablag'lar ro'yhati</a>

                <div>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-pencil-alt mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="far fa-trash-alt mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                        <i class="fas fa-info-circle mt-0"></i>
                    </button>
                </div>

            </div>
            <!--/Card image-->

            <div class="px-4">

                <div class="table-wrapper">
                    <!--Table-->
                    <table class="table table-hover mb-0">

                        <!--Table head-->
                        <thead>
                        <tr>
                            <th style="font-weight: bold">
                                №
                            </th>
                            <th style="font-weight: bold" class="th-lg">
                                <a>Karta raqami

                                </a>
                            </th>
                            <th style="font-weight: bold" class="th-lg">
                                <a href="">Qabul qiluvchi FIO si

                                </a>
                            </th>
                            <th style="font-weight: bold" class="th-lg">
                                <a href="">Summa

                                </a>
                            </th>
                            <th style="font-weight: bold" class="th-lg">
                                <a href="">Sana

                                </a>
                            </th>

                        </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                        <?php
                        $receive = \app\models\TransactionKarta::find()->where(['sender_karta_num'=>$model->karta_id])->all();
                        $send = \app\models\TransactionKarta::find()->where(['receiver_karta_num'=>$model->karta_id])->all();

                        ?>
                        <?php $i=1; foreach ($send as $s): ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $i; $i++;?>
                                </th>
                                <td><?php echo $s['sender_karta_num']?></td>
                                <td>
                                    <?php
                                    $plastik = \app\models\PlastikKarta::find()->where(['karta_raqam'=>$s['sender_karta_num']])->one();
                                    $odam = \app\models\BankJismSh::find()->where(['id'=>$plastik['bank_jism_id']])->one();
                                    echo $odam['firstname']." ".$odam['lastname'].' '.$odam['father_name'];


                                    ?>
                                </td>
                                <td><?php echo $s['summa']?></td>
                                <td><?php echo $s['date']?></td>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                        <!--Table body-->
                    </table>
                    <!--Table-->
                </div>

            </div>

        </div>
        <!-- Table with panel -->
    </div>
</div>