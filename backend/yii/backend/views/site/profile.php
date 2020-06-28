 <div class="container target">
        <div class="row">
            <div style="margin-right: 10px" class="col-sm-5"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="/uploads/<?php echo Yii::$app->user->identity->img ?>"></a>
            </div>
        </div>
        <br>
        <div class="row">

            <!--/col-3-->
            <div class="col-sm-9" style="" contenteditable="false">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo Yii::$app->user->identity->username?> </div>
                    <div class="panel-body">
                        <h5>Familiya: <?php echo Yii::$app->user->identity->surname?></h5>
                        <h5>Ismi: <?php echo Yii::$app->user->identity->username?></h5>
                        <h5>Tugilgan sana: <?php echo Yii::$app->user->identity->birthdate ?></h5>
                        <h5>A'zo bo'lgan sana: <?php echo Yii::$app->user->identity->date_membership ?></h5>
                        <h5>kasbi: <?php echo Yii::$app->user->identity->profession?></h5>
                        <h5>Telefon raqam: <?php echo Yii::$app->user->identity->phone_number?></h5>
                        <h5>elektron pochta: <?php echo Yii::$app->user->identity->email?></h5>
                    </div>

                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Men haqimda </div>
                    <div class="panel-body">
                        <?php echo Yii::$app->user->identity->description?>
                    </div>

                </div>


        <script src="/plugins/bootstrap-select.min.js"></script>
        <script src="/codemirror/jquery.codemirror.js"></script>
        <script src="/beautifier.js"></script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-40413119-1', 'bootply.com');
            ga('send', 'pageview');
        </script>
        <script>
            jQuery.fn.shake = function(intShakes, intDistance, intDuration, foreColor) {
                this.each(function() {
                    if (foreColor && foreColor!="null") {
                        $(this).css("color",foreColor);
                    }
                    $(this).css("position","relative");
                    for (var x=1; x<=intShakes; x++) {
                        $(this).animate({left:(intDistance*-1)}, (((intDuration/intShakes)/4)))
                            .animate({left:intDistance}, ((intDuration/intShakes)/2))
                            .animate({left:0}, (((intDuration/intShakes)/4)));
                        $(this).css("color","");
                    }
                });
                return this;
            };
        </script>
        <script>
            $(document).ready(function() {

                $('.tw-btn').fadeIn(3000);
                $('.alert').delay(5000).fadeOut(1500);

                $('#btnLogin').click(function(){
                    $(this).text("...");
                    $.ajax({
                        url: "/loginajax",
                        type: "post",
                        data: $('#formLogin').serialize(),
                        success: function (data) {
                            //console.log('data:'+data);
                            if (data.status==1&&data.user) { //logged in
                                $('#menuLogin').hide();
                                $('#lblUsername').text(data.user.username);
                                $('#menuUser').show();
                                /*
                                $('#completeLoginModal').modal('show');
                                $('#btnYes').click(function() {
                                    window.location.href="/";
                                });
                                */
                            }
                            else {
                                $('#btnLogin').text("Login");
                                prependAlert("#spacer",data.error);
                                $('#btnLogin').shake(4,6,700,'#CC2222');
                                $('#username').focus();
                            }
                        },
                        error: function (e) {
                            $('#btnLogin').text("Login");
                            console.log('error:'+JSON.stringify(e));
                        }
                    });
                });
                $('#btnRegister').click(function(){
                    $(this).text("Wait..");
                    $.ajax({
                        url: "/signup?format=json",
                        type: "post",
                        data: $('#formRegister').serialize(),
                        success: function (data) {
                            console.log('data:'+JSON.stringify(data));
                            if (data.status==1) {
                                $('#btnRegister').attr("disabled","disabled");
                                $('#formRegister').text('Thanks. You can now login using the Login form.');
                            }
                            else {
                                prependAlert("#spacer",data.error);
                                $('#btnRegister').shake(4,6,700,'#CC2222');
                                $('#btnRegister').text("Sign Up");
                                $('#inputEmail').focus();
                            }
                        },
                        error: function (e) {
                            $('#btnRegister').text("Sign Up");
                            console.log('error:'+e);
                        }
                    });
                });

                $('.loginFirst').click(function(){
                    $('#navLogin').trigger('click');
                    return false;
                });

                $('#btnForgotPassword').on('click',function(){
                    $.ajax({
                        url: "/resetPassword",
                        type: "post",
                        data: $('#formForgotPassword').serializeObject(),
                        success: function (data) {
                            if (data.status==1){
                                prependAlert("#spacer",data.msg);
                                return true;
                            }
                            else {
                                prependAlert("#spacer","Your password could not be reset.");
                                return false;
                            }
                        },
                        error: function (e) {
                            console.log('error:'+e);
                        }
                    });
                });

                $('#btnContact').click(function(){

                    $.ajax({
                        url: "/contact",
                        type: "post",
                        data: $('#formContact').serializeObject(),
                        success: function (data) {
                            if (data.status==1){
                                prependAlert("#spacer","Thanks. We got your message and will get back to you shortly.");
                                $('#contactModal').modal('hide');
                                return true;
                            }
                            else {
                                prependAlert("#spacer",data.error);
                                return false;
                            }
                        },
                        error: function (e) {
                            console.log('error:'+e);
                        }
                    });
                    return false;
                });

                /*
                $('.nav .dropdown-menu input').on('click touchstart',function(e) {
                    e.stopPropagation();
                });
                */





            });
            $.fn.serializeObject = function()
            {
                var o = {};
                var a = this.serializeArray();
                $.each(a, function() {
                    if (o[this.name] !== undefined) {
                        if (!o[this.name].push) {
                            o[this.name] = [o[this.name]];
                        }
                        o[this.name].push(this.value || '');
                    } else {
                        o[this.name] = this.value || '';
                    }
                });
                return o;
            };
            var prependAlert = function(appendSelector,msg){
                $(appendSelector).after('<div class="alert alert-info alert-block affix" id="msgBox" style="z-index:1300;margin:14px!important;">'+msg+'</div>');
                $('.alert').delay(3500).fadeOut(1000);
            }
        </script>
        <!-- Quantcast Tag -->
        <script type="text/javascript">
            var _qevents = _qevents || [];

            (function() {
                var elem = document.createElement('script');
                elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
                elem.async = true;
                elem.type = "text/javascript";
                var scpt = document.getElementsByTagName('script')[0];
                scpt.parentNode.insertBefore(elem, scpt);
            })();

            _qevents.push({
                qacct:"p-0cXb7ATGU9nz5"
            });
        </script>
        <noscript>
            &amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;div style="display:none;"&amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;
            &amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;img src="//pixel.quantserve.com/pixel/p-0cXb7ATGU9nz5.gif" border="0" height="1" width="1" alt="Quantcast"/&amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;
            &amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/div&amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;
        </noscript>
        <!-- End Quantcast tag -->
        <div id="completeLoginModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                <h3>Do you want to proceed?</h3>
            </div>
            <div class="modal-body">
                <p>This page must be refreshed to complete your login.</p>
                <p>You will lose any unsaved work once the page is refreshed.</p>
                <br><br>
                <p>Click "No" to cancel the login process.</p>
                <p>Click "Yes" to continue...</p>
            </div>
            <div class="modal-footer">
                <a href="#" id="btnYes" class="btn danger">Yes, complete login</a>
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
            </div>
        </div>
        <div id="forgotPasswordModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                <h3>Password Lookup</h3>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="formForgotPassword">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                            <input name="_csrf" id="token" value="CkMEALL0JBMf5KSrOvu9izzMXCXtFQ/Hs6QUY=" type="hidden">
                            <input name="email" id="inputEmail" placeholder="you@youremail.com" required="" type="email">
                            <span class="help-block"><small>Enter the email address you used to sign-up.</small></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer pull-center">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a>
                <a href="#" data-dismiss="modal" id="btnForgotPassword" class="btn btn-success">Reset Password</a>
            </div>

        </div>
        <div id="upgradeModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                <h4>Would you like to upgrade?</h4>
            </div>
            <div class="modal-body">
                <p class="text-center"><strong></strong></p>
                <h1 class="text-center">$4<small>/mo</small></h1>
                <p class="text-center"><small>Unlimited plys. Unlimited downloads. No Ads.</small></p>
                <p class="text-center"><img src="/assets/i_visa.png" alt="visa" width="50"> <img src="/assets/i_mc.png" alt="mastercard" width="50"> <img src="/assets/i_amex.png" alt="amex" width="50"> <img src="/assets/i_discover.png" alt="discover" width="50"> <img src="/assets/i_paypal.png" alt="paypal" width="50"></p>
            </div>
            <div class="modal-footer pull-center">
                <a href="/upgrade" class="btn btn-block btn-huge btn-success"><strong>Upgrade Now</strong></a>
                <a href="#" data-dismiss="modal" class="btn btn-block btn-huge">No Thanks, Maybe Later</a>
            </div>
        </div>
        <div id="contactModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                <h3>Contact Us</h3>
                <p>suggestions, questions or feedback</p>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="formContact">
                    <input name="_csrf" id="token" value="CkMEALL0JBMf5KSrOvu9izzMXCXtFQ/Hs6QUY=" type="hidden">
                    <div class="control-group">
                        <label class="control-label" for="inputSender">Name</label>
                        <div class="controls">
                            <input name="sender" id="inputSender" class="input-large" placeholder="Your name" type="text">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputMessage">Message</label>
                        <div class="controls">
                            <textarea name="notes" rows="5" id="inputMessage" class="input-large" placeholder="Type your message here"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                            <input name="email" id="inputEmail" class="input-large" placeholder="you@youremail.com (for reply)" required="" type="text">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer pull-center">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a>
                <a href="#" data-dismiss="modal" aria-hidden="true" id="btnContact" role="button" class="btn btn-success">Send</a>
            </div>
        </div>




        <script src="/plugins/bootstrap-pager.js"></script>
    </div>
</div>
<script>
    /* pagination */
    $.fn.pageMe = function(opts){
        var $this = this,
            defaults = {
                perPage: 7,
                showPrevNext: false,
                numbersPerPage: 1,
                hidePageNumbers: false
            },
            settings = $.extend(defaults, opts);

        var listElement = $this;
        var perPage = settings.perPage;
        var children = listElement.children();
        var pager = $('.pagination');

        if (typeof settings.childSelector!="undefined") {
            children = listElement.find(settings.childSelector);
        }

        if (typeof settings.pagerSelector!="undefined") {
            pager = $(settings.pagerSelector);
        }

        var numItems = children.size();
        var numPages = Math.ceil(numItems/perPage);

        pager.data("curr",0);

        if (settings.showPrevNext){
            $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
        }

        var curr = 0;
        while(numPages > curr && (settings.hidePageNumbers==false)){
            $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
            curr++;
        }

        if (settings.numbersPerPage>1) {
            $('.page_link').hide();
            $('.page_link').slice(pager.data("curr"), settings.numbersPerPage).show();
        }

        if (settings.showPrevNext){
            $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
        }

        pager.find('.page_link:first').addClass('active');
        if (numPages<=1) {
            pager.find('.next_link').hide();
        }
        pager.children().eq(1).addClass("active");

        children.hide();
        children.slice(0, perPage).show();

        pager.find('li .page_link').click(function(){
            var clickedPage = $(this).html().valueOf()-1;
            goTo(clickedPage,perPage);
            return false;
        });
        pager.find('li .prev_link').click(function(){
            previous();
            return false;
        });
        pager.find('li .next_link').click(function(){
            next();
            return false;
        });

        function previous(){
            var goToPage = parseInt(pager.data("curr")) - 1;
            goTo(goToPage);
        }

        function next(){
            goToPage = parseInt(pager.data("curr")) + 1;
            goTo(goToPage);
        }

        function goTo(page){
            var startAt = page * perPage,
                endOn = startAt + perPage;

            children.css('display','none').slice(startAt, endOn).show();

            if (page>=1) {
                pager.find('.prev_link').show();
            }
            else {
                pager.find('.prev_link').hide();
            }

            if (page<(numPages-1)) {
                pager.find('.next_link').show();
            }
            else {
                pager.find('.next_link').hide();
            }

            pager.data("curr",page);

            if (settings.numbersPerPage>1) {
                $('.page_link').hide();
                $('.page_link').slice(page, settings.numbersPerPage+page).show();
            }

            pager.children().removeClass("active");
            pager.children().eq(page+1).addClass("active");
        }
    };

    $('#items').pageMe({pagerSelector:'#myPager',childSelector:'tr',showPrevNext:true,hidePageNumbers:false,perPage:5});
    /****/
</script>