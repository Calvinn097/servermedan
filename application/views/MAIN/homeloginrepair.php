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
                            <i class="fa fa-clock-o fa-fw"></i> Timeline
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php $counter=0;?>
                            <?php foreach($timeline as $key=>$row){ ?>
                            <?php if(($counter)==0){ ?>
                                    <div class="row post">    
                            <?php } ?>
                            <?php if(($counter)%2==0 && $counter!=0){ ?>
                            </div>
                            <div class="row post">
                            <?php } ?>
                                    <div class="col-md-6">
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                            Posted by: <?=$row["fname"]." ".$row["lname"]?>
                                                <h4 class="timeline-title"><?=$row["post_title"]?></h4>
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

                                        </div>
                                    </div>

                                
                            <?php $counter++; }//akhir foreach ?>                   
<!-- 
                            <div class="row post">
                                <div class="col-md-6">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Kerusakan mobil</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="over">Terjadi kerusakan luar biasa dibagian belakang mobil dikarenakan ditabrak oleh tank yang sedang lewat mohon agar segera diberikan feedback untuk perbaikkannya</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Rusak baling-baling kipas</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 12 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="over">Terjadi insiden yang cukup menegangkan mengakibatkan baling-baling kipas rusak berantakan kepada mekanik mohon agar dapat di cek serpihan yang dapat diperbaiki</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row post">
                                <div class="col-md-6">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Darurat kerusakan tutup botol</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 12 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="over">Kepada para mekanik mohon agar segera ditanggapi kerusakan tutup botol yang mengakibatkan botol tidak dapat tertutup dengan rapat.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Kerusakan AC tidak dingin</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 13 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="over">Berikut adalah kronologi terjadinya kerusakan AC. Dikarenakan pemasukkan batu es kedalam kipas AC yang mengakibatkan terjadinya peledakan terhadap mesin AC tersebut mohon kepada mekanik agar dapat diperiksa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row post">
                                <div class="col-md-6">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Kerusakan Lemari es</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 14 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="over">Berikut laporan kerusakan yang di alami oleh lemari es yaitu: lampu lemari es tidak dapat hidup, lemari es tidak dapat mengeluarkan angin, kipas lemari es tidak dapat berputar, pintu lemari es sulit ditutup, mesin lemari es tidak dapat ditemukan.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Kerusakan sepeda motor</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 15 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="over">Berikut laporan kerusakan yaitu: ban sepeda motor tidak dapat ditemukan, mesin sepeda motor tidak dapat dilihat, badan sepeda motor tidak memiliki fisik. Kepada mekanik bersangkutan mohon agar segera datang dan melihat kondisi sepeda motor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             -->
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

