<?php

    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/grayscale.css",
                "asset/css/nav.css",
                "asset/css/homeloginrepair.css",
                "asset/css/detailpost.css"
                )
        );
     $this->load->view("MAIN/header.php",$header_data) 

?>
<body data-spy="scroll" data-target="#side-menu" data-offset="20">

    <div id="wrapper">
        <div class="container">

            <!-- /.row -->
                    <div class="portfolio">
                        <!-- Portfolio Item Heading -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Detail Posting
                                    <!-- <small><?=$detail_post["post_title"]?></small> -->
                                </h1>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Portfolio Item Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <!-- <img class="img-responsive" src="http://placehold.it/750x500" alt=""> -->
                                <img class="img-responsive" width="750" height="500" src=<?=base_url($detail_post["image"])?>>
                            </div>

                            <div class="col-md-6">
                                <h4><?=$detail_post["post_title"]?></h4>
                                <p><?=$detail_post["content"]?></p>
                                <!-- <h4>Detail Kerusakan</h4>
                                <ul>
                                    <li>Sulit dibaca</li>
                                    <li>Sulit dilihat</li>
                                    <li>Tidak dapat diterawang</li>
                                    <li>Tembus pandang</li>
                                </ul> -->
                                <?php if($repairman){ ?>
                                <div class="agree">
                                    <ul>
                                        <li>
                                        <?php if(!empty($accepted)){ ?>
                                        <form action="<?=base_url("repairman/edit_post/".$detail_post["user_post_id"]);
                                        ?>" method="post">
                                        <?php }else{ ?>
                                        <form action="<?=base_url("repairman/accept_post/".$detail_post["user_post_id"]);
                                        ?>" method="post">
                                        <?php } ?>
                                        Estimasi waktu dalam hari:<input type="number" placeholder="7" min="1" max="365" name="estimasi_waktu" value="<?=$accepted["estimated_time"]?:""?>">
                                        Harga:<input type="number" placeholder="min 5000"  name="harga" value="<?=$accepted["price"]?:""?>">
                                        <?php if(!empty($accepted)){ ?>
                                        <input class="btn btn-info" type="submit" value="Edit">
                                        <?php }else{ ?>
                                        <input class="btn btn-info" type="submit" value="Terima">
                                        <?php } ?>
                                        </form>
                                        </li>
                                        <li>
                                            <a href="<?=base_url("repairman/reject_post/".$detail_post["user_post_id"]);?>" class="btn btn-info">Tolak</a>
                                        </li>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        Comment:
                        <ul>
                            <?php foreach ($detail_post["comment"] as $key => $value): ?>
                                <li>
                                At <?=$value["date"]?>
                                <?php 
                                if($value["user_level"]>0){$linkprofile=base_url("repairman/profile/".$value["user_id"]);}
                                else{$linkprofile=base_url("user/profile/".$value["user_id"]);}
                                ?>
                                <a href="<?=$linkprofile?>">
                                <?=hsc($value["fname"])?> </a> is
                                <?= ($value["user_level"]==null)?"User":"Repairman"; ?> Says:"
                                <?=hsc($value["comment"])?>"
                                    
                                </li>
                                
                            <?php endforeach ?>
                        </ul>
                        <form action="<?=base_url("user/user_comment")?>" method="post">
                            <input type="hidden" name="user_post_id" value="<?=$detail_post["user_post_id"]?>">
                            <textarea name="comment"></textarea>
                            <input type="submit" value="Submit comment"></input>
                        </form>
                    </div>
                    <ul>
                <!-- /.col-lg-8 -->
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php $this->load->view("MAIN/footer.php"); ?>
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

