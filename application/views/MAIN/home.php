<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/grayscale.css"
                )
        );
     $this->load->view("MAIN/header.php",$header_data) 

?>
    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="brand-heading">Selamat datang</h3>
                        <p class="intro-text">Silahkan menikmati layanan yang dapat memudahkan anda dalam mendapatkan servis dan reparasi barang anda yang rusak tanpa harus mengkhawatirkan waktu dan tempat.</p>
                        <a href="#download" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Download Section -->
    <section id="download" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Unduh App</h2>
                    <p>Aplikasi khusus untuk smartphone mempermudah anda dalam melakukan pemesanan dan menggunakan jasa yang diberikan</p>
                    <a href="http://startbootstrap.com/template-overviews/grayscale/" class="btn btn-default btn-lg">Unduh Aplikasi</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Kategori Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Kategori Jasa Servis dan Reparasi</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                <p>wow</p>
                            </div>
                            <div class="col-md-6">
                                <p>wow</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                <p>wow</p>
                            </div>
                            <div class="col-md-6">
                                <p>wow</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                <p>wow</p>
                            </div>
                            <div class="col-md-6">
                                <p>wow</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                <p>wow</p>
                            </div>
                            <div class="col-md-6">
                                <p>wow</p>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </section>

    <!--Tentang Section-->
    <section id="kategori" class="container content-section text-center">
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
                <h2>Contact Start Bootstrap</h2>
                <p>Feel free to email us to provide some feedback on our templates, give us suggestions for new templates and themes, or to just say hello!</p>
                <p><a href="mailto:feedback@startbootstrap.com">feedback@startbootstrap.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
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
<!-- Modal -->
<div id="registerModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
            <form method="post" id="registerForm">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" id="fname">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <label for="rpassword">Repeat Password</label>
            <input type="password" class="form-control" name="rpassword" id="rpassword">
            <input type="submit" class="btn btn-success btn-block" value="Register">
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</html>
<script>
$("document").ready(function(){
    $("#registerModal").appendTo("body");
})
$("#register").click(function(){
    $("#registerModal").modal("show"); 
})
$("#registerForm").submit(function(){
    $(this).attr("action","user/register");
    $(this).submit();
})
</script>

<script>
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
</script>