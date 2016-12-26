<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/grayscale.css",
                "asset/css/nav.css",
                "asset/css/homelogin.css"
                )
        );
     $this->load->view("MAIN/header.php",$header_data) 

?>
<body data-spy="scroll" data-target="#side-menu" data-offset="20">

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            $this->load->view("main/navprofile")
         ?>

        <div id="page-wrapper">
            <div class="row posting">
                <div class="col-lg-8">
                    <div class="button-bar">
                        <!--form postingan-->
                        <form id="post_order" method="post" enctype="multipart/form-data" role="form" action="<?=base_url("User/user_posting")?>">
                            <div class="form-group">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <input type="submit" class="btn btn-info" value="locate">
                                    </li>
                                    <li>
                                        <input type="file" name="userfile">
                                    </li>
                                    <li>
                                        <select class="btn btn-info" name="service_type_id">
                                            <?php foreach($service_type as $key=>$row){ ?>
                                            <option value="<?=$row["service_type_id"]?>"><?=$row["service_type"]?></option>
                                            <?php } ?>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="category_id" class="btn btn-info" required>
                                        <option value="" disabled selected>Pilih kategori anda</option>
                                            <?php foreach($this->category_list as $row){ ?>
                                                <option value="<?=$row['category_id']?>"><?=$row['category_name']?></option>
                                            <?php } ?>
                                            <!-- <option>Gadget</option> -->
                                            <!-- 
                                            <option>Kendaraan</option>
                                            <option>Listrik</option>
                                            <option>Bangunan</option>
                                            <option>Saluran Air</option> -->
                                        </select>
                                    </li>
                                </ul>
                                
                                <textarea class="form-control" rows="5" name="content" id="posting"></textarea>
                                <label for="post_title_input">Post Title:</label> <input id="post_title_input" type="text" name="post_title">
                                <input class="btn btn-info" type="submit" value="Post" style="float:right;"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8 customer">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Timeline
                            
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul>
                            <?php foreach($user_posting as $key=>$row){ ?>
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><?=hsc($row["post_title"])?></h4><!--post title-->
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> <?=$row["date_posted"]?></small>
                                            </p>
                                            <p></p>
                                        </div>
                                        <div class="timeline-body">
                                            <p><?=hsc($row["content"])?></p><!--postcontent-->
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        Kategory: <?=$row["category_name"]?>, Tipe Jasa: <?=$row["service_type"]?><br>
                                        <?php if($row["image"]!=null){?>
                                        Photo:<img class="view_image" src="<?=base_url($row["image"])?>" height="100" width="150">
                                        <?php } ?>
                                        <b>Number of likes: <span class="<?=$row["user_post_id"]."_num_likes"?>" data-num_likes="<?=$row["like_count"]?>"><?=$row["like_count"]?></span></b> <button class="like" data-user_post_id="<?=$row["user_post_id"]?>"><?=$row["like_by_me"]?"Liked":"Like";?></button>
                                        <div class="panel">
                                        Comment:
                                        <ul>
                                            <?php foreach ($row["comment"] as $key => $value): ?>
                                                <li>
                                                At <?=$value["date"]?>
                                                <?=hsc($value["fname"])?> is
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
                                </li>
                            <?php } ?>
                                <!-- <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Kerusakan mobil</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Terjadi kerusakan luar biasa dibagian belakang mobil dikarenakan ditabrak oleh tank yang sedang lewat mohon agar segera diberikan feedback untuk perbaikkannya.</p>
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <li class="timeline-panel">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Rusak baling-baling kipas</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 10 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Terjadi insiden yang cukup menegangkan mengakibatkan baling-baling kipas rusak berantakan kepada mekanik mohon agar dapat di cek serpihan yang dapat diperbaiki</p>
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Darurat kerusakan tutup botol</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 9 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Kepada para mekanik mohon agar segera ditanggapi kerusakan tutup botol yang mengakibatkan botol tidak dapat tertutup dengan rapat.</p>
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Kerusakan AC tidak dingin</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 9 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Berikut adalah kronologi terjadinya kerusakan AC. Dikarenakan pemasukkan batu es kedalam kipas AC yang mengakibatkan terjadinya peledakan terhadap mesin AC tersebut mohon kepada mekanik agar dapat diperiksa</p>
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Kerusakan Lemari es</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 9 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Berikut laporan kerusakan yang di alami oleh lemari es yaitu: lampu lemari es tidak dapat hidup, lemari es tidak dapat mengeluarkan angin, kipas lemari es tidak dapat berputar, pintu lemari es sulit ditutup, mesin lemari es tidak dapat ditemukan.</p>
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Kerusakan sepeda motor</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 9 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Berikut laporan kerusakan yaitu: ban sepeda motor tidak dapat ditemukan, mesin sepeda motor tidak dapat dilihat, badan sepeda motor tidak memiliki fisik. Kepada mekanik bersangkutan mohon agar segera datang dan melihat kondisi sepeda motor</p>
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
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
                    <!-- panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        <?php $this->load->view("MAIN/footer.php"); ?>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
<script>
$(".like").click(function(){
    var button = $(this);
    var user_post_id = $(this).data("user_post_id");
    $.ajax({
        url:"<?=base_url("user/user_post_like_action")?>",
        type:"post",
        dataType:"json",
        data:{
            user_post_id:user_post_id
        },
        success:function(res){
            if(res["like"]==true){
                button.html("Liked");
                $like_span = $("."+user_post_id+"_num_likes");
                $num_like = $like_span.data("num_likes");
                $num_like++;
                $like_span.data("num_likes",$num_like);
                $like_span.html($num_like);
            }else if(res["like"]==false){
                button.html("Like");
                $like_span = $("."+user_post_id+"_num_likes");
                $num_like = $like_span.data("num_likes");
                $num_like--;
                $like_span.data("num_likes",$num_like);
                $like_span.html($num_like);
            }
        }
    })
})
</script>