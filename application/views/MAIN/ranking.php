<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/grayscale.css",
                "asset/css/nav.css",
                "asset/css/homeloginrepair.css",
                "asset/css/ranking.css"
                )
        );
     $this->load->view("MAIN/header.php",$header_data);

?>
<body data-spy="scroll" data-target="#side-menu" data-offset="20">

    <div id="wrapper">
        <div class="container ranking">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tingkat Skill
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        
            <?php foreach($rank as $key=>$row){ ?>
            <div class="row">
            <div class="col-md-4 portfolio-item">
                <a href="<?=base_url("repairman/profile/".$row["repairman_id"]) ?>">
                    <img class="img-responsive" src="<?=base_url($row['user_image'])?>" alt="image repairman">
                </a>
                <h3>
                    <a href="<?=base_url("repairman/profile/".$row["repairman_id"]) ?>"><?=$row["fname"]." ".$row["lname"]?></a>
                </h3>
                <p><?=$row["keahlian"]?>
            </div>
            </div>
        <?php } ?>
        
        <!-- /.row -->
<!--
        
        <div class="row">
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Hadi</a>
                </h3>
                <p>Sangat memperhitungkan segala kejadian yang mungkin terjadi dan memberikan saran dengan cepat</p>
                <button class="btn btn-info">readmore</button>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Winson</a>
                </h3>
                <p>Memiliki pengalaman yang sangat tinggi dibidang komputer dan perabotan rumah tangga</p>
                <button class="btn btn-info">readmore</button>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Erwin</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <button class="btn btn-info">readmore</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Project Name</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <button class="btn btn-info">readmore</button>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Project Name</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <button class="btn btn-info">readmore</button>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                    <a href="#">Project Name</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <button class="btn btn-info">readmore</button>
            </div>
        </div>

        <hr>

        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>--?

    </div>

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

