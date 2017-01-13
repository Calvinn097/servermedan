<?php
if($this->session->flashdata("signup_err")!==null){
    $signup_err=$this->session->flashdata("signup_err");
    $email_err=isset($signup_err["email"])?$signup_err["email"]:"";
    $fname_err=isset($signup_err["fname"])?$signup_err["fname"]:"";
    $lname_err=isset($signup_err["lname"])?$signup_err["lname"]:"";;
    $password_err=isset($signup_err["password"])?$signup_err["password"]:"";
    $rpassword_err=isset($signup_err["rpassword"])?$signup_err["rpassword"]:"";
    $signup_form_populate=$this->session->flashdata("signup_form_populate");
    
}else{
    $email_err="";
    $fname_err="";
    $lname_err="";
    $password_err="";
    $rpassword_err="";
}


?>
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



<head>
    <link rel="stylesheet" href="<?=base_url("asset/plugins/bootstrap/css/bootstrap.min.css")?>">
    <!-- Fonts  -->
    <link rel="stylesheet" href="<?=base_url("asset/css/font-awesome.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("asset/css/simple-line-icons.css")?>" >
    <!-- CSS Animate -->
    <link rel="stylesheet" href="<?=base_url("asset/css/animate.css")?>">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="<?=base_url("asset/css/main.css")?>">
    <style>
        #fname,#rpassword{
            padding-left : 32px;   
        }
    </style>
</head>
<body>
    <section class="container animated fadeInUp">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div id="login-wrapper">
                    <header>
                        <div class="brand">
                            <a href="<?=base_url()?>" class="logo">
                                <span>Server</span> Medan</a>
                        </div>
                    </header>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                          <h3 class="panel-title">     
                           Sign Up
                        </h3>  
                    </div>
                    <div class="panel-body">
                        <p>Already a member? <a href="<?=base_url("user/viewlogin")?>"><strong>Sign In</strong></a></p>
                        <form role="form" method="post" id="registerform" action="<?=base_url("user/register")?>">
                            <div class="form-group">
                                <label for="fname">Name</label>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter your name" value="<?=isset($signup_form_populate)?($signup_form_populate["fname"]):'';?>" required><?=$fname_err?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="<?=isset($signup_form_populate)?($signup_form_populate["email"]):'';?>" required><?=$email_err?>
                            </div>
                             <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required><?=$password_err?><span class="pw-err light" style="display:none; color:red;"></span>
                            </div>
                              <div class="form-group">
                                <label for="rpassword">Retype Password</label>
                                <input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="Retype your password"><?=$rpassword_err?>
                            </div>
                       
                           <input type="submit" name="signup" class="btn btn-success btn-block" value="Register">
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



    

</html>
