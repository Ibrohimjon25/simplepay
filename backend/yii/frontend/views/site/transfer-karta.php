<?php
$fieldOptions1 = [
    'options' => ['id'=>"numberExample", 'placeholder'=> "O'tkazma summasini kiriting", 'min'=>5000, 'max'=>999999999999, 'ondrop'=>"return false", 'onkeypress'=>'validate(event)', 'autocomplete'=>"off"],
    //'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];
$fieldOptions2 = [
    'options' => ['maxlength'=>"16", 'minlength'=>"16", 'class'=>"form-control py-0", 'id'=>"inlineFormInputGroup", 'placeholder'=>"Yuboruvchining karta raqami", 'onkeypress'=>'validate(event)', 'min'=>000000000000, 'max'=>999999999999, 'autocomplete'=>"off", 'mask'=>"0000 0000 0000 0000", 'pattern'=>"^[0-9]{16}$"],
    //'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];
?>
<style>
    #transactionkarta-summa{
        text-align: center;
        font-size: 50px;
    }
    #inlineFormInputGroup{
        width: 400px;
        height: 40px;
        border-bottom-left-radius: 0px;
        border-top-left-radius: 0px;
        border-left: none;
    }
</style>
<div class="transfer_header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1>Kartadan kartaga pul o'tkazish</h1>
                <p>Xizmat haqi 0%</p>
            </div>
            <div class="col-lg-6 right">
                <h1>Tranzaksiyalarni biz bilan amalga oshiring</h1>
                <p>Sizga xizmat ko'rsatishdan bag'oyatda xursandmiz</p>
            </div>
        </div>

        <?php if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif;?>
        <?php if( Yii::$app->session->hasFlash('danger') ): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('danger'); ?>
            </div>
        <?php endif;?>
        <?php if( Yii::$app->session->hasFlash('warning') ): ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('warning'); ?>
            </div>
        <?php endif;?>

        <?php if( Yii::$app->session->hasFlash('error') ): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('error'); ?>
            </div>
        <?php endif;?>
        <div class="transfer2">
            <?php use yii\widgets\ActiveForm;

            $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="md-form">
<!--                            <input style="text-align: center; font-size: 50px;" type="text" id="numberExample" class="form-control" placeholder="O'tkazma summasini kiriting" min=5000 max=999999999999 ondrop="return false" onkeypress='validate(event)' autocomplete="off">-->
                            <?= $form->field($model, 'summa')->textInput(['id'=>"numberExample", 'placeholder'=> "O'tkazma summasini kiriting", 'min'=>5000, 'max'=>999999999999, 'ondrop'=>"return false", 'onkeypress'=>'validate(event)', 'autocomplete'=>"off", 'style'=>'text-align:center; font-size: 50px;'])->label(false)?>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
                <div class="karta">
                    <!-- Default auto-sizing form -->

                        <!-- Grid row -->
                        <div class="form-row align-items-center">
                            <!-- Grid column -->
                            <div class="col-lg-6">
                                <!-- Default input -->
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div style="height: 40px" class="input-group-text">
                                            <img style="width: 23px;" src="/images/business.png" alt="">
                                        </div>
                                        <?= $form->field($model, 'sender_karta_num')->textInput([ 'maxlength'=>"16", 'minlength'=>"16", 'class'=>"form-control py-0", 'id'=>"inlineFormInputGroup", 'placeholder'=>"Yuboruvchining karta raqami", 'onkeypress'=>'validate(event)', 'min'=>000000000000, 'max'=>999999999999, 'autocomplete'=>"off", 'mask'=>"0000 0000 0000 0000", 'pattern'=>"^[0-9]{16}$"])->label(false)?>
                                    </div>

<!--                                    <input type="tel" maxlength="16" minlength="16" class="form-control py-0" id="inlineFormInputGroup" placeholder="Yuboruvchining karta raqami" onkeypress='validate(event)' min=000000000000 max=999999999999 autocomplete="off" mask="0000 0000 0000 0000" pattern="^[0-9]{16}$">-->
                                </div>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-lg-6">
                                <!-- Default input -->
                                <label class="sr-only" for="inlineFormInputGroup">Qabul qiluvchining karta raqami</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div style="height: 40px" class="input-group-text">
                                            <img style="width: 23px;" src="/images/business.png" alt="">
                                        </div>
                                        <?= $form->field($model, 'receiver_karta_num')->textInput([ 'maxlength'=>"16", 'minlength'=>"16", 'class'=>"form-control py-0", 'id'=>"inlineFormInputGroup", 'placeholder'=>"Yuboruvchining karta raqami", 'onkeypress'=>'validate(event)', 'min'=>000000000000, 'max'=>999999999999, 'autocomplete'=>"off", 'mask'=>"0000 0000 0000 0000", 'pattern'=>"^[0-9]{16}$"])->label(false)?>
                                    </div>

                                </div>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-auto jonat">
                                <button type="submit" class="btn btn-primary btn-md mt-0">Jo'natish</button>
                            </div>
                        </div>
                        <!-- Grid row -->
                    <?php ActiveForm::end(); ?>
                    <!-- Default auto-sizing form -->
                </div>

        </div>
    </div>
</div>


<script>
    function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

</script>