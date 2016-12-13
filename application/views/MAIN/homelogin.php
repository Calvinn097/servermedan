<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/grayscale.css",
                "asset/css/nav.css",
                "asset/css/homelogin.css"
                )
        );
     $this->load->view("MAIN/logoutheader.php",$header_data) 

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
                        <form>
                            <div class="form-group">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <input type="submit" class="btn btn-info" value="locate">
                                    </li>
                                    <li>
                                        <input class="btn btn-info" type="submit" value="attach"/>
                                    </li>
                                    <li>
                                        <select class="btn btn-info">
                                            <option>Bring and Take Away</option>
                                            <option>On The Spot</option>
                                            <option>Pick Up and Return</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select class="btn btn-info">
                                            <option>Perabotan rumah tangga</option>
                                            <option>Gadget</option>
                                            <option>Kendaraan</option>
                                            <option>Listrik</option>
                                            <option>Bangunan</option>
                                            <option>Saluran Air</option>
                                        </select>
                                    </li>
                                </ul>
                                <textarea class="form-control" rows="5" id="posting"></textarea>
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
                                <li>
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
                                </li>
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

