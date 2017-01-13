<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?=base_url('/asset/matrix_admin_package/css/bootstrap.min.css')?>" />
<link rel="stylesheet" href="<?=base_url('/asset/matrix_admin_package/css/bootstrap-responsive.min.css')?>" />
<link rel="stylesheet" href="<?=base_url('/asset/matrix_admin_package/css/fullcalendar.css')?>" />
<link rel="stylesheet" href="<?=base_url('/asset/matrix_admin_package/css/matrix-style.css')?>" />
<link rel="stylesheet" href="<?=base_url('/asset/matrix_admin_package/css/matrix-media.css')?>" />
<link rel="stylesheet" href="<?=base_url("/asset/matrix-admin-package/css/select2.css")?>" />
<link rel="stylesheet" href="<?=base_url("/asset/matrix-admin-package/css/bootstrap-wysihtml5.css")?>" />
<link rel="stylesheet" href="<?=base_url("/asset/matrix-admin-package/css/uniform.css")?>" />
<link href="<?=base_url('/asset/font-awesome/css/font-awesome.css')?>" rel="stylesheet" />
<link href="<?=base_url('/asset/matrix_admin_package/font-awesome/css/font-awesome.css')?>" rel="stylesheet" />

<!--<link rel="stylesheet" href="--><?//=base_url('/asset/matrix_admin_package/css/jquery.gritter.css')?><!--" />-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?=base_url('/asset/css/admin.css')?>" />
</head>
<body>
<!--Header-part-->
<div id="header">
  <h1><a href="<?=base_url('/ADMIN')?>">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search" style="padding-right: 2%;">
  <ul class="nav">
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="<?=base_url('/ADMIN')?>" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="<?php echo strtolower($this->uri->segment(2))=='category'?'active':'';?>"> <a href="<?=base_url('ADMIN/Category')?>"><i class="icon icon-th"></i> <span>Category &amp; sub-category</span></a> </li>
    <li class="<?php echo strtolower($this->uri->segment(2))=='news'?'active':'';?>"> <a href="<?=base_url('/ADMIN/News/')?>"><i class="icon icon-inbox"></i> <span>Manage News</span></a> </li>
    <li class="<?php echo strtolower($this->uri->segment(2))=='service_type'?'active':'';?>"><a href="<?=base_url('/ADMIN/Service_type/')?>"><i class="icon icon-th"></i> <span>Service Type</span></a></li>
    <li class="<?php echo strtolower($this->uri->segment(2))=='repairman_banner'?'active':'';?>"><a href="<?=base_url('ADMIN/input/repairman_banner')?>"><i class="icon icon-fullscreen"></i> <span>Repairman Banner Request</span></a></li>
  </ul>
</div>
<!--sidebar-menu-->