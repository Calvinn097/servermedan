<?php
     $this->load->view("MAIN/side.php",array("title"=>"Welcome to Servermedan"));
?>
<body data-spy="scroll" data-target="#side-menu" data-offset="20">

    <div id="wrapper">
        <div class="container">

            <!-- /.row -->
                    <div class="portfolio">
                        <!-- Portfolio Item Heading -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Detail Repairman
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
                                <h4>Saroha</h4>
                                <p>Memiliki latar belakang tamatan SMK. Sudah bekerja selama 5 tahun dan memiliki keahlian khusus dalam memegang barang serta sangat ahli dalam membongkar barang.</p>
                                <h4>Detail Kemampuan</h4>
                                <ul>
                                    <li>Rajin</li>
                                    <li>Dapat memperbaiki perabotan</li>
                                    <li>Dapat memperbaiki rumah</li>
                                    <li>Dapat menganalisi barang rusak</li>
                                </ul>
                                <div class="rating">
                                    <span>☆</span>
                                    <span>☆</span>
                                    <span>☆</span>
                                    <span>☆</span>
                                    <span>☆</span>
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

