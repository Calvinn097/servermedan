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
<img src="<?=base_url($repairman['user_image'])?>" width="400" height="300">
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
	<br>
	<br>

	<!-- DATA POSTING -->
	<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Progress</a></li>
  <li><a data-toggle="tab" href="#finished">Finished</a></li>
  <li><a data-toggle="tab" href="#open">Open</a></li>
  <li><a data-toggle="tab" href="#rejected">Rejected</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>Progress</h3>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Date Posted</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Service Type</th>
        <th>Requester</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($accepted_post as $key=>$row){ ?>
      <tr>
      <td><?=$row["post_title"]?></td>
      <td>
      <?php
      if(strlen($row["content"])>255){
        echo substr($row["content"],0,253)."<a href=''>read more</a>";
      }
      else{
        echo $row["content"];//no need to read more because can view detail at action
      }
      ?>
      </td>

      <td><?=$row["date_posted"]?></td>
      <td><?=$row["category_name"]?></td>
      <td><?=isset($row["sub_category_name"])?$row["sub_category_name"]:"";?>
      <td><?=$row["service_type"]?></td>
      <td><a href="<?=base_url("user/profile/".$row["user_id"])?>"><?=$row["fname"]." ".$row["lname"]?></a></td>
      <td>
        <?php 
          $status="Accepted by me";
          if($row["user_dealed"]>0){
            $status="Dealed with me";
          }
          echo $status;
        ?>
      </td>
      <td>
      <a href="<?=base_url('user/detail_post/'.$row['user_post_id'])?>">Lihat Detail</a>
      </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
  <div id="finished" class="tab-pane fade">
    <h3>Finished</h3>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Date Posted</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Service Type</th>
        <th>Requester</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($finished_post as $key=>$row){ ?>
      <tr>
      <td><?=$row["post_title"]?></td>
      <td>
      <?php
      if(strlen($row["content"])>255){
        echo substr($row["content"],0,253)."<a href=''>read more</a>";
      }
      else{
        echo $row["content"];//no need to read more because can view detail at action
      }
      ?>
      </td>

      <td><?=$row["date_posted"]?></td>
      <td><?=$row["category_name"]?></td>
      <td><?=isset($row["sub_category_name"])?$row["sub_category_name"]:"";?>
      <td><?=$row["service_type"]?></td>
      <td><a href="<?=base_url("user/profile/".$row["user_id"])?>"><?=$row["fname"]." ".$row["lname"]?></a></td>
      <td>
        <?php 
        $status="Belum Lunas";
          if($row["lunas"]){
            $status="Lunas";
          }
        ?>
        <?=$status?>
      </td>
      <td>
      <a href="<?=base_url('user/detail_post/'.$row['user_post_id'])?>">Lihat Detail</a>
      </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
  <div id="open" class="tab-pane fade">
    <h3>Open</h3>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Date Posted</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Service Type</th>
        <th>Requester</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($open_post as $key=>$row){ ?>
      <tr>
      <td><?=$row["post_title"]?></td>
      <td>
      <?php
      if(strlen($row["content"])>255){
        echo substr($row["content"],0,253)."<a href=''>read more</a>";
      }
      else{
        echo $row["content"];//no need to read more because can view detail at action
      }
      ?>
      </td>

      <td><?=$row["date_posted"]?></td>
      <td><?=$row["category_name"]?></td>
      <td><?=isset($row["sub_category_name"])?$row["sub_category_name"]:"";?>
      <td><?=$row["service_type"]?></td>
      <td><a href="<?=base_url("user/profile/".$row["user_id"])?>"><?=$row["fname"]." ".$row["lname"]?></a></td>
      <td>
        <?php 
          echo "open";
        ?>
      </td>
      <td>
      <a href="<?=base_url('user/detail_post/'.$row['user_post_id'])?>">Lihat Detail</a>
      </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>

  <div id="rejected" class="tab-pane fade">
    <h3>Rejected</h3>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Date Posted</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Service Type</th>
        <th>Requester</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($rejected_post as $key=>$row){ ?>
      <tr>
      <td><?=$row["post_title"]?></td>
      <td>
      <?php
      if(strlen($row["content"])>255){
        echo substr($row["content"],0,253)."<a href=''>read more</a>";
      }
      else{
        echo $row["content"];//no need to read more because can view detail at action
      }
      ?>
      </td>

      <td><?=$row["date_posted"]?></td>
      <td><?=$row["category_name"]?></td>
      <td><?=isset($row["sub_category_name"])?$row["sub_category_name"]:"";?>
      <td><?=$row["service_type"]?></td>
      <td><a href="<?=base_url("user/profile/".$row["user_id"])?>"><?=$row["fname"]." ".$row["lname"]?></a></td>
      <td>
        <?php 
          if($row["rejected_user_id"]==null){
            echo"Rejected by me";
          }else{
            echo"Rejected by user";
          }
        ?>
      </td>
      <td>
      <a href="<?=base_url('user/detail_post/'.$row['user_post_id'])?>">Lihat Detail</a>
      </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
</div>
	<!-- END DATA POSTING -->
	<!-- rEVIEW -->
	<h3>Review</h3>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Date Posted</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Service Type</th>
        <th>Requester</th>
        <th>Status</th>
        <th>Review</th>
        <th>Rate</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($finished_post as $key=>$row){ ?>
      <tr>
      <td><?=$row["post_title"]?></td>
      <td>
      <?php
      if(strlen($row["content"])>255){
        echo substr($row["content"],0,253)."<a href=''>read more</a>";
      }
      else{
        echo $row["content"];//no need to read more because can view detail at action
      }
      ?>
      </td>

      <td><?=$row["date_posted"]?></td>
      <td><?=$row["category_name"]?></td>
      <td><?=isset($row["sub_category_name"])?$row["sub_category_name"]:"";?>
      <td><?=$row["service_type"]?></td>
      <td><a href="<?=base_url("user/profile/".$row["user_id"])?>"><?=$row["fname"]." ".$row["lname"]?></a></td>
      <td>
        <?php 
        $status="Belum Lunas";
          if($row["lunas"]){
            $status="Lunas";
          }
        ?>
        <?=$status?>
      </td>
      <td>
      <?=$row["review"]?>
      </td>
      <td>
      <?=$row["rate"]?>
      </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
	<!-- END REVIEW-->
</div>
<?php } ?>