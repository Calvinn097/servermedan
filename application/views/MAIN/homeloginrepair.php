<!--<script src="../vendor/jquery/jquery.min.js"></script>-->

<!-- Bootstrap Core JavaScript -->
<!--<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>-->

<!-- Metis Menu Plugin JavaScript -->
<!--<script src="../vendor/metisMenu/metisMenu.min.js"></script>-->

<!-- Morris Charts JavaScript -->
<!--<script src="../vendor/raphael/raphael.min.js"></script>-->
<!--<script src="../vendor/morrisjs/morris.min.js"></script>-->
<!--<script src="../data/morris-data.js"></script>-->

<!-- Custom Theme JavaScript -->
<!--<script src="../dist/js/sb-admin-2.js"></script>-->
<style>
    .repair{
        margin-top: 30px;
    }
    .posting
    {
        border: 1px solid;
        border-color: #e5e6e9 #dfe0e4 #d0d1d5;
        border-radius: 3px;
        background-color: white;
        padding: 20px 10px 5px;
    }
    .posting-head
    {
        padding-top: 4px;
    }
    .posting-time
    {
        font-size: 12px;
        color: #90949c;
    }
    .user-avatar
    {
        width: 40px;
        height: 40px;
        cursor: pointer;
    }
    .post-block
    {
        display: block;
    }
    .posting-map
    {
        font-size: 14px;
        color:#90949c;
    }
    .posting-end
    {
        font-size: 18px;
        margin-left: 8px;
        height: 37px;
        position: relative;
        padding-top: 5px;
    }
    .posting-end .value
    {
        margin-right: 10px;
        margin-left: 5px;
        font-size: 13px;
    }
    .posting-detail
    {
        width: 30%;
        position: absolute;
        right: 0;
        top: 0;
    }
    .notif-abs
    {
        position: absoulte;
    }
    .title
    {
        font-size: 18px;
        font-weight: bold;
    }
    .content
    {
        margin-top: 8px;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.38;
        word-wrap: break-word;
    }
    .type
    {
        font-size: 13px;
    }
    .type .first
    {
        color: #3c763d;
    }
    .type .second
    {
        color: #31708f;
    }
    .type .third
    {
        color: #8a6d3b;
    }
</style>
<?php
    $header_data = array(
            "title"=>"Beranda",
        );
     $this->load->view("MAIN/side.php",$header_data) 
?>

<section class="main-content-wrapper">
    <div class="pageheader">
        <h1 class="inline">Kategori Berita - </h1>
    </div>
    <section id="main-content" class="animated fadeInUp">
        <div class="container-fluid">
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-8 repair">
                    <div class="col-lg-12">
                        <div class="media posting">
                            <div class="media-left media-top">
                                <img src="http://www.w3schools.com/bootstrap/img_avatar1.png" class="media-object user-avatar">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading posting-head">
                                    <a href="">
                                        Dicky Christian
                                    </a>
                                </h4>
                                <p class="posting-time"><i class="fa fa fa-clock-o fa-fw"></i>39 mins</p>
                            </div>
                            <div class="post-block">
                                <a href="" class="posting-map post-block">
                                    <i class="fa fa-map-marker fa-fw"></i> NAMA LOKASI
                                </a>
                                <p class="title">
                                    TITLE
                                </p>
                                <p class="content">
                                    CONTENT
                                </p>
                                <p class="type">
                                    <span class="first">
                                        #Jenis Servis&nbsp;
                                    </span>
                                    <span class="second">
                                        #Kategori&nbsp;
                                    </span>
                                    <span class="third">
                                        #Subkategori&nbsp;
                                    </span>
                                </p>
                                <hr>
                                <div class="posting-end">
                                    <i class="fa fa-users"></i><span class="value">12</span>
                                    <i class="fa fa-comments-o"></i><span class="value">9+</span>
                                    <a href="" class="btn btn-primary posting-detail">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4 notif-abs">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> Request
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
    <!-- /#wrapper -->
        </div>
    </section>
</section>
    
</body>
</html>
<?php

// <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
//                                     <!-- Wrapper for slides -->
//                                     <div class="carousel-inner">
//                                         <div class="item active">
//                                             <img src="http://placehold.it/1200x315" alt="...">
//                                         </div>
//                                         <div class="item">
//                                             <img src="http://placehold.it/1200x315" alt="...">
//                                         </div>
//                                         <div class="item">
//                                             <img src="http://placehold.it/1200x315" alt="...">
//                                         </div>
//                                     </div>
                                    
//                                     <!-- Controls -->
//                                     <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
//                                         <span class="glyphicon glyphicon-chevron-left"></span>
//                                     </a>
//                                     <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
//                                         <span class="glyphicon glyphicon-chevron-right"></span>
//                                     </a>
//                                 </div>

/*$counter=0;
foreach($timeline as $key=>$row){ 
    if(($counter)==0){ 
        echo "<div class='row post'>";
    }
    if(($counter)%2==0 && $counter!=0){ 
        echo "
        </div>
        <div class='row post'>";
    } ?>
        <div class="col-md-6">
            <div class="timeline-panel">
                <div class="timeline-heading">
                <?php
                $status="Belum ada yang accept";
                if($row["accepted_by_repairman"]>0){
                    $status="Ada repairman yang accept";
                }
                if(is_array($row["accepted_by_me"])&&count($row["accepted_by_me"])>0){
                    if($row["accepted_by_me"]["user_dealed"]>0){
                        $status="sudah Deal";
                    }else{
                        $status="Diterima saya";
                    }
                }
                    echo "Posted by:" . $row["fname"]." ".$row["lname"];
                ?>
                    <h4 class="timeline-title"><?=$row["post_title"]?></h4>ini<?=$status?>
                    <p><small class="text-muted"><i class="fa fa-clock-o"></i><?=$row["date_posted"]?></small>
                    </p>
                </div>
                <div class="timeline-body">
                    <p class="over">
                    <?=$row["content"]?>
                    </p>
                </div>
                Category:<?=$row["category_name"]?>
                Service Type:<?=$row["service_type"]?>
                <img width="100" height="100" src="<?=base_url($row["image"])?>">
                <a class="btn btn-default" href="<?=base_url("user/detail_post/".$row["user_post_id"])?>">View Detail</a>
            </div>
            <div class="panel">
                Comment:
                <ul>
                    <?php foreach ($row["comment"] as $key => $value): ?>
                        <li>
                        <?php 
                        if($value["user_level"]>0){$linkprofile=base_url("user/profile_user_id/".$value["user_id"]);}
                        else{$linkprofile=base_url("user/profile/".$value["user_id"]);}
                        ?>

                        At <?=$value["date"]?>
                        <a href="<?=$linkprofile?>"><?=hsc($value["fname"])?></a> is
                        <?= ($value["user_level"]==null)?"User":"Repairman"; ?> Says:"
                        <?=hsc($value["comment"])?>"
                            
                        </li>
                        
                    <?php endforeach ?>
                </ul>
                <form action="<?=base_url("user/user_comment")?>" method="post">
                    <input type="hidden" name="user_post_id" value="<?=$row["user_post_id"]?>">
                    <textarea name="comment"></textarea>
                    <input type="submit" value="Submit comment"></input>
                </form>
            </div>
        </div>
    <?php 
    $counter++; 
    }//akhir foreach 
    ?>*/