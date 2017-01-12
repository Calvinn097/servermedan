<?=vd("at",$user)?>nih line 1 di view/user_profile for information ya karno hapus aja kalau sudah siap pakai
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
<?php if(count($user)==0){ ?>
Not found
<?php }else{ ?>
<img src="<?=base_url($user['user_image'])?>" width="400" height="300">
<div class="container" style="width:50%;">
	<div class="row">
		<div class="col-md-3">
		First Name:
		</div>
		<div class="col-md-3">
		<?=$user["fname"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Last Name:
		</div>
		<div class="col-md-3">
		<?=$user["lname"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Email:
		</div>
		<div class="col-md-3">
		<?=$user["email"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Gender:
		</div>
		<div class="col-md-3">
		<?=$user["gender"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Phone Number:
		</div>
		<div class="col-md-3">
		<?=$user["phone_number"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		State:
		</div>
		<div class="col-md-3">
		<?=$user["state"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Address:
		</div>
		<div class="col-md-3">
		<?=$user["address"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Postal:
		</div>
		<div class="col-md-3">
		<?=$user["postal"]?>
		</div>
	</div>
	<?php if($user["user_id"]==$my_user_id && ($is_repairman==0)){ ?>
		<a href="<?=base_url("user/edit_profile_form")?>">Edit</a>
	<?php } ?>
</div>
<?php } ?>