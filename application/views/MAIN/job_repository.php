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
        <div class="container-fluid">

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
              </table>
        </div>
    </section>
</section>

</body>
</html>