<style>
    .profile-img
    {
        width:100%;
        height: 35%;
    }
    .profile-edit
    {
        margin-top: 10px;
    }
    .table td:first-child
    {
        width: 35%;
    }
    .profile-skills
    {
        margin-top: 30px;
    }
    hr.separator
    {
        background-color: lightgray;
        height: 1px;
    }
    .jumbotron p
    {
        font-size: 13px !important;
    }
</style>
<?php
     $this->load->view("MAIN/side.php",array("title"=>"Welcome to Servermedan")) 
?>
<section class="main-content-wrapper">
    <div class="pageheader">
        <h1 class="inline">Profil Repairman</h1>
    </div>
    <section id="main-content" class="animated fadeInUp">
        <div class="container-fluid">
            <?php if(count($repairman)==0){ ?>
            not found
            <?php }
            else{ 
              $img = (isset($repairman['user_image']) ? base_url($repairman['user_image']) : base_urL("/asset/images/user.png"));
              ?>
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <img src="<?=$img?>" class="profile-img">
                    </div>
                    <?php if($my_repairman_id==$repairman["repairman_id"]){ ?>
                      <div class="row">
                            <a href="<?=base_url("repairman/edit_profile_form")?>" class="btn btn-block btn-primary profile-edit">
                              Edit Profil
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="profile-data col-lg-9">
                    <table class="table table-striped">
                        <tr>
                            <td>Nama</td>
                            <td><?=$repairman["fname"]?> <?=$repairman["lname"]?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?=$repairman["email"]?></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td><?=$repairman["phone_number"]?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?=$repairman["address"]?>, <?=$repairman["state"]?> - <?=$repairman["postal"]?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan yang Diselesaikan</td>
                            <td><?=$repairman["number_job"]?></td>
                        </tr>
                        <tr>
                            <td>Rate dari Customer</td>
                            <td><?=$repairman["score"]?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr class="separator">
            <?php
                if(isset($repairman["keahlian"])) {
            ?>
            <div class="row container profile-skills">
                <div class="jumbotron col-lg-10">
                    <h3>Keahlian</h3>
                    <hr>
                    <p>
                       <?=$repairman["keahlian"]?>
                       asdfasdf asdf asdf asdf adfa<br>afasdfadf adfad sfasdf
                    </p>
                </div>
            </div>
            <?php } ?>
            <br><br>
            <h3>Review Customer</h3>
            <?php
                if(count($finished_post) > 0)
                {
            ?>
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
            <?php
             }
             else
             { ?>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-warning">
                        Belum ada review dari customer.
                    </li>
                </ul>
      <?php  }
          }
            ?>
        </div>
    </section>
</section>
</body>
</html>