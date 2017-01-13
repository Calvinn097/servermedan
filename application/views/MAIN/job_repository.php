<link href="<?=base_url("/asset/css/posting.css")?>" rel="stylesheet" type="text/css">

<?php
  $ttl = "";
  switch($_GET["id"])
  {
      case "1":
        $ttl = "Pekerjaan Yang Telah Diselesaikan";
      break;
      case "2":
        $ttl = "Open";
      break;
      case "3":
        $ttl = "Pengajuan Yang Ditolak";
      break;
      default:
        $ttl = "Pekerjaan Yang Sedang Berlangsung";
      break;
  }
    $this->load->view("MAIN/side.php", array("title"=>"Job Progress"))
?>

<section class="main-content-wrapper">
    <div class="pageheader">
        <h1 class="inline"> <?=$ttl?> </h1>
    </div>
    <section id="main-content" class="animated fadeInUp">
        <div class="container-fluid mid-posting posting-field">
          <?php
          foreach($data as $key=>$row) {
          ?>
          <div class="row">
              <div class="col-lg-2"></div>
                <div class="col-lg-8 repair">
                    <div class="media posting">
                        <div class="media-left media-top">
                            <?php
                                $img = (isset($row["user_image"]) ? $row["user_image"] : base_url("/asset/images/user.png"));
                            ?>
                            <img src="<?=$img?>" class="media-object user-avatar">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading posting-head">
                                <a href="<?=base_url("user/profile/".$row["user_id"])?>">
                                    <?=$row["fname"]." ".$row["lname"]?>
                                </a>
                            </h4>
                            <p class="posting-time"><i class="fa fa fa-clock-o fa-fw"></i><?=date('l, j F Y - H:i A', strtotime($row["date_posted"]))?></p>
                        </div>
                        <div class="post-block">
                            <a href="" class="posting-map post-block">
                                <i class="fa fa-map-marker fa-fw"></i> NAMA LOKASI
                            </a>
                            <p class="title">
                                <?=$row["post_title"]?>
                            </p>
                            <p class="content">
                                <?=$row["content"]?>
                            </p>
                            <p class="type">
                                <span class="first">
                                    #<?=$row["service_type"]?>&nbsp;
                                </span>
                                <span class="second">
                                    #<?=$row["category_name"]?>&nbsp;
                                </span>
                                <span class="third">
                                    #<?=isset($row["sub_category_name"])?$row["sub_category_name"]:"";?>&nbsp;
                                </span>
                            </p>
                            <hr>
                            <div class="posting-end">
                                <i class="fa fa-users"></i>
                                <span class="value">
                                  <?php echo (isset($row["accepted_by_repairman"]) ? $row["accepted_by_repairman"] : "0"); ?>
                                </span>
                                <i class="fa fa-comments-o"></i>
                                <span class="value">
                                  <?=count($row["comment"])?>
                                </span>
                                <a href="<?=base_url('user/detail_post/'.$row['user_post_id'])?>" class="btn btn-primary posting-detail">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <?php } ?>
            </div>
        </div>
    </section>
</section>

</body>
</html>

<!--<table class="table table-bordered">
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
                  <?php foreach($data as $key=>$row){ ?>
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
              </table>-->