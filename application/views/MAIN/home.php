<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/grayscale.css"
                )
        );
     $this->load->view("MAIN/header.php",$header_data);
echo md5("servermedan123"); 
?>
<h1>banner</h1>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php $i=0; foreach($home_banner as $key=>$row){ ?>
        <li data-target="#banner_<?=$row["repairman_banner_id"]?>" data-slide-to="<?=$i++?>" class="active"></li>
        <?php } ?>
    </ol>
    <div class="carousel-inner" role="listbox">
        <?php foreach($home_banner as $key=>$row){ ?>
        <div class="item active">
            <img src="<?=$row['path']?>" width="800" height="300">
        </div>
        <div class="item">
            <img src="<?=$row['path']?>" width="800" height="300">
        </div>
        <?php } ?>
    </div>
</div>
    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?=base_url("/asset/images/selamatdatang.png")?>" width=100%/>
                            </div>
                            <div class="col-md-6">
                                <h3 class="brand-heading">Selamat datang</h3>
                                <p class="intro-text">Silahkan menikmati layanan yang dapat memudahkan anda mendapatkan servis dan reparasi barang anda yang rusak melalui smartphone anda dengan mengunduh aplikasi dibawah ini.</p>
                                <a href="http://startbootstrap.com/template-overviews/grayscale/" class="btn btn-lg btn-success">Unduh Aplikasi</a>
                            </div>
                        
                        </div>
                        <a href="#contact" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Kategori Section -->
    <section id="kategori" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Kategori Jasa Servis dan Reparasi</h2>
                <div class="row pertama">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="rounded" src="<?=base_url("/asset/images/watersupply.png")?>" width=100% height=150px/>
                            </div>
                            <div class="col-md-6">
                                <p>Reparation Water</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?=base_url("/asset/images/powersupply.jpg")?>" width=100% height=150px/>
                            </div>
                            <div class="col-md-6">
                                <p>Reparation Electricity</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row kedua">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?=base_url("/asset/images/laptop.jpg")?>" width=100% height=150px/>
                            </div>
                            <div class="col-md-6">
                                <p>Reparation Computer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?=base_url("/asset/images/smartphone.jpg")?>" width=100% height=150px/>
                            </div>
                            <div class="col-md-6">
                                <p>Reparation Smartphone</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--Tentang Section-->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Tentang Jasa Servis dan Reparasi</h2>
                <div class="row">
                    <div class="col-md-4 onthespot">
                        <img src="<?=base_url("/asset/images/onthesport.png")?>" width=100% height=150px/>
                        <h3>Reparasi On The Spot</h3>
                        <p>Reparasi on the spot merupakan jenis reparasi yang dibutuhkan segera dan dapat langsung dipanggil sekarang juga untuk memperbaiki barang yang rusak</p>
                        <button type="button" id="more" class="btn btn-danger">Read More</button>
                    </div>
                    <div class="col-md-4 onthespot">
                        <img src="<?=base_url("/asset/images/bringandtakeaway.png")?>" width=100% height=150px/>
                        <h3>Reparasi Bring and Take Away</h3>
                        <p>Reparasi Bring and Take Away yaitu jenis reparasi dimana anda membawa barang anda yang rusak dan mengambilnya sendiri setelah selesai dilakukan perbaikan</p>
                        <button type="button" id="more" class="btn btn-danger">Read More</button>
                    </div>
                    <div class="col-md-4 onthespot">
                        <img src="<?=base_url("/asset/images/pickupandreturn.png")?>" width=100% height=150px/>
                        <h3>Reparasi Pick Up and Return</h3>
                        <p>Reparasi Pick Up and Return merupakan jenis perbaikan dimana anda yang tidak memiliki waktu dan tidak sempat untuk mengantarkan barang rusak dapat dijemput oleh repairman</p>
                        <button type="button" id="more" class="btn btn-danger">Read More</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
<h2>Kontak Server Medan</h2>
                <div class="row data">
                    <div class="col-md-3">
                        <p>Nama : Dicky Christian</p>
                        <p>Age  : 20 tahun</p>
                        <p>Job  : IOS Developer</p>
                        <p>Status : Student</p>
                        <p>University : STMIK Mikroskil</p>
                        <p>Company : </p>
                        <p>Deskription :</p>
                    </div>
                    <div class="col-md-3">
                        <p>nama : William Karno</p>
                        <p>Age  : 20 tahun</p>
                        <p>Job  : IOS Developer</p>
                        <p>Status : Student</p>
                        <p>University : STMIK Mikroskil</p>
                        <p>Company : </p>
                        <p>Deskription :</p>
                    </div>
                    <div class="col-md-3">
                        <p>nama : Calvin</p>
                        <p>Age  : 20 tahun</p>
                        <p>Job  : IOS Developer</p>
                        <p>Status : Student</p>
                        <p>University : STMIK Mikroskil</p>
                        <p>Company : </p>
                        <p>Deskription :</p>
                    </div>
                    <div class="col-md-3">
                        <p>nama : Wanjemy Wijaya</p>
                        <p>Age  : 20 tahun</p>
                        <p>Job  : IOS Developer</p>
                        <p>Status : Student</p>
                        <p>University : STMIK Mikroskil</p>
                        <p>Company : </p>
                        <p>Deskription :</p>
                    </div>
                </div>
                
                <ul class="list-inline">
                    <p>Bagikan :</p>
                    <li>
                        <a href="https://twitter.com"><i class="fa fa-twitter fa-lg"></i></a>
                    </li>
                    <li>
                        <a href="https://github.com"><i class="fa fa-github fa-lg"></i></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com"><i class="fa fa-google-plus fa-lg"></i></a>
                    </li>
                    <li>
                        <a href="https://facebook.com"><i class="fa fa-facebook fa-lg"></i></a>
                    </li>
                    <li>
                        <a href="https://facebook.com"><i class="fa fa-instagram fa-lg"></i></a>
                    </li>
                    <li>
                        <a href="https://facebook.com"><i class="fa fa-youtube fa-lg"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>


    <!-- Map Section -->
    <div id="map"></div>

    <!-- Footer -->
    <?php $this->load->view("MAIN/footer.php"); ?>

    <!-- jQuery -->

</body>

<script>
$("document").ready(function(){

})
</script>

<!--<script>
    var map;
    function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8
    });
    }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAUhksLQ3jvExZGOitohgYX4JzYnIWK5w&callback=initMap">
</script>-->