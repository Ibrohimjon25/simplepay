<div class="container">
    <?php if( Yii::$app->session->hasFlash('warning') ): ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('warning'); ?>
        </div>
    <?php endif;?>
    <?php if( Yii::$app->session->hasFlash('danger') ): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('danger'); ?>
        </div>
    <?php endif;?>
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>
    <div style="margin-top: 20px; margin-bottom: 30px" class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <!-- Default form login -->


                <img style="width: 140px; margin-bottom: 30px; text-align: center; margin-left: 200px" src="/admin/uploads/<?php echo $model['service_img']?>" alt="">


                <!-- Email -->
                <?php use yii\helpers\Html;
                use yii\widgets\ActiveForm;

                $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model1, 'login')->textInput(['type'=>"text", 'id'=>"defaultLoginFormEmail", 'class'=>"form-control mb-4", 'placeholder'=>"Telefon raqam", 'autocomplete'=>"off"])->label(false)?>
                
                <!-- Password -->
                <?= $form->field($model1, 'summa')->textInput(['type'=>"text", 'id'=>"defaultLoginFormPassword", 'class'=>"form-control mb-4", 'placeholder'=>"Summani kiriting", 'min'=>5000, 'max'=>999999999999, 'ondrop'=>"return false", 'onkeypress'=>'validate(event)', 'autocomplete'=>"off"])->label(false)?>

                <?= $form->field($model1, 'sender_karta_num')->textInput(['type'=>"text", 'id'=>"numberExample", 'class'=>"form-control mb-4", 'placeholder'=>"Plastik karta raqami", 'min'=>5000, 'max'=>999999999999, 'ondrop'=>"return false", 'onkeypress'=>'validate(event)', 'autocomplete'=>"off"])->label(false)?>



                <!-- Sign in button -->
                <?= Html::submitButton('O\'tkazish', ['class' => 'btn btn-info btn-block my-4']) ?>


                <?php ActiveForm::end()?>

                <!-- Register -->


            <!-- Default form login -->
        </div>
        <div class="col-lg-3"></div>
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