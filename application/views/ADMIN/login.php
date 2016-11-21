<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Calm breeze login screen</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">
      <link href="<?=base_url("/asset/css/admin_login.css")?>" rel="stylesheet" type="text/css">
      <!-- Animate CSS by Daniel Eden-->
    <link href="<?=base_url("asset/plugin/bootstrap-notify-3.1.3/animate.css");?>" rel="stylesheet" type="text/css">

  
</head>

<body>
  <div class="wrapper">
	<div class="container">
		<h1 class='animated infinite bounce'>Welcome</h1>
		
		<form method="post" class="form" action='<?=base_url('ADMIN/Account/admin_login')?>'>
			<input type="text" placeholder="Username" name='username'>
			<input type="password" placeholder="Password" name='password'>
			<button type="submit" id="login-button">Login</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  	<script src="<?=base_url("/asset/javascript/jquery-1.12.4.min.js")?>"></script>
   	<script src="<?=base_url("asset/javascript/admin_login.js")?>"></script>
</body>
</html>
