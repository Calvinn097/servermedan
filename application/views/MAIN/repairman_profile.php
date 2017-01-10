<?=vd("at",$repairman)?>
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
<?php if(count($repairman)==0){ ?>
not found
<?php }else{ ?>
<div class="container" style="width:50%;">
	<div class="row">
		<div class="col-md-3">
		First Name:
		</div>
		<div class="col-md-3">
		<?=$repairman["fname"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Last Name:
		</div>
		<div class="col-md-3">
		<?=$repairman["lname"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Email:
		</div>
		<div class="col-md-3">
		<?=$repairman["email"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Gender:
		</div>
		<div class="col-md-3">
		<?=$repairman["gender"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Phone Number:
		</div>
		<div class="col-md-3">
		<?=$repairman["phone_number"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		State:
		</div>
		<div class="col-md-3">
		<?=$repairman["state"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Address:
		</div>
		<div class="col-md-3">
		<?=$repairman["address"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Postal:
		</div>
		<div class="col-md-3">
		<?=$repairman["postal"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Score:
		</div>
		<div class="col-md-3">
		<?=$repairman["score"]?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		Job Done:
		</div>
		<div class="col-md-3">
		<?=$repairman["number_job"]?>
		</div>
	</div>
	<div class="row">
	<div class="col-md-3">
		Keahlian:
		</div>
		<div class="col-md-3">
		<?=$repairman["keahlian"]?>
		</div>
	</div>

	<?php if($my_repairman_id==$repairman["repairman_id"]){ ?>

	<a href="<?=base_url("repairman/edit_profile_form")?>">Edit</a>
	
	<?php } ?>
</div>
<?php } ?>