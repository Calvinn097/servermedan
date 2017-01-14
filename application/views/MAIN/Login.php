<head>
    <link rel="stylesheet" href="<?=base_url("asset/plugins/bootstrap/css/bootstrap.min.css")?>">
    <!-- Fonts  -->
    <link rel="stylesheet" href="<?=base_url("asset/css/font-awesome.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("asset/css/simple-line-icons.css")?>" >
    <!-- CSS Animate -->
    <link rel="stylesheet" href="<?=base_url("asset/css/animate.css")?>">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="<?=base_url("asset/css/main.css")?>">
	<script src="<?=base_url("/asset/javascript/jquery-1.12.4.min.js")?>"></script>
</head>
<!-- Facebook SDK Login -->
    <script>
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    window.fbAsyncInit = function() {
        FB.init({
          appId      : '<?=fb_i?>',
          xfbml      : true,
          version    : 'v2.8'
        });
        FB.AppEvents.logPageView();

        FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
        });
    };

    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            document.getElementById('status').innerHTML = 'Please log ' +
            'into this app.';
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            document.getElementById('status').innerHTML = 'Please log '   +
                'into Facebook.';
        }
    }

    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }
    
    </script>
<body>
    <section class="container animated fadeInUp">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div id="login-wrapper">
                    <header>
                        <div class="brand">
                            <a href="index.html" class="logo">
                                <span>Server</span>Medan</a>
                        </div>
                    </header>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">     
                           Sign In
                        </h3>
                        </div>
                        <div class="panel-body">
                            <p> Login to access your account.</p>
                            <form class="form-horizontal" method="post"  role="form" action="<?=base_url("user/login")?>">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                        <i class="fa fa-lock"></i>
                                        <a href="<?=base_url("user/forgot_password")?>" class="help-block">Forgot Your Password?</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
										<input type="submit" class="btn btn-primary btn-block" value="Sign in">
                                        <a href="" class="btn" id="fblogin">
                                            <img src="<?=base_url("asset/images/homepage/Facebook-icon-1.png")?>" width="25" height="25"/>Facebook Login
                                        </a>
                                    
                                        <a href="" class="btn" id="glogin">
                                            <img src="<?=base_url("asset/images/homepage/Google_plus.png")?>" width="25" height="25"/>Google+ Login
                                        </a>
                                        <hr />
                                        <a href="<?=base_url("user/viewregister")?>" class="btn btn-default btn-block">Not a member? Sign Up</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    
    <script>
    function notify(message,type){
        $.notify({
            // options
            icon: 'glyphicon glyphicon-warning-sign',
            title: '',
            message: message,
            url: '#',
            target: '_blank'
        },{
            // settings
            element: 'body',
            position: null,
            type: type,
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>' 
        });
    }
    </script>
    <!-- Modal end-->



    <script>

        $("document").ready(function(){
            <?php if($this->session->flashdata("signup_err")!=null){ ?>
                $("#registerModal").modal("show");
            <?php } ?>
            <?php if($this->session->flashdata("global_notification")){ ?> 
                notify("<?=$this->session->flashdata("global_notification")['message']?>","<?=$this->session->flashdata("global_notification")['type']?>");
            <?php } ?>
            $("#loginModal").appendTo("body");

            $("#fblogin").click(function(){
				e.preventDefault();
                FB.login(function(response){
                    if(response.status==="connected"){
                        $.ajax({
                            type:"POST",
                            url:"<?=base_url("/User/fb_login")?>",
                            data:{data:response,fb_login:true},
                            dataType:'html',
                            success:function(res){
                                window.location="<?=base_url()?>";
                            }

                        });

        //              console.log(response.authResponse.accessToken);
                        }
                        else if(response.status === 'not_authorized'){

                        }
                        else{

                        }
                    },{scope: 'public_profile,email,user_birthday'});
                });
            });

        $("#login").click(function(){
            $("#loginModal").modal("show");
        });
        $("document").ready(function(){
            $("#registerModal").appendTo("body");
        })
        $("#register").click(function(){
            $("#registerModal").modal("show"); 
        })
        $("#registerForm").submit(function(){
            $(".pw-err").hide();
            var password = $("#password").val();
            var rpassword = $("#rpassword").val();
            var valid = true;
            if(password != rpassword){
                valid = false;
                $(".pw-err").html("Password pertama dan kedua harus cocok!");
                $(".pw-err").show();
            }
            if(valid){
                $(this).attr("action","user/register");
                $(this).submit();
            }
            return false;
        })
    </script>


</html>
