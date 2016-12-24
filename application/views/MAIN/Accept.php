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
                                <h1 class="page-header">Acceptance
                                    <small>Kerusakan Barang</small>
                                </h1>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Portfolio Item Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-responsive" src="http://placehold.it/750x500" alt="">
                            </div>

                            <div class="col-md-6">
                                <h4>Kerusakan sepeda motor</h4>
                                <p>Berikut laporan kerusakan yaitu: ban sepeda motor tidak dapat ditemukan, mesin sepeda motor tidak dapat dilihat, badan sepeda motor tidak memiliki fisik. Kepada mekanik bersangkutan mohon agar segera datang dan melihat kondisi sepeda motor</p>
                                <h4>Detail Kerusakan</h4>
                                <ul>
                                    <li>Sulit dibaca</li>
                                    <li>Sulit dilihat</li>
                                    <li>Tidak dapat diterawang</li>
                                    <li>Tembus pandang</li>
                                </ul>
                                <div class="agree">
                                    <ul>
                                        <li>
                                            <button class="btn btn-info">Terima</button>
                                        </li>
                                        <li>
                                            <button class="btn btn-info">Tolak</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <form class="form-group">
                            <label>Comment</label>
                            <textarea class="form-control"></textarea>
                            <input class="btn btn-info" type="submit" value="Comment"/>
                        </form>
                    </div>
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

