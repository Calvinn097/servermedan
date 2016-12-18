<!DOCTYPE html>
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
<html lang="en">
<style>
#registerModal,#loginModal{
    color:black;
}
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url("/asset/bootstrap/3.3.7/css/bootstrap.min.css")?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url("/asset/font-awesome/css/font-awesome.min.css")?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Animate CSS by Daniel Eden-->
    <link href="<?=base_url("asset/plugin/bootstrap-notify-3.1.3/animate.css");?>" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <?php
    foreach($css as $row){ ?>
        <link href="<?=base_url($row)?>" rel="stylesheet">
    <?php } ?>
    
    

    <script src="<?=base_url("/asset/javascript/jquery-1.12.4.min.js")?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url("asset/bootstrap/3.3.7/js/bootstrap.min.js")?>"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Theme JavaScript -->
    <script src="<?=base_url("asset/javascript/grayscale.js")?>"></script>

    <!-- Boostrap Notify -->
    <script src="<?=base_url("asset/plugin/bootstrap-notify-3.1.3/bootstrap-notify.min.js");?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!--Maps Jquery-->
    <script src="<?=base_url("asset/javascript/jquery.scrolly.min.js")?>"></script>
    <script src="<?=base_url("asset/javascript/jquery.scrollzer.min.js")?>"></script>
    <script src="<?=base_url("asset/javascript/skel.min.js")?>"></script>
    <script src="<?=base_url("asset/javascript/util.js")?>"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="<?=base_url("asset/javascript/main.js")?>"></script>
    
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
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
    <!-- END Facebook SDK Login -->
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i> <span class="light">Server</span> Medan
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#category" data-toggle="collapse">Kategori</a>
                        <div id="category" class="collapse">
                            <ul>
                                <?php foreach($this->category_list as $row){ ?>
                                <li><?=$row['category_name']?></li>
                                <?php } ?>
                                <li>Perabotan rumah tangga</li>
                                <li>Gadget</li>
                                <li>Kendaraan</li>
                                <li>Listrik</li>
                                <li>Bangunan</li>
                                <li>Saluran Air</li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Berita</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Ranking</a>
                    </li>
                    <?php if(!isset($_COOKIE["sm_login"])){ ?> 
                    <li>
                        <a class="page-scroll" id="register" href="#">Daftar</a>
                    </li>
                    <li>
                        <a class="page-scroll" id="login" href="#">Masuk</a>
                    </li>
                    <?php }else{ ?>
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">My Account
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="<?=base_url('user/logout')?>">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- all Modal here -->
<!-- Modal -->
<div id="registerModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
            <form method="post" id="registerForm">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="<?=isset($signup_form_populate)?($signup_form_populate["email"]):'';?>" required><?=$email_err?><br>
            <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" value="<?=isset($signup_form_populate)?($signup_form_populate["fname"]):'';?>" required><?=$fname_err?><br>
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname" value="<?=isset($signup_form_populate)?($signup_form_populate["lname"]):'';?>" required><?=$lname_err?><br>
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" required><?=$password_err?><span class="pw-err light" style="display:none; color:red;"></span><br>
            <label for="rpassword">Repeat Password</label>
            <input type="password" class="form-control" name="rpassword" id="rpassword" required><?=$rpassword_err?><br>
            <input type="submit" class="btn btn-success btn-block" value="Register">
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm masuk">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Masuk</h4>
      </div>
      <div class="modal-body">
            <form method="post" id="loginForm" action="<?=base_url('user/login')?>">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="loginEmail">
                <label for="password">Kata sandi</label>
                <input type="password" class="form-control" name="password" id="loginPassword">
                <input type="submit" class="btn btn-success btn-block" value="Login">
            </form>
            <div class="fblogin">
                <button type="button" class="btn btn" id="fblogin"><img src="<?=base_url("asset/images/Facebook-icon-1.png")?>"/>Facebook Login</button>
            </div>
            <div class="glogin">
                <button type="button" class="btn btn" id="glogin"><img src="<?=base_url("asset/images/Google_plus.png")?>"/>Google+ Login</button>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
    <!-- Bootstrap Notify -->
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
