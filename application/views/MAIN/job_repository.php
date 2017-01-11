<?php
    $header_data = array(
        "title"=>"Berita - SERVER Medan"
    );
     $this->load->view("MAIN/side.php",$header_data);
?>
<section class="main-content-wrapper">
    <div class="pageheader">
      Progress and History
    </div>
    <section id="main-content" class="animated fadeInUp">
      <div class="container-fluid">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Progress</a></li>
          <li><a data-toggle="tab" href="#menu1">Finished</a></li>
          <li><a data-toggle="tab" href="#menu2">Open</a></li>
        </ul>

        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <br>
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
          <div id="menu1" class="tab-pane fade">
            <br>
            <p>Some content in menu 1.</p>
          </div>
          <div id="menu2" class="tab-pane fade">
            <br>
            <p>Some content in menu 2.</p>
          </div>
        </div>
      </div>
    </section>
</section>
</body>
</html>