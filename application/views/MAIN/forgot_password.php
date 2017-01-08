
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
<form action="<?=base_url("user/check_user_email")?>" method="post">
	<div class="row">
		<div class="col-md-3">
		Email:
		</div>
		<div class="col-md-3">
		<input type="email" name="email">
		</div>
	</div>

	<input type="submit" value="Simpan">
	</form>
</div>