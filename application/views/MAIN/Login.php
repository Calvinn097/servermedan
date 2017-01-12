<head>
    <link rel="stylesheet" href="<?=base_url("asset/bootstrap/3.3.7/css/bootstrap-social.css")?>">
    <link rel="stylesheet" href="<?=base_url("asset/plugins/bootstrap/css/bootstrap.min.css")?>">
    <!-- Fonts  -->
    <link rel="stylesheet" href="<?=base_url("/asset/font-awesome/css/font-awesome.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("asset/css/simple-line-icons.css")?>" >
    <!-- CSS Animate -->
    <link rel="stylesheet" href="<?=base_url("asset/css/animate.css")?>">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="<?=base_url("asset/css/main.css")?>">
</head>

<body>
    <section class="container animated fadeInUp">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div id="login-wrapper">
                    <header>
                        <div class="brand">
                            <a href="<?=base_url()?>" class="logo">
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
                            <p> Masuk untuk mengakses akun anda.</p>
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
                                        <a href="<?=base_url("user/forgot_password")?>" class="help-block">Lupa Kata Sandi?</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary btn-block" value="Masuk">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a class="btn btn-block btn-social btn-google">
                                                    <span class="fa fa-google"></span> Masuk Dengan Google
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a class="btn btn-block btn-social btn-facebook">
                                                    <span class="fa fa-twitter"></span> Masuk Dengan Facebook
                                                </a>
                                            </div>
                                        </div>
                                        <hr />
                                        <a href="<?=base_url("user/viewregister ")?>" class="btn btn-default btn-block">Belum mendaftar? <span style="color: #f50">Daftar Sekarang</span></a>
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
                FB.login(function(response){
                    if(response.status==="connected"){
                        $.ajax({
                            type:"POST",
                            url:"<?=base_url("/User/fb_login")?>",
                            data:{data:response,fb_login:true},
                            dataType:'html',
                            success:function(res){
                                location.reload();
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
