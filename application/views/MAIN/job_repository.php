<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?=base_url("/asset/bootstrap/3.3.7/css/bootstrap.min.css")?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url("/asset/font-awesome/css/font-awesome.min.css")?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Animate CSS by Daniel Eden-->
    <link href="<?=base_url("asset/plugin/bootstrap-notify-3.1.3/animate.css");?>" rel="stylesheet" type="text/css">
    <script src="<?=base_url("/asset/javascript/jquery-1.12.4.min.js")?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url("asset/bootstrap/3.3.7/js/bootstrap.min.js")?>"></script>
</head>
<body>

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
      <td><?=$row["fname"]." ".$row["lname"]?></td>
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
      <td><?=$row["fname"]." ".$row["lname"]?></td>
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
      <td><?=$row["fname"]." ".$row["lname"]?></td>
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
      <td><?=$row["fname"]." ".$row["lname"]?></td>
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

</body>
</html>