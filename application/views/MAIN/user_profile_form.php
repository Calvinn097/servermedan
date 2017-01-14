
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
<div class="container" style="width:50%;">
<form action="<?=base_url("user/edit_profile")?>" method="post" enctype="multipart/form-data" >
	<div class="row">
		<div class="col-md-3">
		Profile Picture:
		</div>
		<div class="col-md-3">
		<input type="file" name="userfile">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		First Name:
		</div>
		<div class="col-md-3">
		<input type="text" name="user[fname]" value="<?=$user["fname"]?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Last Name:
		</div>
		<div class="col-md-3">
		<input type="text" name="user[lname]" value="<?=$user["lname"]?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Email:
		</div>
		<div class="col-md-3">
		<?=$user["email"]?>
		<!-- <input type="email" value="<?=$repairman["email"]?>" name="email"> -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Gender:
		</div>
		<div class="col-md-3">
		<input type="radio" name="user[gender]" value="male" <?=$user["gender"]=="male"?"checked":""?>> Male<br>
  		<input type="radio" name="user[gender]" value="female" <?=$user["gender"]=="female"?"checked":""?>> Female<br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Phone Number:
		</div>
		<div class="col-md-3">
		<input type="text" value="<?=$user["phone_number"]?>" name="user[phone_number]">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		State:
		</div>
		<div class="col-md-3">
		<input type="text" value="<?=$user["state"]?>" name="user[state]">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Address:
		</div>
		<div class="col-md-3">
		<input type="text" value="<?=$user["address"]?>" name="user[address]">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Postal:
		</div>
		<div class="col-md-3">
		<input type="text" value="<?=$user["postal"]?>" name="user[postal]">
		</div>
	</div>

	<input type="submit" value="Simpan">
	</form>
</div>