<?php $this->load->view('/ADMIN/header')?>
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="<?=base_url('/ADMIN')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Manage Repairman Banner</a></div>
  <h1>Manage Repairman Banner</h1>
  <p> This is places where all advertisement banner that repairman posted, to be approved and be displayed on user site.
  </div>
  <div class="container-fluid">
    <hr>
    <div class="widget-title"> <span class="icon"> <i class="icon-file"></i></span>
      <h5>Recent Repairman Banner</h5>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-content nopadding">
          <ul class="recent-posts">
          <?php foreach($repairman_banner as $key=>$row){ ?>
            <li>
              <?php if($row['path']!=null){ ?>
              <img src="<?=$row['path']?>">
              <?php } ?>
              <div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/av1.jpg"> </div>
              <div class="article-post">
                <div class="fr">
                <?php if(!$row["approved"]){ ?>
                <a href="<?=base_url("ADMIN/Input/approve_repairman_banner/".$row["repairman_banner_id"])?>" class="btn btn-primary btn-mini" data-banner_id="<?=$row['repairman_banner_id']?>">Approve</a>
                <?php }else{ ?>
                <a href="<?=base_url("ADMIN/Input/disapprove_repairman_banner/".$row["repairman_banner_id"])?>" class="btn btn-primary btn-mini" data-banner_id="<?=$row['repairman_banner_id']?>">Disapprove</a>
                <?php } ?>
                <a href="#" class="btn btn-danger btn-mini delete_banner" data-banner_id="<?=$row['repairman_banner_id']?>">Delete</a></div>
                <span class="user-info"><h3>Banner ID:<?=$row["repairman_banner_id"]?></h3> By: <?=$row['repairman_info']["fname"]." ".$row['repairman_info']["lname"]?> / Date: <?=$row['date']?> </span>
                <b>Category:</b> <?=$row["category_name"]?>, <b>Sub Category:</b> <?=$row["sub_category_name"]?>, <b>Status:</b> <?=$row["approved"]?"Approved":"Not Approved"?>
              </div>
            </li>
          <?php } ?>
            <!-- <li>
              <div class="pagination alternate"><?=$links?></div>
            </li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('/ADMIN/footer')?>
<script>
$(".delete_banner").click(function(){
  if (confirm('Delete?')) {
    var banner_id = $(this).data('banner_id');
    $(this).attr('href',"<?=base_url('ADMIN/Input/delete_repairman_banner')?>/"+banner_id);
  } else {
    return false;
  }
})
</script>
<script>

$("document").ready(function(){
  // $(".btn-cancel").click(function(e){
  //   alert('hello');
  //   // e.preventDefault();
  //   // var tinymce_editor_id = 'news_area'; 
  //   // tinymce.get(tinymce_editor_id).setContent('');
  // });
});
</script>