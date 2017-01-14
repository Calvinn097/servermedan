


<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            
        );
     $this->load->view("MAIN/side.php",$header_data) 

?>

<section class="main-content-wrapper">
    <div class="pageheader">
        <h1 class="inline">Edit Profile</h1>
    </div>
    <div class="editprofil" style="padding:20px;">
<form action="<?=base_url("user/edit_profile")?>" method="post" enctype="multipart/form-data" >
	<div class="row" style="margin-top:10px;">
		<div class="col-md-3">
		Profile Picture:
		</div>
		<div class="col-md-6">
		<input class="form-control" type="file" name="userfile">
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-3">
		First Name:
		</div>
		<div class="col-md-4">
		<input class="form-control" type="text" name="user[fname]" value="<?=$user["fname"]?>">
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-3">
		Last Name:
		</div>
		<div class="col-md-4">
		<input class="form-control" type="text" name="user[lname]" value="<?=$user["lname"]?>">
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-3">
		Email:
		</div>
		<div class="col-md-4">
		<?=$user["email"]?>
		<!-- <input type="email" value="<?=$repairman["email"]?>" name="email"> -->
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-3">
		Gender:
		</div>
		<div class="col-md-4 checkbox">
		<input type="radio" name="user[gender]" value="male" <?=$user["gender"]=="male"?"checked":""?>> Male<br>
  		<input type="radio" name="user[gender]" value="female" <?=$user["gender"]=="female"?"checked":""?>> Female<br>
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-3">
		Phone Number:
		</div>
		<div class="col-md-4">
		<input class="form-control" type="text" value="<?=$user["phone_number"]?>" name="user[phone_number]">
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-3">
		State:
		</div>
		<div class="col-md-4">
		<input class="form-control" type="text" value="<?=$user["state"]?>" name="user[state]">
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-3">
		Address:
		</div>
		<div class="col-md-4">
		<input class="form-control" type="text" value="<?=$user["address"]?>" name="user[address]">
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-3">
		Postal:
		</div>
		<div class="col-md-4">
		<input class="form-control" type="text" value="<?=$user["postal"]?>" name="user[postal]">
        <input type="submit" value="Simpan" style="margin-top:10px;">
		</div>
	</div>

	
	</form>
    </div>
</section>