
<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/grayscale.css",
                "asset/css/nav.css",
                "asset/css/homeloginrepair.css",
                "asset/css/ranking.css"
                )
        );
     $this->load->view("MAIN/header.php",$header_data) 

?>

 <!-- margin untuk dorong ke bwh biar gk ketutup header gktw kenapa top saja -->
 <div class="container" style="margin-top:20%">
<form action="<?=base_url("user/change_password_recovery")?>" method="post">
<input type="hidden" name="code" value="<?=$code?>">
	<div class="row">
		<div class="col-md-3">
		Password:
		</div>
		<div class="col-md-3">
		<input type="password" name="password">
		</div>
		<div class="col-md-3">
		Retype Password:
		</div>
		<div class="col-md-3">
		<input type="password" name="rpassword">
		</div>
	</div>

	<input type="submit" value="Kirim">
	</form>
</div>