<!DOCTYPE html>
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
            testAPI();
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
                <a class="navbar-brand page-scroll" href="<?=base_url("user/userlogincust")?>">
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
                        <a class="page-scroll" href="#kategori">Kategori</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Berita</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Ranking</a>
                    </li>
                    <li>
                        <a class="page-scroll" id="register" href="#">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- all Modal here -->

<!-- Modal -->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm masuk">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Masuk</h4>
      </div>
      <div class="modal-body">
            <form method="post" id="loginForm">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="loginEmail">
                <label for="password">Kata sandi</label>
                <input type="password" class="form-control" name="password" id="loginPassword">
                <input type="submit" class="btn btn-success btn-block" value="Login">
            </form>
            <button type="button" class="btn btn" id="fblogin">Facebook Login</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>

    <!-- Modal end-->



    <script>

        $("document").ready(function(){
            $("#loginModal").appendTo("body");

            $("#fblogin").click(function(){
                FB.login(function(response){
                    if(response.status==="connected"){
                        $.ajax({
                            type:"POST",
                            url:"<?=base_url("/Customer/login")?>",
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
                    },{scope: 'public_profile,email'});
                });
            });

        $("#login").click(function(){
            $("#loginModal").modal("show");
        });
    </script>