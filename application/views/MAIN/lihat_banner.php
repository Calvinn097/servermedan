<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/grayscale.css",
                "asset/css/nav.css",
                "asset/css/homeloginrepair.css"
                )
        );
     $this->load->view("MAIN/header.php",$header_data) 

?>
<body data-spy="scroll" data-target="#side-menu" data-offset="20">

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            $this->load->view("main/navprofilerepair")
         ?>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row content">
                <div class="col-lg-8 repair">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Banner Anda
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php $counter=0;?>
                            <?php foreach($repairman_banner as $key=>$row){ ?>
                            <div class="row post">
                                <div class="col-md-12">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <p><?=$row['approved']?'Approved':'Not Approved'?>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i><?=$row["date"]?></small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <img width="850" height="600" src="<?=$row["path"]?>">
                                        </div>
                                        Category:<?=$row["category_name"]?>
                                        Sub Category:<?=$row["sub_category_name"]?>
                                        <a class="delete_banner btn btn-default" data-banner_id=<?=$row["repairman_banner_id"]?>>Delete</a>

                                    </div>
                                </div>
                            <?php }//akhir foreach ?>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
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

<script>
$(".delete_banner").click(function(){
    if (confirm('Delete?')) {
    var banner_id = $(this).data('banner_id');
    $(this).attr('href',"<?=base_url('Repairman/delete_repairman_banner')?>/"+banner_id);
  } else {
    return false;
  }
})
</script>