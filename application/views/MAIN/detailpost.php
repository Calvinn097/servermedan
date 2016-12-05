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
     $this->load->view("MAIN/logoutheader.php",$header_data) 

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
                    <div class="portfolio">
                        <!-- Portfolio Item Heading -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Portfolio Item
                                    <small>Item Subheading</small>
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
                                <h4>Project Description</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                                <h4>Project Details</h4>
                                <ul>
                                    <li>Lorem Ipsum</li>
                                    <li>Dolor Sit Amet</li>
                                    <li>Consectetur</li>
                                    <li>Adipiscing Elit</li>
                                </ul>
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
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

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

