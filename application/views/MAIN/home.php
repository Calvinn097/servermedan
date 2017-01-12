<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/screen.css",
                "asset/css/main.css"
                )
        );
     $this->load->view("MAIN/header.php",$header_data);
?>
<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
</style>

<body>
         
		<div id="root">
            
			<article id="welcome">
				<figure class="mobile-a"><img src="<?=base_url("asset/images/homepage/device1.png")?>" alt="Placeholder" width="297" height="525"></figure>
				<h2><span>SERVER</span> Medan</h2>
				<p>Cara cepat dan mudah dalam mencari repairman</p>
				<ul class="download-a a">
					<li class="as"><a rel="external" href="#">Download on the App Store</a></li>
				</ul>
			</article>
            
			<section id="content" class="a">
                
				<article>
					<header class="heading-a">
						<h3><span class="small">Tentang Kami</span> <span class="strong">Server Medan</span> Aplikasi Reparasi</h3>
						<p>Server Medan merupakan suatu aplikasi yang dirancang agar dapat menyelesaikan permasalahan konsumen terhadap waktu dan kecepatan dalam <strong>reparasi</strong> benda yang rusak</p>
                        <p>Aplikasi ini dibuat dan disusun oleh :</p>
					</header>
					<ul class="list-a">
						<li>
                            <i class="icon-basic" id="dicky"></i>
                            <span class="title">Dicky Christian</span>
                            <pre>
Status : Mahasiswa
Bagian : Pengembang Mobile
Umur : 20 Tahun
Universitas : STMIK Mikroskil
                            </pre>
                        </li>
						<li>
                            <i class="icon-basic" id="calvin"></i>
                            <span class="title">Calvin</span>
                            <pre>
Status : Mahasiswa
Bagian : Pengembang Web
Umur : 20 Tahun
Universitas : STMIK Mikroskil
                            </pre>
                        </li>
                        <li>
                            <i class="icon-basic" id="karno"></i> 
                            <span class="title">William Karno</span>
                            <pre>
Status : Mahasiswa
Bagian : Pengembang Web
Umur : 20 Tahun
Universitas : STMIK Mikroskil
                            </pre>
                        </li>
					</ul>
				</article>
				<article class="vb">
					<header class="heading-a">
						<h3><span class="small">Promosi Mekanik</span> <span class="strong">Review</span> of Mekanik</h3>
					</header>
					<ul class="slider-a">
						<li><img src="<?=base_url("asset/images/homepage/ts.png")?>" alt="Placeholder" width="157" height="157"><span class="title"><span>Sanjaya</span> Digital mekanik</span> memiliki kemampuan analisis dan pengalaman selama 10 tahun dibidang elektronik, transportasi, gadget serta furniture</li>
						<li><img src="<?=base_url("asset/images/homepage/ts.png")?>" alt="Placeholder" width="157" height="157"><span class="title"><span>Sanjaya</span> Digital mekanik</span> memiliki kemampuan analisis dan pengalaman selama 10 tahun dibidang elektronik, transportasi, gadget serta furniture</li>
                        <li><img src="<?=base_url("asset/images/homepage/ts.png")?>" alt="Placeholder" width="157" height="157"><span class="title"><span>Sanjaya</span> Digital mekanik</span> memiliki kemampuan analisis dan pengalaman selama 10 tahun dibidang elektronik, transportasi, gadget serta furniture</li>
						<li><img src="<?=base_url("asset/images/homepage/ts.png")?>" alt="Placeholder" width="157" height="157"><span class="title"><span>Sanjaya</span> Digital mekanik</span> memiliki kemampuan analisis dan pengalaman selama 10 tahun dibidang elektronik, transportasi, gadget serta furniture</li>
					</ul>
				</article>
				
				
				<div>
					<header class="heading-a">
						<h3><span class="small">Fiture</span> <span class="strong">Server</span> Medan</h3>
						<p>Fiture - fiture yang ditawarkan kepada pengguna</p>
					</header>
					<div class="news-c">
                        <div class="carousel slide" id="myCarousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <article>
                                        <h4>Login Google & Facebook</h4>
                                        <figure><img src="<?=base_url("asset/images/homepage/post2.png")?>" alt="Placeholder" width="500" height="460"></figure>
                                        <p>Dengan adanya alternatif lain pengguna menjadi lebih mudah dalam melakukan pengaksesan terhadap layanan kami dan meminimalkan data pribadi pengguna disimpan secara terus-menerus</p>
                                    </article>
                                    
                                </div>
                                <div class="item">
                                    <article>
                                        <h4>Maps</h4>
                                        <figure><img src="<?=base_url("asset/images/homepage/post3.png")?>" alt="Placeholder" width="500" height="460"></figure>
                                        <p>Dengan menggunakan fitur maps kami dapat membantu pelanggan yang untuk mendapatkan alamat yang akurat serta memudahkan kepada perusahaan penyedia pelanyanan dalam memberikan servis</p>
                                    </article>
                                </div>
                                <div class="item">
                                    <article>
                                        <h4>Posting</h4>
                                        <figure><img src="<?=base_url("asset/images/homepage/post1.png")?>" alt="Placeholder" width="500" height="460"></figure>
                                        <p>Dengan diberikan layanan posting maka perusahaan pemberi jasa akan lebih mudah memberikan keputusan terhadap kerusakan barang sehingga pengguna dapat mendapatkan feedback</p>
                                    </article>
                                </div>
                                <div class="item">
                                    <article>
                                        <h4>Calender Plan</h4>
                                        <figure><img src="<?=base_url("asset/images/homepage/post4.png")?>" alt="Placeholder" width="500" height="460"></figure>
                                        <p>Dengan adanya fitur ini memudahkan pengguna dalam melakukan management waktu terhadap jadwal perbaikan barang yang sedang dilakukan</p>
                                    </article>
                                </div>
                                <div class="item">
                                    <article>
                                        <h4>Tips and News</h4>
                                        <figure><img src="<?=base_url("asset/images/homepage/post5.png")?>" alt="Placeholder" width="500" height="460"></figure>
                                        <p>Dengan adanya fitur tips dan news diharapkan pelanggan dapat lebih menjaga barang agar tidak rusak dalam jangka waktu dekat sehingga dapat meminimalisir terjadinya reparasi secara berulang-ulang</p>
                                    </article>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            </a>
						</div>
					</div>
				</div>
				
				<article id="contact">
					<header class="heading-a">
						<h3><span class="small">Contact us</span></h3>
					</header>
					<form action="#" method="post" id="ajax-form-send">
						<fieldset>
							<p>
								<input type="text" id="ca" name="ca" placeholder="nama" required>
							</p>
							<p>
								<input type="email" id="cb" name="cb" placeholder="email" required>
							</p>
							<p>
								<span>
									<input type="tel" id="cc" name="cc" placeholder="Phone Number">
								</span>
								<span>
									<label for="cd" class="hidden">Country_</label>
									<select id="cd" name="cd">
										<option selected disabled>Country</option>
										<option>Afghanistan</option>
										<option>Albania</option>
										<option>Algeria</option>
										<option>Andorra</option>
										<option>Angola</option>
										<option>Antigua and Barbuda</option>
										<option>Argentina</option>
										<option>Armenia</option>
										<option>Aruba</option>
										<option>Australia</option>
										<option>Austria</option>
										<option>Azerbaijan</option>
										<option>Bahamas, The</option>
										<option>Bahrain</option>
										<option>Bangladesh</option>
										<option>Barbados</option>
										<option>Belarus</option>
										<option>Belgium</option>
										<option>Belize</option>
										<option>Benin</option>
										<option>Bhutan</option>
										<option>Bolivia</option>
										<option>Bosnia and Herzegovina</option>
										<option>Botswana</option>
										<option>Brazil</option>
										<option>Brunei</option>
										<option>Bulgaria</option>
										<option>Burkina Faso</option>
										<option>Burma</option>
										<option>Burundi</option>
										<option>Cambodia</option>
										<option>Cameroon</option>
										<option>Canada</option>
										<option>Cape Verde</option>
										<option>Central African Republic</option>
										<option>Chad</option>
										<option>Chile</option>
										<option>China</option>
										<option>Colombia</option>
										<option>Comoros</option>
										<option>Congo, Democratic Republic of the</option>
										<option>Congo, Republic of the</option>
										<option>Costa Rica</option>
										<option>Cote d'Ivoire</option>
										<option>Croatia</option>
										<option>Cuba</option>
										<option>Curacao</option>
										<option>Cyprus</option>
										<option>Czech Republic</option>
										<option>Denmark</option>
										<option>Djibouti</option>
										<option>Dominica</option>
										<option>Dominican Republic</option>
										<option>East Timor</option>
										<option>Ecuador</option>
										<option>Egypt</option>
										<option>El Salvador</option>
										<option>Equatorial Guinea</option>
										<option>Eritrea</option>
										<option>Estonia</option>
										<option>Ethiopia</option>
										<option>Fiji</option>
										<option>Finland</option>
										<option>France</option>
										<option>Gabon</option>
										<option>Gambia, The</option>
										<option>Georgia</option>
										<option>Germany</option>
										<option>Ghana</option>
										<option>Greece</option>
										<option>Grenada</option>
										<option>Guatemala</option>
										<option>Guinea</option>
										<option>Guinea-Bissau</option>
										<option>Guyana</option>
										<option>Haiti</option>
										<option>Holy See</option>
										<option>Honduras</option>
										<option>Hong Kong</option>
										<option>Hungary</option>
										<option>Iceland</option>
										<option>India</option>
										<option>Indonesia</option>
										<option>Iran</option>
										<option>Iraq</option>
										<option>Ireland</option>
										<option>Israel</option>
										<option>Italy</option>
										<option>Jamaica</option>
										<option>Japan</option>
										<option>Jordan</option>
										<option>Kazakhstan</option>
										<option>Kenya</option>
										<option>Kiribati</option>
										<option>Korea, North</option>
										<option>Korea, South</option>
										<option>Kosovo</option>
										<option>Kuwait</option>
										<option>Kyrgyzstan</option>
										<option>Laos</option>
										<option>Latvia</option>
										<option>Lebanon</option>
										<option>Lesotho</option>
										<option>Liberia</option>
										<option>Libya</option>
										<option>Liechtenstein</option>
										<option>Lithuania</option>
										<option>Luxembourg</option>
										<option>Macau</option>
										<option>Macedonia</option>
										<option>Madagascar</option>
										<option>Malawi</option>
										<option>Malaysia</option>
										<option>Maldives</option>
										<option>Mali</option>
										<option>Malta</option>
										<option>Marshall Islands</option>
										<option>Mauritania</option>
										<option>Mauritius</option>
										<option>Mexico</option>
										<option>Micronesia</option>
										<option>Moldova</option>
										<option>Monaco</option>
										<option>Mongolia</option>
										<option>Montenegro</option>
										<option>Morocco</option>
										<option>Mozambique</option>
										<option>Namibia</option>
										<option>Nauru</option>
										<option>Nepal</option>
										<option>Netherlands</option>
										<option>Netherlands Antilles</option>
										<option>New Zealand</option>
										<option>Nicaragua</option>
										<option>Niger</option>
										<option>Nigeria</option>
										<option>North Korea</option>
										<option>Norway</option>
										<option>Oman</option>
										<option>Pakistan</option>
										<option>Palau</option>
										<option>Palestinian Territories</option>
										<option>Panama</option>
										<option>Papua New Guinea</option>
										<option>Paraguay</option>
										<option>Peru</option>
										<option>Philippines</option>
										<option>Poland</option>
										<option>Portugal</option>
										<option>Qatar</option>
										<option>Romania</option>
										<option>Russia</option>
										<option>Rwanda</option>
										<option>Saint Kitts and Nevis</option>
										<option>Saint Lucia</option>
										<option>Saint Vincent and the Grenadines</option>
										<option>Samoa</option>
										<option>San Marino</option>
										<option>Sao Tome and Principe</option>
										<option>Saudi Arabia</option>
										<option>Senegal</option>
										<option>Serbia</option>
										<option>Seychelles</option>
										<option>Sierra Leone</option>
										<option>Singapore</option>
										<option>Sint Maarten</option>
										<option>Slovakia</option>
										<option>Slovenia</option>
										<option>Solomon Islands</option>
										<option>Somalia</option>
										<option>South Africa</option>
										<option>South Korea</option>
										<option>South Sudan</option>
										<option>Spain</option>
										<option>Sri Lanka</option>
										<option>Sudan</option>
										<option>Suriname</option>
										<option>Swaziland</option>
										<option>Sweden</option>
										<option>Switzerland</option>
										<option>Syria</option>
										<option>Taiwan</option>
										<option>Tajikistan</option>
										<option>Tanzania</option>
										<option>Thailand</option>
										<option>Timor-Leste</option>
										<option>Togo</option>
										<option>Tonga</option>
										<option>Trinidad and Tobago</option>
										<option>Tunisia</option>
										<option>Turkey</option>
										<option>Turkmenistan</option>
										<option>Tuvalu</option>
										<option>Uganda</option>
										<option>Ukraine</option>
										<option>United Arab Emirates</option>
										<option>United Kingdom</option>
										<option>Uruguay</option>
										<option>Uzbekistan</option>
										<option>Vanuatu</option>
										<option>Venezuela</option>
										<option>Vietnam</option>
										<option>Yemen</option>
										<option>Zambia</option>
										<option>Zimbabwe</option>
									</select>
								</span>
							</p>
							<p>
								<textarea id="ce" name="ce" placeholder="Message" required></textarea>
							</p>
							<p><button type="submit">Send</button></p>
						</fieldset>
					</form>
				</article>
                <article class="va">
					<header class="heading-a">
						<h3><span class="strong">Subscribe</span></h3>
					</header>
					<form action="#" method="post" class="form-b">
						<fieldset>
							<p>
								<input type="email" id="fba" name="fba" placeholder="email" required>
								<button type="submit">Submit</button>
							</p>
							<p class="scheme-b">Berikan Subscribe bagi anda yang merasa telah puas dengan layanan aplikasi yang telah kami sediakan dan segala jenis penambahan pendapatan.</p>
						</fieldset>
					</form>
				</article>
			</section>
			
		</div>

</body>



<!--<h1>banner</h1>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php $i=0; foreach($home_banner as $key=>$row){ ?>
        <li data-target="#banner_<?=$row["repairman_banner_id"]?>" data-slide-to="<?=$i++?> class="active"></li>
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
</div>-->
    <!-- Intro Header -->
    <!--<header class="intro">
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
-->
    <!-- Kategori Section -->
<!--
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
-->

<!--Tentang Section-->
<!--
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
-->

    <!-- Contact Section -->
<!--
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
-->


    <!-- Map Section -->
<!--
    <div id="map"></div>
-->

    <!-- Footer -->
<!--
    <?php $this->load->view("MAIN/footer.php"); ?>
-->

    <!-- jQuery -->

<!--
</body>

<script>
$("document").ready(function(){

})
</script>
-->

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