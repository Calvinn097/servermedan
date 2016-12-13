<!DOCTYPE html>
<html>
  <head>
      <link href="<?=base_url("/asset/bootstrap/3.3.7/css/bootstrap.min.css")?>" rel="stylesheet">
    <link href="<?=base_url("asset/css/maps.css")?>" rel="stylesheet"/>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAUhksLQ3jvExZGOitohgYX4JzYnIWK5w&callback=initMap">
    </script>
    <div class="ok">
        <a class="btn btn-info" href="<?=base_url("user/userlogincust")?>">OK</a>  
    </div>
      <?php $this->load->view("MAIN/footer.php"); ?>
  </body>
</html>