<style></style>
<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
        );
     $this->load->view("MAIN/side.php",$header_data) 

?>

<section class="main-content-wrapper">

    <div class="pageheader">
        <h1 class="inline">Kategori Berita - </h1>
    </div>
    <section id="main-content" class="animated fadeInUp">
        <div class="row">
        <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Notifications Panel
        </div>
        <div class="panel-body">

            <?php if(count($user_notification)>0){ ?>
                <?php foreach($user_notification as $key=>$row) { ?>
                    <div class="list-group">
                        <a href="<?=base_url("user/detail_post/".$row["user_post_id"])?>" class="list-group-item">
                            <?=$row["post_title"]?>
                            <?=$row["notif_user"]?> by <?=$row["repairman_accepter_name"]?>
                            <span class="pull-right text-muted small"><em><?=$row["date_accept"]?></em>
                            </span>
                        </a>
                    </div>
                <?php } ?>
            <?php }else{ ?>
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        No Notifications
                    </a>
                </div>
            <?php } ?>
            </div>
        </div>
        </div>
        <div class="container-fluid">
            <section id="main-wrapper" class="theme-blue-full">
        
        <!--content-->
        <section class="main-content-wrapper">
            <!--banner-->
            <?php if(count($home_banner)>0){?>
            <div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">
                    <?php $i=0; foreach($home_banner as $key=>$row){ ?>
                    <li data-target="#myCarousel" data-slide-to="<?=$i++?>" class="<?php if($i==1){echo'active';} ?>"></li>
                    <?php } ?>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                <?php $i=0; foreach($home_banner as $key=>$row){ ?>
                    <div class="item <?php if($i==0){echo'active';} $i++; ?>">
                        <img src="<?=$row["path"]?>"  width="460" height="345">
                    </div>
                <?php } ?>
                </div>
					

            <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                </a>
            </div>
            <?php }?>
            <div class="container">
                <article>
                <form id="post_order" class="tab-content posting" method="post" enctype="multipart/form-data" role="form" action="<?=base_url("User/user_posting")?>">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#posting">Posting</a></li>
                        <li><a href="#tambah"><input type="file" name="userfile" class="btn btn-default"></a></li>
                    </ul>
                            <div id="posting" class="tab-pane fade in active">
                                <textarea class="form-control" name="content"></textarea>
                            </div>
                            <div id="tambah" class="tab-pane fade">
                                <!--not needed but dont delete leave it be-->
                            </div>
                            <div id="edit" class="tab-pane fade">
                                <!--not needed but dont delete leave it be-->
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="sel1" name="category_id">
                                    <option selected disabled>Kategori</option>
                                    <?php foreach($this->category_list as $row){ ?>
                                        <option value="<?=$row['category_id']?>"><?=$row['category_name']?></option>
                                    <?php } ?>
                                </select>
                                <select name="sub_category_id" class="form-control" id="sel1">
                                    <option selected disabled>Subkategori</option>
                                </select>
                                <select class="form-control" id="sel1" name="service_type_id">
                                    <option selected disabled>Jenis Servis</option>
                                    <?php foreach($service_type as $key=>$row){ ?>
                                        <option value="<?=$row["service_type_id"]?>"><?=$row["service_type"]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div id="locate_map">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" id="gmap_input" class="form-control controls" placeholder="Search your location and click at the map to get your lat and lng.">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="map" style="width:100%; height: 400px;"></div>
                                        </div>
                                    </div>
                                    <label for="address">Alamat:</label>
                                    <input type="text" name="address" id="address">
                                <input class="btn btn-info" type="submit" value="Post" style="float:right;"/>
                            </div>
                        </div>
                    </form>
                </article>
                <article class="timeline">
                    <?php foreach($user_posting as $key=>$row){ ?>
                    <div class="media">
                        <div class="media-left">
                            <img src="<?=base_url($row["user_image"])?>" class="media-object" style="width:60px">
                        </div>
                        
                        <div class="media-body">
                            <h4 class="media-heading"><?=$row["fname"]?> <?=$row["lname"]?></h4>
                            <?=hsc($row["post_title"])?> status: <?=$row["progress"]?>
                            <p><?=hsc($row["content"])?></p>
                            <a class="btn btn-default" href="<?=base_url("user/detail_post/".$row["user_post_id"])?>">View Detail</a>
                            Kategori: <?=$row["category_name"]?>, Tipe Jasa: <?=$row["service_type"]?><br>
                            Sub Kategori: <?=isset($row["sub_category_name"])?$row["sub_category_name"]:""?><br>
                            <?php if($row["image"]!=null){?>
                            Photo:<img class="view_image" src="<?=base_url($row["image"])?>" height="100" width="150">
                            <?php } ?>
                            <p>Tanggal & Waktu</p>
                            <?php foreach ($row["comment"] as $key => $value): ?>
                                <li>
                                <?php 
                                if($value["user_level"]>0){$linkprofile=base_url("user/profile_user_id/".$value["user_id"]);}
                                else{$linkprofile=base_url("user/profile/".$value["user_id"]);}
                                ?>

                                    At <?=$value["date"]?>
                                    <a href="<?=$linkprofile?>"><?=hsc($value["fname"])?></a> is
                                <?= ($value["user_level"]==null)?"User":"Repairman"; ?> Says:"
                                <?=hsc($value["comment"])?>"
                                    
                                </li>
                                    
                            <?php endforeach ?>
                            <form action="<?=base_url("user/user_comment")?>" method="post">
                                <input type="hidden" name="user_post_id" value="<?=$row["user_post_id"]?>">
                                <textarea name="comment"></textarea>
                                <input type="submit" value="Submit comment"></input>
                            </form>
                        </div>
                    </div>
                    <?php } ?>
                    
                </article>
                
        </div>
    </section>
</section>
        
</body>
</html>
<script>
$(".like").click(function(){
    var button = $(this);
    var user_post_id = $(this).data("user_post_id");
    $.ajax({
        url:"<?=base_url("user/user_post_like_action")?>",
        type:"post",
        dataType:"json",
        data:{
            user_post_id:user_post_id
        },
        success:function(res){
            if(res["like"]==true){
                button.html("Liked");
                $like_span = $("."+user_post_id+"_num_likes");
                $num_like = $like_span.data("num_likes");
                $num_like++;
                $like_span.data("num_likes",$num_like);
                $like_span.html($num_like);
            }else if(res["like"]==false){
                button.html("Like");
                $like_span = $("."+user_post_id+"_num_likes");
                $num_like = $like_span.data("num_likes");
                $num_like--;
                $like_span.data("num_likes",$num_like);
                $like_span.html($num_like);
            }
        }
    })
})
$("select[name='category_id']").change(function() {
  var cat_id = $(this).val();
  $.ajax({
      type:"POST",
      url:"<?=base_url('/Category/sub_category_list/')?>",
      dataType:"html",
      data:{
          category_id:cat_id
      },
      success:function(res){
          $("select[name='sub_category_id']").html("<option value='' disabled selected>Pilih sub-kategori anda</option>"+res);
      }
  });
});
$("document").ready(function(){
    initMap();
})
</script>

<!-- google map script -->
<script>
    function initMap() {
        var marker2;
        var geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById('map'));
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('gmap_input'));
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
//        var options = {
//            types: ['(cities)'],
//            componentRestrictions: {country: "id"}
//        };
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.setComponentRestrictions({country:"id"});
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed',autocomplete_function);
        google.maps.event.addListener(map, 'click', function( event ) {
            if (typeof marker2 != 'undefined') {
                marker2.setMap(null);
            }
            if (typeof marker != 'undefined') {
                marker.setMap(null);
            }
//            alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
            var myLatlng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
            $("#user_lat").val(event.latLng.lat());
            $("#user_lng").val(event.latLng.lng());
            marker2 = new google.maps.Marker({
                position: myLatlng,
                map: map
            });
            marker2.setMap(map);
        });


        function autocomplete_function() {
            infowindow.close();
            marker.setVisible(true);
            var place = this.getPlace();

            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            $("#user_lat").val(place.geometry.location.lat());
            $("#user_lng").val(place.geometry.location.lng());
//            marker.setIcon(/** @type {google.maps.Icon} */({
//                url: place.icon,
//                size: new google.maps.Size(71, 71),
//                origin: new google.maps.Point(0, 0),
//                anchor: new google.maps.Point(17, 34),
//                scaledSize: new google.maps.Size(35, 35)
//            }));
            marker.setPosition(place.geometry.location);
        }
    }


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7DAYC5xAZ2cARU_7olhRhRtVgcV3jeWc&signed_in=true&libraries=places&callback=initMap"
        ></script>

